<?php
namespace App\Models;

use App\Traits\HasStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends AuditedEntity {
    use HasStatus, HasFactory;
    protected $table = 'invoices';
    // public int $user_id;
    // public float $total;
    // public float $paid;
    // public int $status;

    public const RULES = [
        
    ];

    protected $fillable = [
        ...parent::FILLABLE,
        'customer_id',
        'total',
        'paid',
        'customer_name',
        'address',
        'phone_number'
    ];

    public function details()
    {
        return $this->hasMany(InvoiceDetail::class, 'invoice_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}