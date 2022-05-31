<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Role;
use App\Models\Order;
use App\Models\Policy;
use DateTimeInterface;

use App\Models\discount;
use App\Models\AdminCart;
use App\Models\ImportBill;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'facebook_id',
        'google_id',
        'role_id',
        'address',
        "phone",
        "avatar",
        "position",
        "wage",
        "blocked",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function cart(){
        return $this->hasOne(Cart::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function importBills(){
        return $this->hasMany(ImportBill::class);
    }
    public function policies(){
        return $this->hasMany(Policy::class);
    }
    public function discounts(){
        return $this->hasMany(discount::class);
    }
}
