<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = 
    [
        'category_name',
        'slug'
    ];

    protected $hidden = [];

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }
}
