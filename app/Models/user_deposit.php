<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_deposit extends Model
{
    use HasFactory;

    public function deposit_usr()
    {
        return $this->hasOne(User::class,'id','user_id')->select('id','name','email');
    }

    public function deposit_tran()
    {
        return $this->hasOne(transaction::class,'dep_id','id');
    }

    public function deposit_gway()
    {
        return $this->hasOne(gateway::class,'id','gateway_id');
    }
}
