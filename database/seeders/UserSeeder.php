<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=>'Administrator',
            'firstname'=>'MobenSoft',
            'adresse'=>'Lome,Togo',
            'tel'=> 79812214,
            'email'=>'admin@admin.com',
            'password'=>Hash::make('@@12345678admin'),
            'profil_id'=>1,
        ]);
    }
}
