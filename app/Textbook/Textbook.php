<?php

namespace App\Textbook;

use Illuminate\Database\Eloquent\Model;

class Textbook extends Model
{
    protected $guarded = [];

    public $rules = [
        'series_id' => 'required',
        'title' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,svg'
    ];


    public function series()
    {
        return $this->belongsTo('App\Textbook\Series');
    }

    public function units()
    {
        return $this->hasMany('App\Textbook\TextbookUnit', 'textbook_id');
    }
}
