<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Region;
use Illuminate\Http\Request;

class ItemsController extends Controller {

	public function index(){

		$categories = Category::all();

		$regions = Region::all();

		$items = [];

		$itemId = 1;

		foreach ($categories as $category){

			foreach ($regions as $region){

				$items[] = [
					'region_id' => $region->id,
					'category_id' => $category->id,
					'text' => str_replace('{REGION}', $region->name, $category->text_template),
				];

				$itemId++;

			}

		}

		shuffle($items);

//		Item::insert($items);


		return 'hola';

	}

}
