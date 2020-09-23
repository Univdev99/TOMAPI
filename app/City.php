<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = "HADMIN.CityMasterTable";

    public function provice() {
        return $this->belongsTo('App\Province', 'provinceId');
    }
}
