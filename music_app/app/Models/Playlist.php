<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Playlist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    public function music()
    {
        return $this->belongsToMany(Music::class, 'playlist_music');
    }
}
