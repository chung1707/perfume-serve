<?php

namespace App\Models;

use App\Models\User;
use App\Models\discount;
use DateTimeInterface;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class order extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'note',
        'deliveryAddress',
        'totalPrice',
        'payment_methods',
        'discount_id',
        'phone_number',
        'email'
    ];
    public function getTotalPriceAttribute()
    {
        return number_format($this->totalPrice, 0, '', ',');
    }
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function discount()
    {
        return $this->belongsTo(discount::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price', 'discount');
    }
}
