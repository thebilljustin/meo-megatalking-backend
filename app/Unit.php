<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guarded = [];
    
    public $rules = [
        'currics_id' => 'required',
        'title' => 'required'
    ];

    public $title_rule = [
        'title' => 'required'
    ];

    public function currics()
    {
        return $this->belongsTo('App\Currics');
    }
}
