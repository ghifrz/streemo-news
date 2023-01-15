<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $table = 'playlists';

    protected $fillable = 
    [
        'playlist_title',
        'slug',
        'description',
        'user_id',
        'playlist_img',
        'is_active',
    ];

    protected $hidden = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
