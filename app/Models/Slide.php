<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    protected $table = 'slides';

    protected $fillable =
    [
        'slide_title',
        'link',
        'slide_img',
        'status'
    ];

    protected $hidden = [];
}
