<?php

use App\Admin;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
      	$user = User::firstOrCreate([
			'id' => 1,
			'email' => 'admin@gmail.com',
			'password' => bcrypt('admin'),
		]);
		$user->assignRole('admin');
		
		$admin = Admin::firstOrCreate([
			'user_id' => $user->id,
			'name' => 'Admin Web',
			'date_of_birth' => '1999-12-30',
			'phone' => '085759082377',
			'address' => 'Everywhere I Life Still Coding !',
			'photo' => null	
		]);
    }
}
