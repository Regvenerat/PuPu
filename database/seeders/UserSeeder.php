<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run(): void
	{
		User::create([
			'name' => 'PINKY',
			'email' => '1',
			'password' => '$2y$10$w6jiUR7eco1/fYCDORedQOkAkCWG6seUbFeYtLUq7.V12xyZv.O/K',
		]);
	}
}
