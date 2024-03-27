<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;
    protected $table = "categories";

    protected $fillable = [
        'nom',
    ];

    public function articles()
    {
        return $this->hasMany(article::class);
    }
}