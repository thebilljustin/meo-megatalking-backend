<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    protected $guarded = [];

    public $rules = [
        'content_id' => 'required',
        'title' => 'required',
        'body' => 'required'
    ];

    public function content() 
    {
        return $this->belongsTo('App\Content');
    }
}
