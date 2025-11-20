<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaganOrganisasi extends Model
{
    protected $table = 'bagan';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'title',
        'img_url',
        'parent_id'
    ];
 
    public function parent()
    {
        return $this->belongsTo(BaganOrganisasi::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(BaganOrganisasi::class, 'parent_id');
    }
}
