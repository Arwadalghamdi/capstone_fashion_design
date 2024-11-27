<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $primaryKey = 'admin_id';
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];
    protected $table = "admin";

    public function getIdAttribute()
    {
        return $this->admin_id;
    }
    public $timestamps = false;
}
