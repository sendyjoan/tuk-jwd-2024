<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Letter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['number', 'category_id', 'title', 'path'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
