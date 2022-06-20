<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            'name'=>"Manoj Pokharel",
            'email'=>"manoj@gmail.com",
            'password'=>bcrypt("password"),
            'image'=>'',
            'phone'=>"9875433322",
            'status'=>1
        ]);

    }
}
