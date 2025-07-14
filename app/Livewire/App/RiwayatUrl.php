<?php

namespace App\Livewire\App;

use App\Models\ShortUrl;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Riwayat Url')]
class RiwayatUrl extends Component
{
    public function render()
    {
      $data = ShortUrl::where('user_id', Auth::id())->get();

        return view('livewire.app.riwayat-url', [
          'datas' => $data,
        ]);
    }
}
