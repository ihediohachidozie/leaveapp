<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'username' => 'Admin',
            'email' => 'infotech@ecmterminals.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'active' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
