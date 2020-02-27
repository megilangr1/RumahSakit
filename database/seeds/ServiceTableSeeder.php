<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service = Service::firstOrCreate([
            'name' => 'Poli Gigi',
            'description' => 'Spesialis Gigi'
        ]);

        $service = Service::firstOrCreate([
            'name' => 'Poli Penyakit Dalam',
            'description' => 'Spesialis Daleman'
        ]);

        $service = Service::firstOrCreate([
            'name' => 'Poli THT',
            'description' => 'Spesialis Telinga Hidung Tenggorokan'
        ]);

        $service = Service::firstOrCreate([
            'name' => 'Poli Anak',
            'description' => 'Spesialis Anak'
        ]);
    }
}
