<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    protected $fillable = [
        'customer_name',
        'email',
        'phone',
        'address',
        'store_id',
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}