<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkbox extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_id',
        'part',
        'brulure',
        'impact_or_dechirure',
        'trou',
        'tache',
    ];

    public function inspection()
    {
        return $this->belongsTo(Inspection::class);
    }
}
