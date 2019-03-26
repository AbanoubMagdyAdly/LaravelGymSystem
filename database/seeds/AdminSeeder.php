<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Admin',
            'email' => 'admin2@admin.com',
            'email_verified_at' => now(),
            'password' => '123456',
            'admin' => 1,
            'approved_at' => now(),
        ]);
    }
}
