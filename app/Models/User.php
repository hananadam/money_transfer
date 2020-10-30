<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
// use App\Role;
use Spatie\Permission\Models\Role;
class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getUsers($user_id = null)
    {
        if ($user_id == null)
            return User::get()->toArray();
        else
            return User::where('id', $user_id)->get()->toArray();
    }


    function Role()
    {
        return $this->belongsTo(Role::class);
    }
    public function getStudentAdmissionNumber($user_id)
    {
        $result = json_decode(json_encode(DB::select(DB::raw("SELECT student_admission_number 
                                    FROM student_data 
                                    WHERE user_id = :userid"), ['userid' => $user_id])), 1);
        return $result[0]['student_admission_number'];
    }

    public function getStudentAcademicCode($user_id)
    {
        $result = json_decode(json_encode(DB::select(DB::raw("SELECT student_academic_code 
                                    FROM student_data 
                                    WHERE user_id = :userid"), ['userid' => $user_id])), 1);
        return $result[0]['student_academic_code'];
    }
    public function getStudentAcademicCodeByAdmissionNumber($student_admission_number)
    {
        $result = json_decode(json_encode(DB::select(DB::raw("SELECT student_academic_code 
                                    FROM student_data 
                                    WHERE student_admission_number = :student_admission_number"), ['student_admission_number' => $student_admission_number])), 1);
        return $result[0]['student_academic_code'];
    }
}
