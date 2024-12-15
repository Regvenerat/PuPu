<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Game;
use App\Models\Girl;
use App\Models\Top;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Stevebauman\Location\Facades\Location;

class GameController extends Controller {

	public function index() {
		return view('game');
	}

	public function name() {
		return view('name');
	}
	public function nameing(Request $req) {
		Cookie::queue('UserName', $req->UserName, 260000);
		// Cookie::queue('Flag', Location::get(request()->ip())->countryCode, 260000);
		Cookie::queue('Flag', Location::get('218.107.132.66')->countryCode, 260000);
		return redirect()->route('start');
	}
	public function nameDel() {
		Cookie::forget('UserName');
		Cookie::forget('Flag');
		return view('name');
	}

	public function start() {

		if (!Cookie::get('UserName')) {
			return view('name');
		}

		$game = new Game();
			$game->game_id = rand() . time();
			$game->girl_id = Girl::inRandomOrder()->pluck('id')->first();

			$randomGirlIds = [$game->girl_id];

			for ($i = 0; $i < 5; $i++) {
				$randomGirlId = Girl::inRandomOrder()->pluck('id')->first();
				while (in_array($randomGirlId, $randomGirlIds)) {
					$randomGirlId = Girl::inRandomOrder()->pluck('id')->first();
				}
				$randomGirlIds[] = $randomGirlId;
			}
			shuffle($randomGirlIds);

			$game->first = $randomGirlIds[0];
			$game->second = $randomGirlIds[1];
			$game->third = $randomGirlIds[2];
			$game->fourth = $randomGirlIds[3];
			$game->fifth = $randomGirlIds[4];
			$game->sixth = $randomGirlIds[5];

		$game->save();

			// გოგოების ბაზაში ჩანაწერის გაკეთება
		Girl::find($game->girl_id)->increment('count');

		$gmID = $game->game_id;

		return redirect()->route('game', $gmID);
	}

	public function game($id) {
		$sul = Girl::count();
		$game = Game::where('game_id', $id)->orderByDesc('id')->first();
		$time = 30 -  Carbon::now()->diffInSeconds($game->created_at);
		$mp3 = 'correct.wav';
		$lvl = Game::where('game_id', $id)->count();

		if($time < 1) return redirect()->route('time', $id);
		else return view('game', compact('game', 'time', 'mp3', 'lvl', 'sul'));
	}

	public function time($id) {
		$sul = Girl::count();
		$game = Game::where('game_id', $id)->orderByDesc('id')->first();
			$game->status = 1;
		$game->update();
		$lvl = Game::where('game_id', $id)->count();
		return view('time', compact('game', 'lvl', 'sul'));
	}

	public function selecting($id, $sel) {

		$game = Game::find($id);
			$game->answer = $sel;
			$game->status = 2;
		
		$time = 30 -  Carbon::now()->diffInSeconds($game->created_at);
		if($time < 1) return redirect()->route('time', $game->game_id);

		elseif($game->girl_id == $sel){
			$game->update();

			Girl::find($sel)->increment('win');

			return redirect()->route('win', $game->game_id);
		}
		else {
				$game->created_at = now()->subMinutes(10);
			$game->update();
			return redirect()->route('time', $game->game_id);
		}
	}

	public function win($id) {
		$sul = Girl::count();
		$game = Game::where('game_id', $id)->orderByDesc('id')->first();
		$lvl = Game::where('game_id', $id)->count();

		if($game->status == 2) {
			return view('win', compact('game', 'lvl', 'sul'));
		}
		else {
			return view('time', compact('game', 'lvl', 'sul'));
		}
	}

	public function next($id) {
		$sul = Girl::count();
		$game = Game::where('game_id', $id)->orderByDesc('id')->first();
		$gmID = $game->game_id;
		$pass = Game::where('game_id', $id)->pluck('girl_id')->toArray();
		do {
			$randomNumber = rand(1, $sul);
		} while (in_array($randomNumber, $pass));

			$game = new Game();
				$game->game_id = $gmID;
				$game->girl_id = $randomNumber;

					$randomNumbers = range(1, $sul);
					$key = array_search($game->girl_id, $randomNumbers);
						if ($key !== false) {
							unset($randomNumbers[$key]);
						}
					shuffle($randomNumbers);
					array_splice($randomNumbers, rand(0, 5), 0, $game->girl_id);
					$randomNumbers = array_slice($randomNumbers, 0, 6);

				$game->first = $randomNumbers[0];
				$game->second = $randomNumbers[1];
				$game->third = $randomNumbers[2];
				$game->fourth = $randomNumbers[3];
				$game->fifth = $randomNumbers[4];
				$game->sixth = $randomNumbers[5];
			$game->save();

				// გოგოების ბაზაში ჩანაწერის გაკეთება
			Girl::find($game->girl_id)->increment('count');

		return redirect()->route('game', $game->game_id);
	}

	public function finish($id) {
		$top = new Top();
			$top->country = Cookie::get('Flag');
			$top->name = Cookie::get('UserName');
			$top->score = $id;
		$top->save();

		$country = Country::where('code', $top->country)->first();
			$country->score = $country->score + $id;
		$country->update();

		return redirect()->route('index');
	}

	public function like($id, $like, $lvl) {
		$game = Game::where('game_id', $id)->orderByDesc('id')->first();
		$girl = Girl::find($game->girl_id);
		if($like == 1) $girl->increment('good');
		else $girl->increment('bad');

		if($lvl == 0) return redirect()->route('next', $id);
		else return redirect()->route('finish', $lvl);

		
	}

}
