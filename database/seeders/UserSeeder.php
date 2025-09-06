<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'roles_id' => 1,
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@mail.com',
                'email_verification_status' => 0,
                'password' => Hash::make('admin123'),
            ],
    		[
                'id' => 2,
                'roles_id' => 2,
                'name' => 'user',
                'username' => 'user',
                'email' => 'user@mail.com',
                'email_verification_status' => 0,
                'password' => Hash::make('user123'),
            ],
        ]);
    }
}
