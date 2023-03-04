<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class AddProductsModel extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['category_id', 'subcategory_id', 'productname', 'productimage', 'qty', 'oldprice', 'offerprice', 'descriptions'];
    protected $table = 'products';
}