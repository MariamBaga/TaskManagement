<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndUsersSeeder extends Seeder
{
    public function run()
    {
        // Effacer les rôles et permissions sans affecter les clés étrangères
        \DB::table('role_has_permissions')->delete();
        \DB::table('permissions')->delete();
        \DB::table('roles')->delete();

        // Créer les rôles
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'utilisateur standard']);

        // Créer des permissions pour les tâches et les projets
        $permissions = [
            'create tasks',
            'edit tasks',
            'delete tasks',
            'view tasks',
            'create projects',
            'edit projects',
            'delete projects',
            'view projects'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assigner toutes les permissions au rôle admin
        $adminRole->givePermissionTo(Permission::all());

        // Assigner uniquement les permissions de visualisation au rôle utilisateur standard
        $userRole->givePermissionTo(['view tasks', 'view projects']);

        // Créer ou récupérer un utilisateur spécifique et lui assigner le rôle admin
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password123')
            ]
        );
        $user->assignRole($adminRole);
    }
}
