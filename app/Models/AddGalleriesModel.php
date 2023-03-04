<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class AddGalleriesModel extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['galleryimage', 'descriptions'];

    protected $table = 'galleries';

}