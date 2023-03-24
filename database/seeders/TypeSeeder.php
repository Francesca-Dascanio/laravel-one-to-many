<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Type;

// Facade per Str
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Inserisco dati
         $types = [
            'UX',
            'UI',
            'Web Design',
            'Web Development'
         ];


         // Inserisco dati in DB
         foreach ($types as $type) {
             $singleType = new Type();
             $singleType->name = $type['name'];
            //  Così si genera slug in automatico
             $singleType->slug = Str::slug($type);
             $singleType->save();
         }
    }
}
