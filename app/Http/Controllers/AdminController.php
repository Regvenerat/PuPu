<?php

namespace App\Http\Controllers;

use App\Models\Girl;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class AdminController extends Controller {

	public function girls() {
		$girls = Girl::orderByDesc('id')->paginate(10);
		return view('admin/girls', compact('girls'));
	}

	public function girlsAdding(Request $req) {
		$img = $req->file('top');
		$img1 = $req->file('less');
		$img2 = $req->file('tits');
		$imgName = rand();
		$imgName1 = rand();
		$imgName2 = rand();
		ImageManager::gd()->read($img)
			->coverDown(600, 900)
			->toWebp(75)
			->save('storage/girl/' . $imgName . '.webp');
		ImageManager::gd()->read($img1)
			->coverDown(600, 900)
			->toWebp(75)
			->save('storage/girl/' . $imgName1 . '.webp');
		ImageManager::gd()->read($img2)
			// ->scaleDown(1800, 1000)
			->coverDown(1200, 800)
			->toWebp(75)
			->save('storage/girl/' . $imgName2 . '.webp');

		$girls = new Girl;
			$girls->top = $imgName;
			$girls->less = $imgName1;
			$girls->tits = $imgName2;
		$girls->save();

		return back();

	}

}
