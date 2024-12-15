<?php

namespace Database\Seeders;

use App\Models\Top;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		Top::create([
			'country' => 'GE',
			'name' => 'PINKY',
			'score' => '32',
		]);
		Top::create([
			'country' => 'RU',
			'name' => 'Kubo',
			'score' => '2',
		]);
		Top::create([
			'country' => 'RO',
			'name' => 'მაიკო',
			'score' => '23',
		]);
		Top::create([
			'country' => 'IT',
			'name' => 'MOntana',
			'score' => '6',
		]);
    }
}
