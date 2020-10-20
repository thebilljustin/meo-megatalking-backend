<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curric extends Model
{

    protected $guarded = [];
    
    public function units()
    {
        return $this->hasMany('App\Unit', 'currics_id');
    }
}
