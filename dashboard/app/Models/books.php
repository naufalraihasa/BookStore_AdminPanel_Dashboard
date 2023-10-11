<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $primaryKey = 'id';

    protected $fillable = [
        'category_id',
        'book_name',
        'book_description',
        'book_stock',
    ];

    public $timestamps = false;
    
    public function category()
    {
        return $this->belongsTo(categories::class,'category_id','id');
    }
}