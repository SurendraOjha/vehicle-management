<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        DB::table('settings')->insert([
            'home' => 'Home',
            'who_are_we' => 'Who are WE',
            'personal_consultancy' => 'Personal Consultancy',
            'courses' =>'Courses',
            'stock_analysis' =>'Stock Analysis',
            'contact_us' =>'Contact Us',
            'terms_and_conditions' =>'Terms and Conditions',
            'about_us' => 'Some random text',
            'system_name' => 'Alex Project'

        ]);

    }
}
