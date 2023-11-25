<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'exp_date', 'exp_amount','pay_id','exp_remarks'];
}
