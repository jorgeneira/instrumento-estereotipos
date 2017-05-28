<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmotionResponse extends Model
{
	public $fillable = [
		'item_id',
		'value',
		'reaction_time',
		'participant_id',
	];

	public $timestamps = false;
}
