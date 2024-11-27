<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'address',
        'profile_picture'
    ];
    protected $table = "customer";

    public function customizations()
    {
        return $this->hasMany(Customization::class, 'customer_id', 'customer_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'customer_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'customer_id', 'customer_id');
    }

    public function getIdAttribute()
    {
        return $this->customer_id;
    }

    public function getAvatarAttribute()
    {
        $img = $this->profile_picture;
        if(!$img || !file_exists(public_path($img))){
            return url('no_img.jpg');
        }
        return url($img);
    }

    public $timestamps = false;
}
