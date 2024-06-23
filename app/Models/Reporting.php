<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporting extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function reportingUser()
    {
        return $this->belongsTo(User::class);
    }

    public function caseType()
    {
        return $this->belongsTo(CaseType::class);
    }

    public function reportedStatus()
    {
        return $this->belongsTo(ReportedStatus::class);
    }

    public function disabilityType()
    {
        return $this->belongsTo(DisabilityType::class);
    }

    public function reportingReason()
    {
        return $this->belongsTo(ReportingReason::class);
    }

    public function victimRequirement()
    {
        return $this->belongsTo(VictimRequirement::class);
    }
}
