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

    const CREATED_AT = 'createdDate';
    const UPDATED_AT = 'modifiedDate';
}
