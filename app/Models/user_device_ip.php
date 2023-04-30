<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_device_ip extends Model
{
    use HasFactory;

    public function userdetails()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->select('id', 'name', 'email');
    }

}
