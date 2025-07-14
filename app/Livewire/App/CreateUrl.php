<?php

namespace App\Livewire\App;

use App\Models\ShortUrl;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create URL')]
class CreateUrl extends Component
{
  public $password;
  public $url;
  public $expired_at;
  public $custom_code;

  protected $rules = [
    'url' => 'required|string|url',
    'custom_code' => 'nullable|alpha_dash|min:4|max:20|unique:short_urls,short_url',
    'password' => 'nullable|string',
    'expired_at' => 'nullable|date',
  ];



  public function shorten()
  {
    DB::transaction(function () {
      $this->validate();

      $shortCode = $this->custom_code;

      if (!$shortCode) {
        do {
          $shortCode = Str::random(6);
        } while (ShortUrl::where('short_url', $shortCode)->exists());
      }


      $shortUrl = ShortUrl::create([
        'url' => $this->url,
        'user_id' => auth()->id(),
        'short_url' => $shortCode,
        'expired_at' => $this->expired_at,
        'password' => $this->password ? Hash::make($this->password) : null,
      ]);

      LivewireAlert::title('Berhasil')
        ->text('URL berhasil dipendekkan!')
        ->success()
        ->position('top-end')
        ->toast()
        ->timer(3000)
        ->show();

      $this->reset(['url', 'password', 'custom_code', 'expired_at']);

      return redirect()->route('result', ['id' => $shortUrl->id]);
    });
  }

  public function render()
  {
    return view('livewire.app.create-url');
  }
}
