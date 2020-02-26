<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Patient;

class PasienSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'id' => 5,
            'email' => 'pasien1@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $user->assignRole('pasien');

        $pasien = Patient::firstOrCreate([
            'user_id' => $user->id,
            'nik' => '129380109238',
            'name' => 'Pasien Pertama',
            'date_of_birth' => '1992-12-02',
            'phone' => '0811115890',
            'address' => 'From Kesakitan',
            'photo' => null
        ]);

        $user = User::firstOrCreate([
            'id' => 6,
            'email' => 'pasien2@gmail.com',
            'password' => bcrypt('admin')
        ]);
        $user->assignRole('pasien');

        $pasien = Patient::firstOrCreate([
            'user_id' => $user->id,
            'nik' => '129038102938',
            'name' => 'Pasien Kedua',
            'date_of_birth' => '1992-12-02',
            'phone' => '0811115890',
            'address' => 'From Kesakitan',
            'photo' => null
        ]);
    }
}
