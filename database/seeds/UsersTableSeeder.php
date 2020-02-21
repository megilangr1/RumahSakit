<?php

use App\Admin;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::firstOrCreate([
				'id' => 1,
				'email' => 'megilangr1@gmail.com',
				'password' => bcrypt('nanozero1'),
			]);
			$user->assignRole('admin');
			
			$admin = Admin::firstOrCreate([
				'user_id' => $user->id,
				'name' => 'Me Gilang R',
				'date_of_birth' => '1999-12-30',
				'phone' => '085759082377',
				'address' => 'Everywhere I Life Still Play League of Legend !',
				'photo' => null	
			]);

			$user = User::firstOrCreate([
				'id' => 2,
				'email' => 'menazoru@gmail.com',
				'password' => bcrypt('nanozero1')
			]);
			$user->assignRole('admin');
			
			$admin = Admin::firstOrCreate([
				'user_id' => $user->id,
				'name' => 'Maesaraga Kelana',
				'date_of_birth' => '2002-11-24',
				'phone' => '082125648834',
				'address' => 'Cikiray',
				'photo' => null
			]);

    }
}
