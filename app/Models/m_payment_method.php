<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_payment_method extends Model
{
    use HasFactory;

    protected $fillable = ['pay_name'];
}
