<?php

use Illuminate\Database\Seeder;

class IncidentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'name','fromIp','latitude','longitude','location','photo'
        $faker = Faker\Factory::create();
        $faker->addProvider(new Faker\Provider\en_NG\Address($faker));
        $faker->addProvider(new Faker\Provider\en_NG\Person($faker));
        $faker->addProvider(new Faker\Provider\Internet($faker));
        $faker->addProvider(new Faker\Provider\DateTime($faker));

        $geo =new \App\Services\GeoCord();
        for($i=0; $i<30; $i++){
            $data['name'] =$faker->name;
            $data['fromIp']=$faker->ipv4;
            $data['location']=$faker->address;
            $data['email']=$faker->email;
            $data['created_at']= $faker->dateTimeThisMonth;
            $data['latitude']=$faker->latitude(6,7);  // 77.147489longitude($min = -180, $max = 180)
            $data['longitude']=$faker->longitude(3,4);
            \App\Incident::create($data);
        }
    }
}
