<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TestController extends Controller
{
    public function __invoke()
    {
        $roleAdmin = Role::find(1);
        $roleAtendente = Role::find(2);

        // Criando permissões
        // $permissionDeleteUser = Permission::create(['name' => 'delete user']);

        // Atribuindo permissão ao cargo
        // $roleAdmin->givePermissionTo($permissionDeleteUser);

        setPermissionsTeamId(1);

        // Pedro - dono da Dental Systems
        $pedro = User::find(1);
//        $pedro->assignRole($roleAdmin);
        dd($pedro->can('delete user'));

        // Melisa - Não é nada
        $melisa = User::find(2);
//        dd($melisa->can('delete user'));
    }
}
