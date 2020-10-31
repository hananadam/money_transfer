<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use \App\Models\User;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $role = Role::create(['name' => 'admin']);    


        $role->givePermissionTo('view company');
        $role->givePermissionTo('create company');
        $role->givePermissionTo('edit company');
        $role->givePermissionTo('delete company');

        $role->givePermissionTo('view agency');
        $role->givePermissionTo('create agency');
        $role->givePermissionTo('edit agency');
        $role->givePermissionTo('delete agency');

        $role->givePermissionTo('view branch');
        $role->givePermissionTo('create branch');
        $role->givePermissionTo('edit branch');
        $role->givePermissionTo('delete branch');

        $role->givePermissionTo('view currency');
        $role->givePermissionTo('create currency');
        $role->givePermissionTo('edit currency');
        $role->givePermissionTo('delete currency');

        $role->givePermissionTo('view transfer_rates');
        $role->givePermissionTo('create transfer_rates');
        $role->givePermissionTo('edit transfer_rates');
        $role->givePermissionTo('delete transfer_rates');

        $role->givePermissionTo('view Roles');
        $role->givePermissionTo('create Roles');
        $role->givePermissionTo('edit Roles');
        $role->givePermissionTo('delete Roles');

        $role->givePermissionTo('view Permissions To Role');
        $role->givePermissionTo('create Permissions To Role');
        $role->givePermissionTo('edit Permissions To Role');
        $role->givePermissionTo('delete Permissions To Role');

        $role->givePermissionTo('view Users');
        $role->givePermissionTo('create Users');
        $role->givePermissionTo('edit Users');
        $role->givePermissionTo('delete Users');

     }
}        