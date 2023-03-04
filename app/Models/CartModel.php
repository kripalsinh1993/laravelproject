<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CartModel extends Model
{
    use HasFactory,Notifiable;
    protected $fillable=['pid','descriptions','offerprice','qty'];

    protected $table='carts';
}