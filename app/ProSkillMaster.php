<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProSkillMaster extends Model
{
    protected $table = 'HADMIN.ProSkillMasterTable';
    protected $fillable = ['MasterSkillName'];

    public function categories() {
        return $this->hasOne('App\ProSkillCategory', 'proSkillMasterId', 'ProSkillMasterId');
    }

}
