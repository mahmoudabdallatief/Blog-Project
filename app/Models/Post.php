<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'author_id',
        'category_id',
        'post_title' ,
        'post_slug' ,
        'post_content' ,
        'featured_image',
    ];
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'category_id');
    }
    
}
