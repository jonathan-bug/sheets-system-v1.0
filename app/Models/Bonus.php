<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;

    protected $table = 'bonuses';
    protected $fillable = [
        'mont',
        'reason',
        'employee_dui',
        'month_id'
    ];
    public $timestamps = false;
}
