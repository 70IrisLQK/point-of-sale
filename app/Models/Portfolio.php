<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'portfolios';

    protected $fillable = [
        'portfolio_name',
        'portfolio_title',
        'portfolio_image',
        'portfolio_description',
    ];
}