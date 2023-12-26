<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class credit_card extends Model
{
    use HasFactory;

    protected $fillable = ['CC_name','user_id','cutoff_day'];
}
