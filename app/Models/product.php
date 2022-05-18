<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Order;
use DateTimeInterface;
use App\Models\Picture;
use App\Models\Category;
use App\Models\SaleBill;
use App\Models\Supplier;
use App\Models\ImportBill;


use App\Models\productDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete


class product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name','productCode','quantity','price','supplier_id','product_detail_id','category_id'];
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }
    public function productDetail(){
        return $this->belongsTo(productDetail::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function pictures(){
        return $this->hasMany(Picture::class);
    }
    public function carts(){
        return $this->belongsToMany(Cart::class);
    }
    public function orders(){
        return $this->belongsToMany(Order::class);
    }
    public function importBills(){
        return $this->belongsToMany(ImportBill::class);
    }
    // public function adminCarts(){
    //     return $this->belongsToMany(AdminCart::class);
    // }
    public function saleBills(){
        return $this->belongsToMany(SaleBill::class);
    }
}
