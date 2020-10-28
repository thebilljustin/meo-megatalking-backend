<?php

namespace App\Textbook;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $guarded = [];

    public $rules = [
        'currics_id' => 'required',
        'title' => 'required'
    ];

    public function curriculum()
    {
        return $this->belongsTo('App\Curric');
    }

    public function textbooks() 
    {
        return $this->hasMany('App\Textbook\Textbook', 'series_id');
    }
}
