<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Universitie;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Universitie::create([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('admin@123'),
            'contact_no'=>'8758191142',
            'address'=>'admin',
        ]);
    }
}
