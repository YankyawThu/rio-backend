<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'ios_version_name' => '0.1.0',
            'android_version_name' => '0.1.0',
            'ios_force_update' => 0,
            'android_force_update' => 0,
            'ios_under_review' => 0,
            'android_under_review' => 0
        ]);
    }
}
