<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
    		[
    			'name' => 'Super Admin',
    			'email' => 'admin@gmail.com',
    			'role_id' => 1,
    			'password' => bcrypt('password'),
    			'created_at' => now(),
    			'updated_at' => now()
    		],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'role_id' => 2,
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now()
            ],
    	]);
    }
}
