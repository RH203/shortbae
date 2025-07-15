<?php

namespace App\Livewire\Auth;

use App\Enum\RoleEnum;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Register')]
#[Layout('components.layouts.auth')]
class Register extends Component
{
  public $name;
  public $email;
  public $password;
  public $password_confirmation;

  protected $rules = [
    'name' => 'required|string',
    'email' => 'required|string|email|unique:users,email',
    'password' => 'required|string|confirmed|min:8',
  ];

  public function register()
  {
    $this->validate();

    $user = User::create([
      'name' => $this->name,
      'email' => $this->email,
      'password' => Hash::make($this->password),
    ]);

    $user->assignRole(RoleEnum::USER->value);

    Auth::login($user);

    event(new Registered($user));

    return $this->redirect('/');

  }

  public function render()
  {
    return view('livewire.auth.register');
  }
}
