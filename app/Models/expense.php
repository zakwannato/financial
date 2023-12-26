<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'exp_date', 'exp_YM','exp_amount','pay_id','CC_id','exp_type','exp_description','exp_remarks','exp_zakwan','exp_rashidah'];
}
