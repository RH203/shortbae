<?php

namespace App\Livewire\App;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Dashboard extends Component
{

  public $url;

  public function shorten()
  {
    if (!$this->url) {
      LivewireAlert::title('Error!')
        ->text('Url tidak boleh kosong.')
        ->toast()
        ->error()
        ->position('top-end')
        ->timer(3500)
        ->show();
      return;
    }

    if (!Auth::check()) {
      return $this->redirect(route('login'));
    }

    session(['url', $this->url]);
    return $this->redirect(route('create.url'));
  }

  public function render()
  {
    return view('livewire.app.dashboard');
  }
}
