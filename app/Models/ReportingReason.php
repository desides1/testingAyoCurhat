<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportingReason extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function reporting()
    {
        return $this->hasMany(Reporting::class);
    }
}
