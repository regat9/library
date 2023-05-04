<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'author', 'description', 'rating', 'cover'];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
