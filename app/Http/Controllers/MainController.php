<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Top;
use Illuminate\Support\Facades\App;
use Stevebauman\Location\Facades\Location;

class MainController extends Controller {

	public function changelocale($locale){
		session(['locale' => $locale]);
		App::setLocale($locale);
		return back();
	}

	public function index() {
		$tops = Top::where('country', Location::get('218.107.132.66')->countryCode)->take(10)->orderByDesc('score')->get();
		return view('index', compact('tops'));
	}

	public function score($id) {
		$tops = NULL;
		if($id == 'Global') $tops = Top::take(10)->orderByDesc('score')->get();
		if($id == 'Countries') $tops = Country::where('score', '>', 0)->orderByDesc('score')->take(10)->get();
		return view('index', compact('tops'));
	}

}
