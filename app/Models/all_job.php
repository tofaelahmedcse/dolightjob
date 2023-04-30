<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class all_job extends Model
{
    use HasFactory;


    public function scopeActive($query)
    {
        return $query->where('job_status',2);
    }

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id')->select('id','name','email');
    }


    public function applyedJob()
    {
        return $this->hasMany(job_apply::class,'job_id','id');
    }


}
