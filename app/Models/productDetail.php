<?php

namespace App\Models;

use DateTimeInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class productDetail extends Model
{
    use HasFactory ,SoftDeletes ;
    protected $fillable = ['description','concentration','release','saveIncense','age','spring','summer',
    'fall','winter','daytime','night','fragrant'
];
    protected $casts = ['fragrant' => 'array'];
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }
    public function products(){
        return $this->hasMany(product::class);
    }
}
