<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likefoto extends Model
{
    use HasFactory;
    protected $table = "likefotos";
    protected $guarded = ['likeID','update_at','crated_at'];
    protected $fillable = [
        'fotoID', 'id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Foto()
    {
        return $this->belongsTo(Foto::class);
    }
}
