<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commitment extends Model
{
    use HasFactory;

    protected $fillable = ['com_t_id','com_YM','pay_flag','com_amount','com_pay_date'];
}
