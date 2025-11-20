<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';

    protected $primaryKey = 'id_paket';

    protected $fillable = ['nama_paket','deskripsi'];

    public $incrementing = true;
     public function produk()
    {
        return $this->hasMany(Produk::class, 'id_paket');
    }
}
