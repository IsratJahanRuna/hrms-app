<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function department(){
        return $this -> belongsTo(Department::class,'department_id','id');
    }
    public function employeeDetail(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
