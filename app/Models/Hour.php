<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    use HasFactory;
    protected $fillable = [
        'hour',
        'employee_dui',
        'ty',
        'month_id'
    ];
    public $timestamps = false;
}
