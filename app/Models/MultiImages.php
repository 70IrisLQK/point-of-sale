<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImages extends Model
{
    use HasFactory;

    protected $table = 'multi_images';

    protected $guard = 'id';

    protected $fillable = ['multi_image'];
}