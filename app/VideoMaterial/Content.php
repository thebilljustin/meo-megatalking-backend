<?php

namespace App\VideoMaterial;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $guarded = [];

    public $rules = [
        'video_id' => 'required|int',
        'start_time' => 'required',
        'end_time' => 'required',
        'sentence' => 'required',
        'translation' => 'required'
    ];

    public function video()
    {
        return $this->belongsTo('App\VideoMaterial\Video');
    }

    public function tips()
    {
        return $this->hasMany('App\VideoMaterial\Tip', 'content_id');
    }
}
