<?php

namespace App\Http\Controllers;

use App\Item;
use App\Participant;
use Illuminate\Http\Request;

class TestController extends Controller {

	public function index() {

		$items = Item::select(['id', 'text'])->orderBy('id')->get();

		return view('welcome', compact('items'));

	}

	public function store(Request $request) {

		$participant = new Participant();

		$participant->edad   = $request->input('participant.age');
		$participant->region = $request->input('participant.region');

		$participant->save();

		$participant->responses()->createMany($request->responses);

		return [
			'status' => 'ok'
		];


	}

}
