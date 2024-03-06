<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentarfoto extends Model
{
    use HasFactory;
    protected $table = "komentarfotos";
    protected $guarded = ['komentarID','update_at','crated_at'];
}
