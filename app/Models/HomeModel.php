<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class HomeModel extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['id', 'pname', 'pimage', 'qty', 'oldprice', 'offerprice', 'descriptions'];
    protected $table = 'products';


}