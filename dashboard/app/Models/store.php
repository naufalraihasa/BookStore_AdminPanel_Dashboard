<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function books()
    {
        return $this->hasMany(books::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'store_id');
    }

}
