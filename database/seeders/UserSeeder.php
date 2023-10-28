<?php

/** @noinspection SpellCheckingInspection */

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminEmail = 'admin@example.com';

        User::factory()->create([
            'name' => 'admin',
            'email' => $adminEmail,
            // $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi
            'password' => Hash::make('password'),
        ]);

        $standardUsers = User::factory(5)->create();

        foreach ($standardUsers as $user) {
            $user->assignRole('standard');
        }

        $managerUsers = User::factory(3)->create();

        foreach ($managerUsers as $user) {
            $user->assignRole('manager');
        }
    }
}
