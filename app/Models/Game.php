<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model {
	use HasFactory;

	public function girl(){
		return $this->belongsTo(Girl::class);
	}

	public function firstGirl() {
		return $this->belongsTo(Girl::class, 'first');
	}

	public function secondGirl() {
		return $this->belongsTo(Girl::class, 'second');
	}

	public function thirdGirl() {
		return $this->belongsTo(Girl::class, 'third');
	}

	public function fourthGirl() {
		return $this->belongsTo(Girl::class, 'fourth');
	}

	public function fifthGirl() {
		return $this->belongsTo(Girl::class, 'fifth');
	}

	public function sixthGirl() {
		return $this->belongsTo(Girl::class, 'sixth');
	}

}
