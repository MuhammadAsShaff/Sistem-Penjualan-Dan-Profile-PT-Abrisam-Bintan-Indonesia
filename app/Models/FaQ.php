<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaQ extends Model
{
    use HasFactory;

    protected $table = 'faq';
    
    protected $primaryKey = 'id_faq';
    
    protected $fillable = ['judul_faq', 'isi_faq'];
  
    public $incrementing = true;
    
}
