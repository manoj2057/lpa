<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theme;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Theme::insert([

            'website_title'=>"Lumbini Photography",
            'website_subtitle'=>"we have the solution for the Photography",
        ]);
    }
}
