<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProSkillCategory extends Model
{
    protected $table = 'HADMIN.ProSkillCategoryTable';
    protected $fillable = ['categorySkillName', 'proSkillMasterId'];

    public function Master() {
        return $this->belongsTo('App\ProSkillMaster', 'proSkillMasterId', 'ProSkillMasterId');
    }
}
