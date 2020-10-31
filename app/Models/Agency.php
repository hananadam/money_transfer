<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    public $table = "agency";
    protected $primaryKey = 'id';
    public $timestamps = true;


    function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function createAgency($data)
    {
        $agency = new Agency;

        $agency->company_id = $data['company_id'];
        $agency->name = $data['name'];
        $agency->address = $data['address'];
        $agency->website = $data['website'];
        $agency->email = $data['email'];
        return $agency->save();
    }

    public function updateAgency($data)
    {
        $agency = Agency::find($data['id']);
        
        $agency->company_id = $data['company_id'];
        $agency->name = $data['name'];
        $agency->address = $data['address'];
        $agency->website = $data['website'];
        $agency->email = $data['email'];
        return $agency->save(); 
    }

    public function deleteAgency($id)
    {
        return Agency::find($id)->delete();
    }


}
