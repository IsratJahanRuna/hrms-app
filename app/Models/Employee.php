<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $guarded= [];
    public function department(){
        return $this -> belongsTo(Department::class,'department_id','id');
    }

    public function designation(){
        return $this -> belongsTo(Designation::class,'designation_id','id');
    }

    // public function salary(){
    //     return $this -> belongsTo(Salary::class,'salary_id','id');
    // }

    public function employeeDetail(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function employeeAttendance(){
        return $this->belongsTo(Attendance::class, 'user_id', 'id');
    }
}
