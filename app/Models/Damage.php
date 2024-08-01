<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Damage extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_id',
        'side',
        'x',
        'y',
        'detail',
        'image_url',
    ];

    public function inspection()
    {
        return $this->belongsTo(Inspection::class);
    }
}
