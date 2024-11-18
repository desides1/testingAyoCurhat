<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DisabilityType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function reporting(): BelongsToMany
    {
        return $this->belongsToMany(Reporting::class, 'reporting_disability_type');
    }
}
