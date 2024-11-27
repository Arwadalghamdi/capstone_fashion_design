<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCoupon extends Model
{
    use HasFactory;
    protected $primaryKey = 'discount_coupon_id';
    protected $fillable = [
        'designer_id',
        'code',
        'description',
        'discount_percentage',
        'valid_from',
        'valid_to',
    ];
    protected $table = "discount_coupon";

    public function designer()
    {
        return $this->belongsTo(Designer::class, 'designer_id', 'designer_id');
    }

    public function getIdAttribute()
    {
        return $this->discount_coupon_id;
    }

    public $timestamps = false;
}
