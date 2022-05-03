<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class productDetail extends Model
{
    use HasFactory ,SoftDeletes ;
    protected $casts = ['fragrant' => 'array'];
}
