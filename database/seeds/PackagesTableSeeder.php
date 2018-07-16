<?php

use Illuminate\Database\Seeder;
//add
use App\Package;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
        	[
        		'name' => 'Ortodoncia Roth (Metalico)',
        		'description' => 'Descripcion',
        		'price' => 11800,
        	],
        	[
        		'name' => 'Ortodoncia Damon Q',
        		'description' => 'Descripcion',
        		'price' => 23000,
        	],
        	[
        		'name' => 'Ortodoncia Roth (Estetico)',
        		'description' => 'Descripcion',
        		'price' => 21200,
        	],
        	[
        		'name' => 'Ortodoncia Damon Clear',
        		'description' => 'Descripcion',
        		'price' => 27000,
        	],
            [
                'name' => 'Rehabilitacion Basica',
                'description' => 'Descripcion',
                'price' => 7000,
            ],
            [
                'name' => 'Odontopediatria Basica de Odontopediatria con 2 aparatos',
                'description' => 'Descripcion',
                'price' => 12000,
            ],
            [
                'name' => 'Odontopediatria con Ortotoncia',
                'description' => 'Descripcion',
                'price' => 19000,
            ],            
        ];
        foreach($packages as $package){
        	Package::create( $package );
        }
    }
}
