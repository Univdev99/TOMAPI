<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FirmProfile extends Model
{
    protected $table = "HADMIN.FirmProfileTable";
    protected $fillable = ['UserId', 
        'FirstName',
        'LastName',
        'WorkEmail',
        'BusinessName'
    ];
    public $timestamps = false;

    const CREATED_AT = 'CreatedDate';
    const UPDATED_AT = 'ModifiedDate';
}
