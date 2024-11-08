<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Désactiver temporairement les contraintes de clés étrangères
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Supprimer les permissions et rôles existants
        Permission::query()->delete();
        Role::query()->delete();

        // Réactiver les contraintes de clés étrangères
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Permissions pour la gestion des utilisateurs
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'view users']);

        // Permissions pour la gestion des tâches
        Permission::create(['name' => 'create tasks']);
        Permission::create(['name' => 'edit tasks']);
        Permission::create(['name' => 'delete tasks']);
        Permission::create(['name' => 'view tasks']);

        // Permissions pour la gestion des projets
        Permission::create(['name' => 'create projects']);
        Permission::create(['name' => 'edit projects']);
        Permission::create(['name' => 'delete projects']);
        Permission::create(['name' => 'view projects']);

        // Permissions pour la collaboration en temps réel
        Permission::create(['name' => 'receive notifications']);
        Permission::create(['name' => 'update task views']);

        // Créer les rôles
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'utilisateur standard']);

        // Assigner toutes les permissions à l'admin
        $admin->givePermissionTo(Permission::all());

        // Assigner les permissions de base à l'utilisateur standard
        $user->givePermissionTo([
            'view users',
            'view tasks',
            'create tasks',
            'edit tasks',
            'view projects',
            'receive notifications',
            'update task views'
        ]);
    }
}
