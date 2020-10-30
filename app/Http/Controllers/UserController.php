<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Spatie\Permission\Role;
use Hash;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view Users', ['only' => ['index', 'show']]);
        $this->middleware('can:create Users', ['only' => ['create', 'store']]);
        $this->middleware('can:edit Users', ['only' => ['edit', 'update']]);
        $this->middleware('can:delete Users', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $data = User::get();
        return view('users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role_id' => 'required|int|exists:roles,id',
        ]);
        if ($validator->fails()) 
        return back()->withErrors($validator)->withInput();

        // 'password'=> Hash::make($request->password);
        $inputs = $request->all();
        $inputs['password']=Hash::make($request->password);

        $inputs['created_by'] = auth()->user()->id;
        $item = User::create($inputs);
        $item->assignRole($request->role_id);

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $item = User::find($id);
        return view('users.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        if ($id == 1) return back();
        $item = User::find($id);
        return view('users.edit', compact('item'));
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
        if ($id == 1) return back();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'role_id' => 'required|int|exists:roles,id',
        ]);
        if ($validator->fails()) return back()->withErrors($validator)->withInput();

        $inputs = $request->all();
        $inputs['updated_by'] = auth()->user()->id;
        $inputs['password']=Hash::make($request->password);
        
        $item = User::find($id);
        $item->update($inputs);
        $item->removeRole($request->role_id);
        $item->assignRole($request->role_id);

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return back();
    }
}
