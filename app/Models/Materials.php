<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    use HasFactory;

    protected $table = 'materials';

    protected $fillable = 
    [
        'title',
        'slug',
        'link',
        'description',
        'playlist_id',
        'is_active',
        'image'
    ];

    protected $hidden = [];

    public function playlists()
    {
        return $this->belongsTo(Playlist::class, 'playlist_id', 'id');
    }
}
