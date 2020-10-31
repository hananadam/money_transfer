<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use Illuminate\Support\Facades\Validator;

use App;
use Session;

class CompaniesController extends Controller
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
    public function index(Company $data)
    {
        $data = Company::get();
        return view('companies.index', compact('data'));  
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
        ]);
        if ($validator->fails()) return back()->withErrors($validator)->withInput();

        $data = $request->all();
        $Company = new Company();
        $saved = $Company->createCompany($data);
        if ($saved)
            return redirect(route('companies.index'));


    }

    public function edit($id)
    {
        $item = Company::find($id);
        return view('companies.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $Company = new Company();
        $saved = $Company->updateCompany($data);
        if ($saved)
            return redirect(route('companies.index'));

    }

    public function destroy($id)
    {   
        $Company = new Company();
        $Company->deleteCompany($id);

        return redirect(route('companies.index'));
    }
}
