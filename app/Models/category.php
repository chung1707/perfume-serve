<?php

namespace App\Models;

use App\Models\Post;
use DateTimeInterface;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'description', 'for_product'];
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
