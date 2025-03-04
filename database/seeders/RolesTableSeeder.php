<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
    		[
    			'name' => 'Super Admin',
    			'value' => "superadmin",
    			'created_at' => now(),
    			'updated_at' => now()
    		],
            // [
            //     'name' => 'User',
            //     'value' => "user",
            //     'created_at' => now(),
            //     'updated_at' => now()
            // ],
    	]);
    }
}
