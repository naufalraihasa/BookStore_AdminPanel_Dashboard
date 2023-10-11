<?php

namespace App\Models;

use App\Models\books;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

