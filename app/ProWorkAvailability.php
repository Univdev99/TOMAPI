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

    public function toArray() {
        $array = parent::toArray();
        $newArray = array();
        foreach($array as $name => $value){
            $newArray[lcfirst($name)] = $value;
        }
        return $newArray;
    }

}
