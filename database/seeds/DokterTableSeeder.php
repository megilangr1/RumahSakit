<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Doctor;

class DokterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'id' => 3,
            'email' => 'surisky@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $user->assignRole('dokter');

        $dokter = Doctor::firstOrCreate([
            'user_id' => $user->id,
            'nip' => '1120938234',
            'name' => 'Surisky Permatasari',
            'service_id' => $user->service_id,
            'date'
        ]);
    }
}
