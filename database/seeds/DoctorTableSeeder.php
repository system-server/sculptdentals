<?php

use Illuminate\Database\Seeder;

use App\Doctor;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Doctor::class, 5)->create();

        $doctors = [
        	[
        		'name' 					=> 'Estefani',
        		'last_name_one' 		=> 'Rosete',
        		'last_name_two' 		=> 'Varela',
                'full_name'             => 'Rosete Varela Estefani',
        		'speciality' 			=> 'Lic. en Estomatologia',
        		'professional_card' 	=> '10130202',
        		'cell_phone'			=> '',
        		'home_phone'			=> '',
        		'university' 	        => 'Benemerita Universidad Autonoma de Puebla'
        	],
            [
                'name'                  => 'Ana Gabriela',
                'last_name_one'         => 'Avila',
                'last_name_two'         => 'Sanchez',
                'full_name'             => 'Avila Sanchez Ana Gabriela',
                'speciality'            => 'Cirujano Dentista',
                'professional_card'     => '09055189',
                'cell_phone'            => '',
                'home_phone'            => '',
                'university'            => 'Universidad Autonoma de Tlaxcala'
            ],
            [
                'name'                  => 'Miguel Angel',
                'last_name_one'         => 'Reyes',
                'last_name_two'         => 'Vazquez',
                'full_name'             => 'Reyes Vazquez Miguel Angel',
                'speciality'            => 'Lic. en Estomatologia',
                'professional_card'     => '6120864',
                'cell_phone'            => '',
                'home_phone'            => '',
                'university'            => 'Benemerita Universidad Autonoma de Puebla'
            ],
            [
                'name'                  => 'Marisol',
                'last_name_one'         => 'Covarrubias',
                'last_name_two'         => 'Leon',
                'full_name'             => 'Covarrubias Leon Marisol',
                'speciality'            => 'Endoperiodoncia',
                'professional_card'     => '6072259',
                'cell_phone'            => '',
                'home_phone'            => '',
                'university'            => 'Benemerita Universidad Autonoma de Puebla'
            ],            
            [
                'name'                  => 'Carolina',
                'last_name_one'         => 'Atenco',
                'last_name_two'         => 'Reyes',
                'full_name'             => 'Atenco Reyes Carolina',
                'speciality'            => 'Cirujano Dentista',
                'professional_card'     => '10648481',
                'cell_phone'            => '',
                'home_phone'            => '',
                'university'            => 'Universidad Autonoma de Tlaxcala'
            ],                      	
        ];

        foreach ($doctors as $doctor) {
        	Doctor::create( $doctor );
        }
    }
}
