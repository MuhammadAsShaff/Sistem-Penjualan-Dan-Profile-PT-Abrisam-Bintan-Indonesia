<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $table = 'promo'; 
    protected $primaryKey = 'id_promo'; 

    protected $fillable = [
        'nama_promo',
        'gambar_promo',
        'deskripsi',
    ]; 

}
