<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adsense extends Model
{
    use HasFactory;

    protected $table = 'adsenses';

    protected $fillable =
    [
        'title',
        'link',
        'imageads',
        'status'
    ];

    protected $hidden = [];
}
