<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customization extends Model
{
    use HasFactory;
    protected $primaryKey = 'customization_id';
    protected $fillable = [
        'customer_id',
//        'product_id',
        'order_item_id',
        'customization_details',
    ];
    protected $table = "customization";

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function fashionDesign()
    {
        return $this->belongsTo(FashionDesign::class, 'order_item_id', 'product_id');
    }

    public $timestamps = false;
}
