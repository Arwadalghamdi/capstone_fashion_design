<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $primaryKey = 'category_id';
    protected $fillable = [
        'admin_id',
        'name',
    ];
    protected $table = "category";

    public function getIdAttribute()
    {
        return $this->category_id;
    }

    public function fashions()
    {
        return $this->hasMany(FashionDesign::class, 'category_id', 'category_id');
    }

    public $timestamps = false;
}