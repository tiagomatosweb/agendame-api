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
//        $roleManager = Role::create(['name' => 'gerente']);
//        $permissionManager = Permission::create(['name' => 'delete user']);
//        $roleManager->givePermissionTo($permissionManager);

        $user = User::inRandomOrder()->first();
        $user->assignRole('gerente');
    }
}
