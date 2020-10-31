<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agency;
use Illuminate\Support\Facades\Validator;

use App;
use Session;

class AgenciesController extends Controller
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
    public function index(Agency $data)
    {
        $data = Agency::get();
        return view('agencies.index', compact('data'));  
    }

    public function create()
    {
        return view('agencies.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
        ]);
        if ($validator->fails()) return back()->withErrors($validator)->withInput();

        $data = $request->all();
        $Agency = new Agency();
        $saved = $Agency->createAgency($data);
        if ($saved)
            return redirect(route('agencies.index'));
    }

    public function edit($id)
    {
        $item = Agency::find($id);
        return view('agencies.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $Agency = new Agency();
        $saved = $Agency->updateAgency($data);
        if ($saved)
            return redirect(route('agencies.index'));

    }

    public function destroy($id)
    {   
        $Agency = new Agency();
        $Agency->deleteAgency($id);
        return redirect(route('agencies.index'));
    }
}
