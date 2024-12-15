<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('game_id');
				$table->foreignId('girl_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
				$table->foreignId('first')->constrained('girls')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('second')->constrained('girls')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('third')->constrained('girls')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('fourth')->constrained('girls')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('fifth')->constrained('girls')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('sixth')->constrained('girls')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('answer')->nullable();
            $table->boolean('status')->default(0)->comment('1 = Time/wrong | 2 = win');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
