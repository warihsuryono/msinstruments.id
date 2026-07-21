<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hero_images', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable()->default('');
            $table->unsignedBigInteger('deleted_by')->default(0)->nullable();
            $table->unsignedBigInteger('created_by')->default(0)->nullable();
            $table->unsignedBigInteger('updated_by')->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('hero_images')->insert(['image' => 'hero_images/01KY1N9KZEMQ1YFN9AE9FNEK7A.png']);
        DB::table('hero_images')->insert(['image' => 'hero_images/01KY1N9X49A7ZJ78T4JA61NRC5.png']);
        DB::table('hero_images')->insert(['image' => 'hero_images/01KY1NA5J1BA470QGED2GM1X7E.png']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_images');
    }
};
