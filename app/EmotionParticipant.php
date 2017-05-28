<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmotionParticipant extends Model
{
	public function responses(){

		return $this->hasMany(EmotionResponse::class, 'participant_id');

	}
}
