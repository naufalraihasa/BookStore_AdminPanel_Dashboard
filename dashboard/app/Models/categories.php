<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category_name',
        'description',
    ];

    public $timestamps = false;

    public function books()
    {
        return $this->hasMany(books::class);
    }
}

