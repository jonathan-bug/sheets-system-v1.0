<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'dui';
    public $timestamps = false;
    protected $fillable = [
        'dui',
        'first_name',
        'second_name',
        'first_lastname',
        'second_lastname',
        'birth_date',
        'entry_date',
        'calculated_date'
    ];
    
}
