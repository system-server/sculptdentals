<?php

use Illuminate\Database\Seeder;
//add
use App\Area;
class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
        	['name'	=> 'Endodoncia'],
        	['name'	=> 'Pediatria'],
        	['name'	=> 'Rehabilitacion'],
        	['name'	=> 'Ortodoncia'],
        ];

        foreach ($areas as $area) {
        	Area::create( $area );
        }
    }
}
