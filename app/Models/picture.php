<?php

namespace App\Models;

use App\Models\Post;
use DateTimeInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class picture extends Model
{
    use HasFactory;
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }
}
