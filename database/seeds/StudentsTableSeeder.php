<?php

use App\StudentRequest;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role::firstOrCreate(['name' => 'Student'] );
        // Permission:: firstOrCreate([ 'name' => 'RequuestRoom']);
        factory(App\StudentRequest::class, 100);
                // ->create()->assignRole('Student')->givePermissionTo('UpdateInfo');
    }
}
