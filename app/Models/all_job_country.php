<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class all_job_country extends Model
{
    use HasFactory;
    protected $fillable=['user_id','job_id','country_id'];
}
