<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends FullAuditedEntity
{
    use HasFactory;

    public const RULES = [
        'name' => 'required',
        'phone_number' => 'required',
        'address' => 'required'
    ];
    protected $table = 'customers';
    protected $fillable = [
        ...parent::FILLABLE,
        'name',
        'address',
        'phone_number',
        'debt',
        'birth',
        'bank_number',
        'bank_name'
    ];
}
