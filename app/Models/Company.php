<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $table = "company";
    protected $primaryKey = 'id';
    public $timestamps = true;


    public function createCompany($data)
    {
        $company = new Company;

        $company->name = $data['name'];
        $company->address = $data['address'];
        $company->website = $data['website'];
        $company->email = $data['email'];
        return $company->save();
    }

    public function updateCompany($data)
    {
        $company = Company::find($data['id']);

        $company->name = $data['name'];
        $company->address = $data['address'];
        $company->website = $data['website'];
        $company->email = $data['email'];
        return $company->save(); 
    }

    public function deleteCompany($id)
    {
        return Company::find($id)->delete();
    }


}
