<?php

namespace Database\Seeders;

use App\Models\Profil;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Profil::create( [
                'name'=>'Administrateur',
                'description'=>'est charge de la creation des utilisateurs'
            ]);

        Profil::create([
                'name' => 'Gestionnaire',
                'description' => 'est charge de la publications de contenues'
        ]);

        Profil::create([
                'name' => 'Visiteur',
                'description' => 'sont les clients du site web'
        ]);
    }
}
