<?php

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'role-view',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-view',
            'case-list',
            'case-create',
            'case-edit',
            'case-delete',
            'case-view',
            'case-assign',
            'case-approve',
            'case-investigation',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $role1 = Role::create(['name' => 'counter-officer']);
        $role1 ->givePermissionTo(['case-list', 'case-create', 'case-edit', 'case-view']);

        $role2 = Role::create(['name' => 'investigator-officer']);
        $role2 ->givePermissionTo(['case-list', 'case-view', 'case-investigation']);

        $role3 = Role::create(['name' => 'commander-officer']);
        $role3 ->givePermissionTo(['case-list', 'case-view', 'case-assign', 'case-approve']);


        $user = \App\User::find(1);
        $role = Role::where('name', 'super-admin')->get()->first();
        $user->assignRole($role);

    }
}
