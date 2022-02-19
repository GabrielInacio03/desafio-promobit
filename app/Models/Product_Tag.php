<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Tag extends Model
{
    use HasFactory;

    protected $table = 'product_tags';

    protected $fillable = [
        'id',
        'product_id',        
        'tag_id'
    ];  

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
