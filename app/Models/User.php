<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'company_name',
        'phone',
        'address',
        'description',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function merchantMenus()
    {
        return $this->hasMany(Menu::class, 'merchant_id');
    }

    public function merchantOrders()
    {
        return $this->hasMany(Order::class, 'merchant_id');
    }

    public function customerOrders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
