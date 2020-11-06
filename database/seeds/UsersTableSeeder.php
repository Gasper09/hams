<?php

use Illuminate\Database\Seeder;
use App\User;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate(['name' => 'admin'] );
        Permission:: firstOrCreate([ 'name' => 'UpdateInfo' ]);

        User::firstOrCreate([
        	'name' => 'Admin',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('12345678'),
        	'phone_number' => '0718944022'
        ])
        ->assignRole('admin')->givePermissionTo('UpdateInfo');
    
    }
}
