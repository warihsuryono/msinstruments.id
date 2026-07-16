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
        Schema::create('sample_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->default('');
            $table->unsignedBigInteger('deleted_by')->default(0)->nullable();
            $table->unsignedBigInteger('created_by')->default(0)->nullable();
            $table->unsignedBigInteger('updated_by')->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('sample_categories')->insert(['id' => '1', 'name' => 'Air']);
        DB::table('sample_categories')->insert(['id' => '2', 'name' => 'Water']);
        DB::table('sample_categories')->insert(['id' => '3', 'name' => 'CEMS']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sample_categories');
    }
};
