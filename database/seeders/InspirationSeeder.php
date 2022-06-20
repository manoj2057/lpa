<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inspiration;

class InspirationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inspiration::insert([

            'heading'=>"Inspiration & Guidance",
            'content'=>"लुम्बिनी फोटोग्राफ संघ नेपाली पत्रकारहरुको छाता संगठन हो । पत्रकारहरुलाई संगठित गरी व्यावसायिक
             नेतृत्व प्रदान गर्दै उनीहरुको हक–अधिकार प्रवद्र्धन गर्ने महासंघको मूल ध्येय, लक्ष्य र दायित्व हो । ६ दशकभन्दा लामो
              इतिहास रहेको महासंघमा पत्रिका,रेडियो, टिभी, अनलाइन र स्वतन्त्र सहित १३ हजार भन्दा बढी पत्रकार आवद्ध छन् ।",
              'image'=>'',
            ]);
    }
}
