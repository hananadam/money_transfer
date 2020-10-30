<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;

class RolePermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view Permissions To Role', ['only' => ['index', 'show']]);
        $this->middleware('can:create Permissions To Role', ['only' => ['create', 'store']]);
        $this->middleware('can:edit Permissions To Role', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete Permissions To Role', ['only' => ['destroy']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
//        if ($id == 1) return back();
        $role = Role::find($id);
        $data = $role->getAllPermissions();
        return view('rolePermissions.edit', compact('id', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
//        if ($id == 1) return back();
        $role = Role::find($id);
        $role->syncPermissions($request->permissions);
        return redirect(route('roles.index'));
    }
}
