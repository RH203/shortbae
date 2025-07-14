<?php

namespace Database\Seeders;

use App\Enum\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    foreach (RoleEnum::cases() as $role) {
      Role::firstOrCreate(['name' => $role->value]);
    }

    // Users
    $user = User::create([
      'name' => 'Raihan Firdaus',
      'email' => 'user@gmail.com',
      'password' => Hash::make('password'),
    ]);

    $user->assignRole(RoleEnum::USER->value);
  }
}
