<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Designer extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = 'designer_id';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'address',
        'profile_picture',
        'bio',
        'account_status'
    ];
    protected $table = "designer";

    public function fashionDesigns()
    {
        return $this->hasMany(FashionDesign::class, 'designer_id', 'designer_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'designer_id', 'designer_id');
    }

    public function getAvatarAttribute()
    {
        $img = $this->profile_picture;
        if(!$img || !file_exists(public_path($img))){
            return url('no_img.jpg');
        }
        return url($img);
    }

    public function rate()
    {
        return $this->reviews->avg('rating');
    }

    public function getIdAttribute()
    {
        return $this->designer_id;
    }

    public $timestamps = false;
}
