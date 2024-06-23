<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function disabilityType(): BelongsToMany
    {
        return $this->belongsToMany(DisabilityType::class, 'reporting_disability_type');
    }

    public function reportingReason(): BelongsToMany
    {
        return $this->belongsToMany(ReportingReason::class, 'reporting_reporting_reason');
    }

    public function victimRequirement(): BelongsToMany
    {
        return $this->belongsToMany(VictimRequirement::class, 'reporting_victim_requirement');
    }
}
