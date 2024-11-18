<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportingProgress extends Model
{
    use HasFactory;

    protected $fillable = [
        'reporting_id',
        'note',
    ];

    public function reporting()
    {
        return $this->hasOne(Reporting::class);
    }
}
