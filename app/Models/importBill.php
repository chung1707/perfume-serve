<?php

namespace App\Models;

use App\Models\User;
use DateTimeInterface;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete


class importBill extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =['user_id','supplier_id','transaction_id','totalPrice'];
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity','price');
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
