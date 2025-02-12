<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SystemUser;

class SystemUsersSeeder extends Seeder
{
    public function run()
    {
        // First, truncate the table to avoid unique constraint violations
        SystemUser::truncate();

        // Then add your users
        SystemUser::create([
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@example.com',
            'phone' => '1234567890',
        ]);

        // Add your new user with a different phone number
        SystemUser::create([
            'name' => 'Admin2',
            'role' => 'admin',
            'email' => 'admin2@example.com',
            'phone' => '0987654321', // Make sure this is different
        ]);
    }
}
