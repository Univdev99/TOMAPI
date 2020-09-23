<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = "HADMIN.ProvinceMasterTable";

    public function cities() {
        return $this->hasMany('App\City', 'provinceId');
    }
}
