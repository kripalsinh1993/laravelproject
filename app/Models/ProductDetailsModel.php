<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Notifications\Notifiable;

class ProductDetailsModel extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'productimage',
        'productname',
        'category_id',
        'subcategory_id',
        'description',
        'qty',
        'oldprice',
        'offerprice'
    ];
    protected $table = 'products';
}