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
//        $roleAdmin = Role::find(1);
//        $roleAtendente = Role::find(2);

        // Criando permissões
//         $permissionDeleteUser = Permission::find(1);

        // Atribuindo permissão ao cargo
        // $roleAdmin->givePermissionTo($permissionDeleteUser);
//        $roleAtendente->revokePermissionTo($permissionDeleteUser);

        // Pedro - dono da Dental Systems
        $contexto = getPermissionsTeamId();
        dd($contexto);
        $pedro = User::find(1);
//        $pedro->assignRole($roleAtendente);
        dd($pedro->can('delete user'));

        // Melisa - Não é nada
//        $melisa = User::find(2);
//        $melisa->assignRole('atendente');
//        dd($melisa->can('delete user'));
    }
}
