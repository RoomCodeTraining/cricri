<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'firstName' => 'General',
            'lastName' => 'Admin',
            'email' => 'admin@jesusfind.com',
            'password' => bcrypt('admin'),
            'password_reset_required' => false,
        ]);
    }
}
