<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $primaryKey = 'invoice_id';
    protected $fillable = [
        'payment_id',
        'invoice_number',
        'invoice_date',
        'billing_address',
        'total_amount',
    ];
    protected $table = "invoice";

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
    public $timestamps = false;
}
