<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProWorkAvailability extends Model
{
    protected $table = 'HADMIN.ProWorkAvailabilityTable';
    protected $fillable = [
        "StartDate",
        "LastDate",
        "DateRange",
        "WorkAvailability",
        "LocationAvailability",
        "isFullTime",
        "professionalProfileId",
    ];
    public $timestamps = false;
}
