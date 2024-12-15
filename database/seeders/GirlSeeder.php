<?php

namespace Database\Seeders;

use App\Models\Girl;
use Illuminate\Database\Seeder;

class GirlSeeder extends Seeder
{

	public function run(): void {
		for ($i = 1; $i <= 6; $i++) {
			Girl::create([
				'top' => $i . 'a',
				'less' => $i . 'c',
				'tits' => $i . 'e',
			]);
		}
	}

}
