<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferRate extends Model
{
    public $table = "transfer_rates";
    protected $primaryKey = 'id';
    public $timestamps = true;


    function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function createTransferRate($data)
    {
        $transfer = new TransferRate;


        $data_arr= [];
        foreach($data as $row)
        {
        // var_dump($row['agency_id']); 

        //     if(! empty($row))
        //     {
        //         $data_arr[] = [
        //             $transfer->agency_id = $row['agency_id'];
        //             $transfer->currency_id = $row['currency_id'];
        //             $transfer->from_country = $row['from_country'];
        //             $transfer->to_country = $row['to_country'];
        //             $transfer->amount_start_range = $row['start_range'];
        //             $transfer->amount_end_range = $row['end_range'];
        //             $transfer->transfer_fee = $row['transfer_fee'];
        //         ];
        //     }
        }

       
        return $transfer->save();
    }

    public function updateTransferRate($data)
    {
        $transfer = TransferRate::find($data['id']);
        
        $transfer->agency_id = $data['agency_id'];
        $transfer->currency_id = $data['currency_id'];
        $transfer->from_country = $data['from_country'];
        $transfer->to_country = $data['to_country'];
        $transfer->amount_start_range = $data['start_range'];
        $transfer->amount_end_range = $data['end_range'];
        $transfer->transfer_fee = $data['transfer_fee'];
        return $transfer->save(); 
    }

    public function deleteTransferRate($id)
    {
        return TransferRate::find($id)->delete();
    }


}
