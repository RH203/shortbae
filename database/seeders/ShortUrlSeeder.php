<?php

namespace Database\Seeders;

use App\Models\ShortUrl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ShortUrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      ShortUrl::create([
        'url' => 'https://www.canva.com/s/templates?query=logo+perusahaan&adj=eyJCIjoidEFDWkN2akk2bUUiLCJEIjp7IkEiOiJNb2Rlcm4iLCJCIjoiU1RZTEVfTU9ERVJOIn19',
        'user_id' => 1,
        'short_url' => 'megalodon-menyerang',
        'expired_at' => null,
        'password' => Hash::make('password'),
      ]);
    }
}
