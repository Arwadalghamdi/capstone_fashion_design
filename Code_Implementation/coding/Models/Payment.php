<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $primaryKey = 'payment_id';
    protected $fillable = [
        'order_id',
        'amount',
        'payment_method',
        'payment_status',
        'transaction_id'
    ];
    protected $table = "payment";

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public $timestamps = false;
}
