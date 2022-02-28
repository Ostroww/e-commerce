<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description', 'prix', 'released_at', 'coeur', 'cover', 'couleurs'];

    protected $casts = [
        'couleurs' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
