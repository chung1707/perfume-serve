<?php

namespace App\Models;

use DateTimeInterface;
use App\Models\Product;
use App\Models\ImportBill;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class supplier extends Model
{
    use HasFactory, SoftDeletes;
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }
    protected $fillable = ['name','address','phone','email','logo'];

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function importBills(){
        return $this->hasMany(ImportBill::class);
    }
}
