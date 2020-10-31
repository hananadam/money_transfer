<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $role = Role::create(['name' => 'admin']);
        // $role =auth()->user()->assignRole('admin');
        

        // Permission::create(['name' => 'view company']);
        // Permission::create(['name' => 'create company']);
        // Permission::create(['name' => 'edit company']);
        // Permission::create(['name' => 'delete company']);

        // Permission::create(['name' => 'view agency']);
        // Permission::create(['name' => 'create agency']);
        // Permission::create(['name' => 'edit agency']);
        // Permission::create(['name' => 'delete agency']);

        // Permission::create(['name' => 'view currency']);
        // Permission::create(['name' => 'create currency']);
        // Permission::create(['name' => 'edit currency']);
        // Permission::create(['name' => 'delete currency']);
      
        // Permission::create(['name' => 'view branch']);
        // Permission::create(['name' => 'create branch']);
        // Permission::create(['name' => 'edit branch']);
        // Permission::create(['name' => 'delete branch']); 

        // Permission::create(['name' => 'view transfer_rates']);
        // Permission::create(['name' => 'create transfer_rates']);
        // Permission::create(['name' => 'edit transfer_rates']);
        // Permission::create(['name' => 'delete transfer_rates']);

        // Permission::create(['name' => 'view Roles']);
        // Permission::create(['name' => 'create Roles']);
        // Permission::create(['name' => 'edit Roles']);
        // Permission::create(['name' => 'delete Roles']);

        // Permission::create(['name' => 'view Permissions To Role']);
        // Permission::create(['name' => 'create Permissions To Role']);
        // Permission::create(['name' => 'edit Permissions To Role']);
        // Permission::create(['name' => 'delete Permissions To Role']);

        // Permission::create(['name' => 'view Users']);
        // Permission::create(['name' => 'create Users']);
        // Permission::create(['name' => 'edit Users']);
        // Permission::create(['name' => 'delete Users']);

        // $role->givePermissionTo('view company');
        // $role->givePermissionTo('create company');
        // $role->givePermissionTo('edit company');
        // $role->givePermissionTo('delete company');

        // $role->givePermissionTo('view agency');
        // $role->givePermissionTo('create agency');
        // $role->givePermissionTo('edit agency');
        // $role->givePermissionTo('delete agency');

        // $role->givePermissionTo('view branch');
        // $role->givePermissionTo('create branch');
        // $role->givePermissionTo('edit branch');
        // $role->givePermissionTo('delete branch');

        // $role->givePermissionTo('view currency');
        // $role->givePermissionTo('create currency');
        // $role->givePermissionTo('edit currency');
        // $role->givePermissionTo('delete currency');

        // $role->givePermissionTo('view transfer_rates');
        // $role->givePermissionTo('create transfer_rates');
        // $role->givePermissionTo('edit transfer_rates');
        // $role->givePermissionTo('delete transfer_rates');

        // $role->givePermissionTo('view Roles');
        // $role->givePermissionTo('create Roles');
        // $role->givePermissionTo('edit Roles');
        // $role->givePermissionTo('delete Roles');

        // $role->givePermissionTo('view Permissions To Role');
        // $role->givePermissionTo('create Permissions To Role');
        // $role->givePermissionTo('edit Permissions To Role');
        // $role->givePermissionTo('delete Permissions To Role');

        // $role->givePermissionTo('view Users');
        // $role->givePermissionTo('create Users');
        // $role->givePermissionTo('edit Users');
        // $role->givePermissionTo('delete Users');

       
        // auth()->user()->assignRole('student');

       // return auth()->user()->getAllPermissions();
       //return  auth()->user()->permissions;
      
        return view('home');
    }
}
