<?php

use Illuminate\Database\Seeder;
//add
use App\Customer;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Customer::class, 20)->create();

        $customer = [
        	'name' => 'Marco A.',
        	'last_name_one' => 'Ramirez',
        	'last_name_two' => 'Cesar',
        	'full_name' => 'Ramirez Cesar Marco A.',
        	'address' => 'Av Benito Juarez #26',
        	'references' => 'Frente a Farmacia Similares',
        	'age' => '26',
        	'cell_phone' => '248149172',
        	'home_phone' => '246774434',
        	'sex' => 'MASCULINO',
        	'civil_state' => 'SOLTERO',
        	'img_name' => 'customers/avatar_male.png',
        	'status' => 'ACTIVO',
        	'occupation_id' => '3',
        ];

        Customer::create( $customer );
    }
}
