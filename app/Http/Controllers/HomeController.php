<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /** 
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // auth()->user()->assignRole('admin');
       

        // Permission::create(['name' => 'view currency']);
        // Permission::create(['name' => 'create currency']);
        // Permission::create(['name' => 'edit currency']);
        // Permission::create(['name' => 'delete currency']);

     
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


        //Permission::create(['name' => 'print']);


       
        // $role1->givePermissionTo('print');

        //create roles and assign existing permissions
        // $role1 = Role::create(['name' => 'student']);
        // auth()->user()->givePermissionTo('view faculty');
        // auth()->user()->givePermissionTo('create faculty');
        // auth()->user()->assignRole('student');

       // return auth()->user()->getAllPermissions();
       //return  auth()->user()->permissions;
        return view('home');
    }

    public function lang($lang,$route)
    {
        session()->put(['locale' =>$lang]);
        if ($route) return redirect()->route($route);
        else  return redirect()->route('home');

    }
}