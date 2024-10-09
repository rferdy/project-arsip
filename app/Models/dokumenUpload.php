<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokumenUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_towers_id',
        'file_path',
        'file_name',
        'file_type',
    ];

    public function documents() {
        return $this->belongsTo(dataTower::class);
    }
}
