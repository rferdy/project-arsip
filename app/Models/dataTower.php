<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class dataTower extends Model
{
    use HasFactory;

    protected $fillable = [
        'paket',
        'siteID',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'desa',
        'LM_nonLM',
        'koordinat_usulan',
        'koordinatlattUsulan',
        'siteName',
        'status',
    ];

    public function documents() : HasMany 
    {
        return $this->hasMany(dokumenUpload::class, 'data_towers_id','id');
    }
}
