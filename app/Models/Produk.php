<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'benefit',
        'kecepatan',
        'deskripsi',
        'diskon',
        'biaya_pasang',
        'kuota',
        'id_kategori',
        'id_paket',
    ];

    protected $casts = [
        'benefit' => 'string', 
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'id_paket');
    }

    public function berlangganan()
    {
        return $this->hasMany(Berlangganan::class, 'id_produk');
    }
}
