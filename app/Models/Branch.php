<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public $table = "agency_branches";
    protected $primaryKey = 'id';
    public $timestamps = true;


    function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function createBranch($data)
    {
        $branch = new Branch;

        $branch->agency_id = $data['agency_id'];
        $branch->name = $data['name'];
        $branch->address = $data['address'];
        $branch->longitude = $data['longitude'];
        $branch->latitude = $data['latitude'];
        return $branch->save();
    }

    public function updateBranch($data)
    {
        $branch = Branch::find($data['id']);
        
        $branch->agency_id = $data['agency_id'];
        $branch->name = $data['name'];
        $branch->address = $data['address'];
        $branch->longitude = $data['longitude'];
        $branch->latitude = $data['latitude'];
        return $branch->save(); 
    }

    public function deleteBranch($id)
    {
        return Branch::find($id)->delete();
    }


}
