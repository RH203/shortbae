<?php

namespace App\Livewire\App;

use App\Models\ShortUrl;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RedirectUrl extends Component
{
  public $code;
  public $password = '';
  public $errorMessage = '';
  public $short;

  public function mount($code)
  {
    $this->short = ShortUrl::where('short_url', $code)->firstOrFail();

    if (!$this->short->password) {
      $this->short->increment('visit_count');
      return redirect($this->short->url);
    }
  }

  public function verifyPassword()
  {
    if (Hash::check($this->password, $this->short->password)) {
      $this->short->increment('visit_count');
      return redirect()->away($this->short->url);
    }

    $this->errorMessage = 'Incorrect password.';
  }

  public function render()
  {
    return view('livewire.app.redirect-url');
  }
}
