<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::firstOrCreate([
					'name' => 'admin',
					'guard_name' => 'web'
				]);
				
				$role = Role::firstOrCreate([
					'name' => 'dokter',
					'guard_name' => 'web'
				]);
				
				$role = Role::firstOrCreate([
					'name' => 'operator',
					'guard_name' => 'web'
				]);

				$role = Role::firstOrCreate([
					'name' => 'pasien',
					'guard_name' => 'web'
				]);
				
    }
}
