<?php

namespace App\Models;

use App\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory, HasUuid;
    protected $fillable = [
        'customer_id',
        'service_id',
        'transaction_date',
        'payment_method',
        'status',
        'total_price',
    ];

    protected $table = 'transactions';

    /**
     * relasi ke customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    /**
     * relasi ke service
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
