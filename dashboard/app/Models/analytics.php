<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class analytics extends Model
{
    use HasFactory;

    // protected $table = 'books';

    // protected $primaryKey = 'id';

    // protected $fillable = [
    //     'category_id',
    //     'category',
    //     'book_name',
    //     'book_description',
    //     'book_stock',
    // ];

    protected $guarded = [];

    public $timestamps = false;
    
    // public function category()
    // {
    //     return $this->belongsTo(categories::class,'category_id','id');
    // }

    // public function stores()
    // {
    //     return $this->belongsTo(store::class,'store_id','id');
    // }
}
