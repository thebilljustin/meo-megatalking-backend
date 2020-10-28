<?php

namespace App\Textbook;

use Illuminate\Database\Eloquent\Model;

class TextbookUnit extends Model
{
    protected $guarded = [];

    public $rules = [
        'textbook_id' => 'required',
        'title' => 'required'
    ];

    public function textbook()
    {
        return $this->belongsTo('App\Textbook\Textbook');
    }

    public function page()
    {
        return $this->hasOne('App\Textbook\Page', 'unit_id');
    }
}
