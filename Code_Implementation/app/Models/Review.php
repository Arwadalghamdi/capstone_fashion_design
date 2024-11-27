<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $primaryKey = 'review_id';
    protected $fillable = [
        'customer_id',
        'product_id',
        'designer_id',
        'admin_id',
        'rating',
        'comment',
        'order_id'
    ];
    protected $table = "review";

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function designer()
    {
        return $this->belongsTo(Designer::class, 'designer_id', 'designer_id');
    }

    public function fashionDesign()
    {
        return $this->belongsTo(FashionDesign::class, 'product_id', 'product_id');
    }

    public function getIdAttribute()
    {
        return $this->review_id;
    }
    public $timestamps = false;
}
