<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Branch;
use Illuminate\Support\Facades\Validator;

use App;
use Session;

class BranchesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {           
        return true;
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Branch $data)
    {
        $data = Branch::get();
        return view('branches.index', compact('data'));  
    }

    public function create()
    {
        return view('branches.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
        ]);
        if ($validator->fails()) return back()->withErrors($validator)->withInput();

        $data = $request->all();
        $Branch = new Branch();
        $saved = $Branch->createBranch($data);
        if ($saved)
            return redirect(route('branches.index'));
    }

    public function edit($id)
    {
        $item = Branch::find($id);
        return view('branches.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $Branch = new Branch();
        $saved = $Branch->updateBranch($data);
        if ($saved)
            return redirect(route('branches.index'));

    }

    public function destroy($id)
    {   
        $Branch = new Branch();
        $Branch->deleteBranch($id);
        return redirect(route('branches.index'));
    }
}
