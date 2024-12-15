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
        Schema::create('girls', function (Blueprint $table) {
            $table->id();
            $table->string('top');
            $table->string('less');
            $table->string('tits');
            $table->tinyInteger('good')->default(0);
            $table->tinyInteger('bad')->default(0);
            $table->integer('count')->default(0);
            $table->integer('win')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('girls');
    }
};
