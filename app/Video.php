<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = [];

    public $rules = [
        'video_id' => 'required',
        'video_title' => 'required',
    ];

    public function contents()
    {
        return $this->hasMany('App\Content', 'video_id');
    }

}
