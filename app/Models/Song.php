<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function albums()
    {
        return $this->belongsToMany(Album::class);
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categoryable');
    }
}
