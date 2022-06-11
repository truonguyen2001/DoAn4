<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.test',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'), // password
            'remember_token' => Str::random(10),
            'is_admin' => 1
        ]);
    }
}
