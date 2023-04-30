<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_apply extends Model
{
    use HasFactory;

    public function jobs()
    {
        return $this->belongsTo(all_job::class);
    }
}
