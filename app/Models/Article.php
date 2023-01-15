<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = 
    [
        'title',
        'slug',
        'description',
        'category_id',
        'user_id',
        'article_img',
        'is_active',
        'views'
    ];

    protected $hidden = [];
    
    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
