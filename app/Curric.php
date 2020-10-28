<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curric extends Model
{

    protected $guarded = [];

    public function textbook_series()
    {
        return $this->hasMany('App\Textbook\Series', 'currics_id');
    }
    
    public function videomaterial_units()
    {
        return $this->hasMany('App\VideoMaterial\VideomaterialUnit', 'currics_id');
    }
}
