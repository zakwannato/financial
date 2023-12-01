<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_commitment extends Model
{
    use HasFactory;

    protected $fillable = ['com_name', 'active_flag'];
}
