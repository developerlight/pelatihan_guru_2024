<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'view role']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'view permission']);
        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'delete permission']);

        Permission::create(['name' => 'view user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'view student']);
        Permission::create(['name' => 'create student']);
        Permission::create(['name' => 'update student']);
        Permission::create(['name' => 'delete student']);

        $superAdminRole = Role::create(['name' => 'super admin']);
        $adminRole = Role::create(['name' => 'admin']);
        $stafRole = Role::create(['name' => 'staff']);
        $userRole = Role::create(['name' => 'user']);

        // lets give super admin all permissions
        $allPermissionsNames = Permission::all()->pluck('name')->toArray();
        $superAdminRole->givePermissionTo($allPermissionsNames);

        // lets give admin some permissions
        $adminRole->givePermissionTo([
            'view role',
            'create role',
            'update role',
            'delete role',
            'view permission',
            'create permission',
            'update permission',
            'delete permission',
            'view user',
            'create user',
            'update user',
            'delete user',
            'view student',
            'create student',
            'update student',
            'delete student',
        ]);

        // create a user and assign the super admin role
        $superAdminUser = User::firstOrCreate([
                'email' => 'superadmin@gmail.com'
            ] , [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('12345678')
            ]
        );

        $superAdminUser->assignRole($superAdminRole);

        $adminUser = User::firstOrCreate([
            'email' => 'admin@gmmail.com'
        ],[
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $adminUser->assignRole($adminRole);

        $stafUser = User::firstOrCreate([
            'email' => 'staff@gmail.com'
        ],[
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('12345678')
        ]);
        $stafUser->assignRole($stafRole);

    }
}
