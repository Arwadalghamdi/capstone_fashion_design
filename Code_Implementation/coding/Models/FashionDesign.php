<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FashionDesign extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'designer_id',
        'title',
        'description',
        'category_id',
        'price',
        'image',
        'sizes',
        'fabrics',
        'colors',
        'availability_status',
    ];
    protected $table = "product";

     // Add the property you want to cast as an array
     protected $casts = [
        'sizes' => 'array',
        'colors' => 'array',
    ];

    public function designer()
    {
        return $this->belongsTo(Designer::class, 'designer_id', 'designer_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class, 'product_id', 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'product_id');
    }

    public function rate()
    {
        return $this->reviews->avg('rating');
    }

    public function getImagePathAttribute()
    {
        $img = $this->image;
        if(!$img || !file_exists(public_path($img))){
            return url('no_img.jpg');
        }
        return url($img);
    }

    public function getIdAttribute()
    {
        return $this->product_id;
    }

    public function customizations()
    {
        return $this->hasMany(Customization::class, 'product_id', 'product_id');
    }

    public function customize($order)
    {
        $cust = $this->orderItem()->where('order_item_id', $order)->first();
        return $cust ? $cust->customization_details : 'No';
    }

    public $timestamps = false;
}
