<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Verification Account')]
class VerifyEmail extends Component
{
    public function render()
    {
        return view('livewire.auth.verify-email');
    }
}
