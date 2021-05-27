<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    public function songs() 
    {
        return $this->belongsToMany(Song::class);
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }

    public function categories()
        {
            return $this->morphToMany(Category::class, 'categoryable');
        }
    
}
