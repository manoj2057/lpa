<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Site;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Site::insert([
            'phoneno'=>"9876788899",
            'email'=>"lumbini@gmail.com",
            'location'=>"Lumbini,Butwal",
            'about_info'=>"लुम्बिनी फोटोग्राफ संघ नेपाली पत्रकारहरुको छाता संगठन हो । पत्रकारहरुलाई संगठित गरी व्यावसायिक नेतृत्व प्रदान गर्दै उनीहरुको हक–अधिकार दायित्व हो ।",

        ]);
    }
}
