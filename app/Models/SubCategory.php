<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'subcategory_name',
        'slug',
        'parent_Category',
        'ordering',
    ];
    
    public function post()
    {
        return $this->hasMany(Post::class, 'category_id','id');
    }
    public function category()
{
    return $this->belongsTo(Category::class,'parent_Category');
}

}
