<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $table = "fotos";
    protected $guarded = ['fotoID','update_at','crated_at'];

    // protected $fillable = ['id_foto', 'nama', 'deskripsi', 'alamat', 'foto'];
}
