<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'nama_kategori',
        'gambar_kategori',
        'deskripsi',
        'syarat_ketentuan',
    ];
    
    public $incrementing = true;

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_kategori');
    }
}
