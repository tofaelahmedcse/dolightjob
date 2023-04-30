<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class,'id','user_id')->select('id','name','email');
    }

    public function transaction_dep()
    {
        return $this->hasOne(user_deposit::class,'id','dep_id');
    }

    public function transaction_with()
    {
        return $this->hasOne(withdraw::class,'id','with_id');
    }
}
