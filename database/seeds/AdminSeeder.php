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
            'id'=>1,
            'name' => 'Admin',
            'email' => 'admin2@admin.com',
            'email_verified_at' => now(),
            'remember_token'=>null,
            'password' => bcrypt('123456'),
            'created_at' => now(),
            'updated_at' => now(),
            'banned_at'=>null,

        ]);
    }
}
