<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Currency;
use Illuminate\Support\Facades\Validator;

use App;
use Session;

class CurrencyController extends Controller
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
    public function index(Currency $data)
    {
        $data = Currency::get();
        return view('currency.index', compact('data'));  
    }

    public function create()
    {
        return view('currency.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'name' => 'required',
        ]);
        if ($validator->fails()) return back()->withErrors($validator)->withInput();

        $data = $request->all();
        $Currency = new Currency();
        $saved = $Currency->createCurrency($data);
        if ($saved)
            return redirect(route('currency.index'));


    }

    public function edit($id)
    {
        $item = Currency::find($id);
        return view('currency.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $Currency = new Currency();
        $saved = $Currency->updateCurrency($data);
        if ($saved)
            return redirect(route('currency.index'));

    }

    public function destroy($id)
    {   
        $Currency = new Currency();
        $Currency->deleteCurrency($id);

        return redirect(route('currency.index'));
    }
}
