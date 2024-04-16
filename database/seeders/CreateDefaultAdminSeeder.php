<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateDefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = $this->createAdminUser();
        $this->createAdminProfile($user);
    }

    private function createAdminUser(): User
    {
        return User::create([
            'username' => 'admin',
            'email' => 'amirhosein.sahra@gmail.com',
            'password' => Hash::make('123456789'),
            'role' => 'admin',
        ]);
    }

    private function createAdminProfile(User $user): void
    {
        $user->profile()->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
        ]);
    }
}
