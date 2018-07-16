<?php

use Illuminate\Database\Seeder;
//add
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
        	['name' => 'Profilaxis', 'price_single'=>'400','type'=>'NORMAL'],
        	['name' => 'Resina','price_single'=>'670','type'=>'NORMAL'],
        	['name' => 'Amalgamas', 'price_single'=>'130','type'=>'NORMAL'],
        	['name' => 'Protesis', 'price_single'=>'560','type'=>'SPECIAL'],                      
        ];

        foreach ($services as $service) {
        	Service::create( $service );
        }

    }
}
