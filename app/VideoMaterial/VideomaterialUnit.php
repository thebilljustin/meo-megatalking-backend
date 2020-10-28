<?php

namespace App\VideoMaterial;

use Illuminate\Database\Eloquent\Model;

class VideomaterialUnit extends Model
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
