<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    
    public const RULES = [
        'name' => 'required'
    ];
    protected $table = 'employees';

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'date',       
        'sex'
    ];
}
