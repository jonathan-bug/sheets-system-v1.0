<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Salary;
use App\Models\Hour;

class Employee extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'dui';
    public $incrementing = false;
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

    public function salaries() {
        return $this->hasMany(Salary::class);
    }

    public function hours() {
        return $this->hasMany(Hour::class);
    }
}
