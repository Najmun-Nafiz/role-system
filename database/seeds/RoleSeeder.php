<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'super admin']);
        $role = Role::create(['name' => 'agent']);   
        $role = Role::create(['name' => 'user']);
    }
}
