<?php

namespace App\Livewire\App;

use App\Models\ShortUrl;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Hasil URL')]
class Result extends Component
{
  public $shortenedUrl;

  public function mount($id)
  {
    $this->shortenedUrl = ShortUrl::find($id);
  }

  public function render()
  {
    return view('livewire.app.result', [
      'shortenedUrl' => $this->shortenedUrl,
    ]);
  }
}
