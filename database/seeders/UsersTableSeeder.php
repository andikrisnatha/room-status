<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Super User',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret1'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
