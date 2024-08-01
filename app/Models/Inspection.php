<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Inspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_papers',
        'cric',
        'spare_tire',
        'safety_kit',
        'fuel_level',
        'km_depart',
        'km_retour',
        'observations',
        'signature',
        // 'send_by_mail',
        // 'email',
        // 'send_to_responsible'
    ];

    public function damages(): HasMany
    {
        return $this->hasMany(Damage::class);
    }

    public function checkboxes(): HasMany
    {
        return $this->hasMany(Checkbox::class);
    }
}
