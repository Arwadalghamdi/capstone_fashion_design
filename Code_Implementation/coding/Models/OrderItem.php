<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_item_id';
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'selected_color',
        'selected_size',
        'selected_fabric'
    ];
    protected $table = "order_item";

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }

    public function fashionDesign()
    {
        return $this->belongsTo(FashionDesign::class, 'product_id', 'product_id');
    }

    public function customization()
    {
        return $this->hasOne(Customization::class, 'order_item_id', 'order_item_id');
    }
    public $timestamps = false;
}
