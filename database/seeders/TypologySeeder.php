<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Typology;
use Illuminate\Support\Str;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typologies = [
            ['name'=>'italiano'],
            ['name'=>'pizzeria'],
            ['name'=>'cinese'],
            ['name'=>'giapponese'],
            ['name'=>'messicano'],
            ['name'=>'carne'],
            ['name'=>'pesce'],
            ['name'=>'pizza'],
            ['name'=>'burger'],
            ['name'=>'sushi'],
            ['name'=>'vegano'],
            ['name'=>'vegetariano'],
            ['name'=>'celiaco'],
            ['name'=>'indiano'],
        ];
        foreach($typologies as $typology) {
            $newTypology = new Typology();
            $newTypology->name = $typology['name'];
            $newTypology->slug = Str::slug($typology['name']);
            $newTypology->save();
        }
    }
        

}
