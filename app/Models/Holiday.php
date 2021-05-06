<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function employeeDetail(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
