<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public $fillable = [
    	'item_id',
    	'text',
    	'reaction_time',
    	'participant_id',
    ];

    public $timestamps = false;

    public function setTextAttribute($str){

    	$this->attributes['text'] = mb_convert_case($str, MB_CASE_TITLE);

    }
}
