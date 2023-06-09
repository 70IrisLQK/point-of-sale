<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $fillable = [
        'blog_category_id',
        'title',
        'image',
        'tags',
        'description'
    ];

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}