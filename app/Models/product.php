<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'stock',
        'image',
        'category_id', // जरुरी! category फिल्ड राख्नुहोस्
    ];

    // 👉 Category relationship यहाँ हुन्छ
    public function category() {
        return $this->belongsTo(Category::class);
    }
    
}
