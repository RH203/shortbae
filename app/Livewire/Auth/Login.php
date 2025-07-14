<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login')]
#[Layout('components.layouts.auth')]
class Login extends Component
{

  public $email;
  public $password;
  public $remember = false;


  protected $rules = [
    'email' => 'required|email',
    'password' => 'required|',
  ];

  public function login()
  {

    $this->validate();

    if (Auth::attempt([
      'email' => $this->email,
      'password' => $this->password
    ], $this->remember)) {

      session()->regenerate();

      return redirect()->route('create.url');
    }

    LivewireAlert::title('Oops!')
      ->error()
      ->position('top-end')
      ->text('Email atau password anda salah!')
      ->timer(3500)
      ->toast()
      ->show();

    return;
  }

  public function render()
  {
    return view('livewire.auth.login');
  }
}
