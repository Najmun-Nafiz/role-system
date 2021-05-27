<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\User;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
              'group_name' => 'user',
              'permissions' => [
                'user-list',
                'user-create',
                'user-edit',
                'user-delete',
              ]
            ],
            [
              'group_name' => 'role',
              'permissions' => [
                'role-list',
                 'role-create',
                 'role-edit',
                 'role-delete',
              ]
            ]
        ];
   
        // Create Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
            }
        }
    }
}
