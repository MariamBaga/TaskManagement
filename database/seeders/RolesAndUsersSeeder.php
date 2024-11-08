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

        // Créer des permissions
        $permissions = [
            'create tasks',
            'edit tasks',
            'delete tasks',
            'view tasks'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Assigner toutes les permissions au rôle admin
        $adminRole->givePermissionTo(Permission::all());

        // Assigner des permissions spécifiques au rôle utilisateur standard
        $userRole->givePermissionTo(['view tasks']);

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
