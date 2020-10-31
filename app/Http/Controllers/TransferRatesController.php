<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TransferRate;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\TransferRequest;

use App;
use Session;

class TransferRatesController extends Controller
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
    public function index(TransferRate $data)
    {
        $data = TransferRate::get();
        return view('transfer_rates.index', compact('data'));  
    }

    public function create()
    {
        return view('transfer_rates.create');
    }

    public function store(TransferRequest $request)
    {
       
        $data = $request->all();
        // $transfer = new TransferRate();
        if(count($request->agency_id) >0 ){
            foreach ($request->agency_id as $item => $value) {
                $arr=array(
                     'agency_id' => $request->agency_id[$item],
                     'currency_id' => $request->currency_id[$item],
                     'from_country' => $request->from_country[$item],
                     'to_country' => $request->to_country[$item],
                     'amount_start_range' => $request->start_range[$item],
                     'amount_end_range' => $request->end_range[$item],
                     'transfer_fee' => $request->transfer_fee[$item]
       
                );
                TransferRate::insert($arr);
            }
        }
      
        return redirect(route('transfer_rates.index'));
    }

    public function edit($id)
    {
        $item = TransferRate::find($id);
        return view('transfer_rates.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $data = $request->all();

        $transfer = new TransferRate();
        $saved = $transfer->updateTransferRate($data);
        if ($saved)
            return redirect(route('transfer_rates.index'));

    }

    public function destroy($id)
    {   
        $transfer = new TransferRate();
        $transfer->deleteTransferRate($id);
        return redirect(route('transfer_rates.index'));
    }
}
