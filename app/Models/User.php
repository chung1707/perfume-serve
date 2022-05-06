<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes; // add soft delete

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

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
        'province_id',
        "district_id",
        "ward_id",
        'address',
        "phone",
        "avatar",
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
    public function province(){
        return $this->belongsTo(Province::class);
    }
    public function district(){
        return $this->belongsTo(District::class);
    }
    public function ward(){
        return $this->belongsTo(Ward::class);
    }
    public function import_bills(){
        return $this->hasMany(ImportBills::class);
    }
    public function adminCart(){
        return $this->hasOne(AdminCart::class);
    }
    public function saleBills(){
        return $this->hasMany(SaleBill::class);
    }
}
