<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        Role::create(['name' => 'atendente']);
        Role::create(['name' => 'cliente']);

        $permissionDeleteUser = Permission::create(['name' => 'delete_user']);
        $admin->givePermissionTo($permissionDeleteUser);
    }
}
