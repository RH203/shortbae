<?php

namespace App\Livewire\App;

use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Profile')]
class Akun extends Component
{
  public $name;
  public $email;
  public $current_password;
  public $new_password;
  public $new_password_confirmation;

  public function mount()
  {
    auth()->user()->refresh();
    $user = auth()->user();
    $this->name = $user->name;
    $this->email = $user->email;
  }

  public function getEmailVerifiedProperty()
  {
    return auth()->user()->hasVerifiedEmail();
  }

  public function getHasPasswordProperty()
  {
    return auth()->user()->password !== null;
  }

  public function updateProfile()
  {
    $this->validate([
      'name' => 'required|string|max:50',
      'email' => 'required|email|unique:users,email,' . auth()->id(),
    ]);

    $user = auth()->user();

    $wasEmailChanged = $this->email !== $user->email;

    $user->name = $this->name;
    $user->email = $this->email;

    if ($wasEmailChanged) {
      $user->email_verified_at = null;
    }

    $user->save();

    $user->refresh();

    LivewireAlert::title('Success')
      ->title('Profil berhasil diperbarui.')
      ->toast()
      ->position('top-end')
      ->timer(4000)
      ->success()
      ->show();
  }


  public function sendEmailVerification()
  {
    if (!auth()->user()->hasVerifiedEmail()) {
      auth()->user()->sendEmailVerificationNotification();

      LivewireAlert::title('Success')
        ->title('Link verifikasi email telah dikirim.')
        ->toast()
        ->timer(4000)
        ->success()
        ->position('top-end')
        ->show();
    }
  }

  public function updatePassword()
  {
    $this->validate([
      'current_password' => 'required',
      'new_password' => ['required', 'confirmed', 'min:8'],
    ]);

    if (!Hash::check($this->current_password, auth()->user()->password)) {
      LivewireAlert::title('Oops')
        ->title('Password anda salah')
        ->toast()
        ->position('top-end')
        ->timer(4000)
        ->error()
        ->show();
      return;
    }

    auth()->user()->update([
      'password' => Hash::make($this->new_password),
    ]);

    $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
    LivewireAlert::title('Success')
      ->title('Password berhasil diperbarui.')
      ->toast()
      ->position('top-end')
      ->timer(4000)
      ->success()
      ->show();

  }

  public function render()
  {
    return view('livewire.app.akun');
  }
}
