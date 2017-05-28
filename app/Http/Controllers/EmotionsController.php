<?php

namespace App\Http\Controllers;

use App\EmotionItems;
use App\EmotionParticipant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmotionsController extends Controller {

	private $currentPosition = 1;

	private function prepareSingleItem($item) {

		$gender = '';
		$mode   = '';
		$target = 0;

		foreach ($item as $itemKey) {

			$data = explode('_', $itemKey);

			$gender = $data[0];
			$mode   = $data[2];
			$target = (int) $data[1];

			if ($target) {

				return [
					'target'     => $target,
					'gender'     => $gender,
					'mode'       => $mode,
					'created_at' => Carbon::now(),
					'updated_at' => Carbon::now(),
				];

			}
		}

		return [
			'target'     => $target,
			'gender'     => $gender,
			'mode'       => $mode,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
		];

	}

	private function storeItems($items) {

		$preparedItems = array_map([$this, 'prepareSingleItem'], $items);

		EmotionItems::truncate();

		EmotionItems::insert($preparedItems);

	}

	public function buildItem($targetKey) {

		$targetKeyData = explode('_', $targetKey);

		$onlyNoise = "{$targetKeyData[0]}_0_{$targetKeyData[2]}";

		$item = array_fill(1, 7, $onlyNoise);

		$item[$this->currentPosition] = $targetKey;

		$this->currentPosition ++;

		if ($this->currentPosition > 7) {
			$this->currentPosition = 1;
		}

		if($this->currentPosition === 4){
			$this->currentPosition++;
		}

		return $item;

	}

	public function getItemCodes() {

		$prefixList = ['F', 'M'];

		$codes = [];

		foreach ($prefixList as $prefix) {

			for ($i = 1; $i <= 6; $i ++) {

				$codes[] = "{$prefix}_{$i}_N";
				$codes[] = "{$prefix}_{$i}_O";
				$codes[] = "{$prefix}_{$i}_B";

			}

			for ($i = 0; $i < 3; $i ++) {

				$codes[] = "{$prefix}_0_N";
				$codes[] = "{$prefix}_0_O";
				$codes[] = "{$prefix}_0_B";
			}

		}


		return $codes;

	}

	public function generateItems(){

		$codes = $this->getItemCodes();

		shuffle($codes);

		$items = array_map([$this, 'buildItem'], $codes);

		shuffle($items);

		$this->storeItems($items);

		return $items;
	}

	public function generator() {

		$items = \Cache::rememberForever('emotion_items', function () {
			return $this->generateItems();
		});

		return view('generator', compact('items'));

	}

	public function generatorStore(Request $request) {

		$img = str_replace('data:image/png;base64,', '', $request->img);

		$img = str_replace(' ', '+', $img);

		\Storage::disk('public')->put("faces/{$request->name}.png", base64_decode($img));

		return 'ok';

	}

	public function index() {

		return view('emotions');
	}

	public function consentimiento(){

		return view('consentimientoEmotions');

	}

	public function store(Request $request) {

		$participant = new EmotionParticipant();

		$participant->edad   = $request->input('participant.age');
		$participant->zurdo = $request->input('participant.zurdo');

		$participant->save();

		$participant->responses()->createMany($request->responses);

		return [
			'status' => 'ok'
		];


	}
}
