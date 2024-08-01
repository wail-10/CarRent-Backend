<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'inspection_id',
        'firstName',
        'lastName',
        'birthDate',
        'phone',
        'cin',
        'permis',
        'address',
    ];

    public function inspection()
    {
        return $this->belongsTo(Inspection::class);
    }
}
