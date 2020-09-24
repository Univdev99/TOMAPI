<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfessionalProfile extends Model
{
    protected $table = 'HADMIN.ProfessionalProfileTable';
    public $timestamps = false;
    protected $fillable = [
        'UserId',
        'FirstName',
        'LastName'
    ];

    protected $hidden = ['CityId', 'ProvinceId'];
    protected $appends = ['city', 'province'];

    const created_at = 'createdDate';
    const updated_at = 'modifiedDate';

    public function toArray() {
        $array = parent::toArray();
        $newArray = array();
        foreach($array as $name => $value){
            $newArray[lcfirst($name)] = $value;
        }
        return $newArray;
    }

    public function getCityAttribute() {
        return ['cityId' => $this->CityId ];
    }

    public function getProvinceAttribute() {
        return ['provinceId' => $this->ProvinceId ];
    }
}
