<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'customer_id',
        'total_amount',
        'discount_value',
        'invoice_date',
        'status',
    ];
    protected $table = "order";

    public function reviews()
    {
        return $this->hasMany(Review::class, 'order_id', 'order_id');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'payment_id', 'order_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id', 'order_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function getIdAttribute()
    {
        return $this->order_id;
    }
}
