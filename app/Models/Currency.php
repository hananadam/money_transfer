<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public $table = "currency";
    protected $primaryKey = 'id';
    public $timestamps = true;


    public function createCurrency($data)
    {
        $currency = new Currency;

        $currency->name = $data['name'];
        return $currency->save();
    }

    public function updateCurrency($data)
    {
        $currency = Currency::find($data['id']);

        $currency->name = $data['name'];
        return $currency->save(); 
    }

    public function deleteCurrency($id)
    {
        return Currency::find($id)->delete();
    }


}
