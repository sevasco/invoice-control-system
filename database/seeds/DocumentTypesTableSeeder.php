<?php

use Illuminate\Database\Seeder;
use App\DocumentType;

class DocumentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocumentType::create([
            'name' => 'CC',
            'fullname' => 'Cédula de ciudadanía'
        ]);
        DocumentType::create([
            'name' => 'NIT',
            'fullname' => 'NIT'
        ]);
        DocumentType::create([
            'name' => 'TI',
            'fullname' => 'Tarjeta de identidad'
        ]);
        DocumentType::create([
            'name' => 'PT',
            'fullname' => 'Pasaporte'
        ]);
        DocumentType::create([
            'name' => 'CE',
            'fullname' => 'Cédula de extranjería'
        ]);
    }
}
