<?php

namespace App\Textbook;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];
    
    public function unit() 
    {
        return $this->belongsTo('App\Textbook\TextbookUnit');
    }
}
