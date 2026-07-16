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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->default(0)->index('parent_id');
            $table->string('name')->nullable()->default('');
            $table->unsignedBigInteger('deleted_by')->default(0)->nullable();
            $table->unsignedBigInteger('created_by')->default(0)->nullable();
            $table->unsignedBigInteger('updated_by')->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('categories')->insert(['id' => '1', 'parent_id' => '0', 'name' => 'High Volume Air Sampler']);
        DB::table('categories')->insert(['id' => '2', 'parent_id' => '0', 'name' => 'Low Volume Air Sampler']);
        DB::table('categories')->insert(['id' => '3', 'parent_id' => '0', 'name' => 'Air Quality Monitoring System']);
        DB::table('categories')->insert(['id' => '4', 'parent_id' => '0', 'name' => 'Air Sampler Impinger']);
        DB::table('categories')->insert(['id' => '5', 'parent_id' => '0', 'name' => 'Beta Attenuation Mass Monitor']);
        DB::table('categories')->insert(['id' => '6', 'parent_id' => '0', 'name' => 'Water Quality Monitoring System']);
        DB::table('categories')->insert(['id' => '7', 'parent_id' => '0', 'name' => 'Stack Gas Sampler']);
        DB::table('categories')->insert(['id' => '8', 'parent_id' => '0', 'name' => 'Isokinetic Dust Sampler']);
        DB::table('categories')->insert(['id' => '9', 'parent_id' => '0', 'name' => 'Continuous Emission Monitoring Systems']);
        DB::table('categories')->insert(['id' => '10', 'parent_id' => '0', 'name' => 'Filters']);
        DB::table('categories')->insert(['id' => '11', 'parent_id' => '0', 'name' => 'Parts & Components']);
        DB::table('categories')->insert(['id' => '12', 'parent_id' => '11', 'name' => 'Motors']);
        DB::table('categories')->insert(['id' => '13', 'parent_id' => '11', 'name' => 'Motor Brushes']);
        DB::table('categories')->insert(['id' => '14', 'parent_id' => '11', 'name' => 'Shelter']);
        DB::table('categories')->insert(['id' => '15', 'parent_id' => '11', 'name' => 'Inlets']);
        DB::table('categories')->insert(['id' => '16', 'parent_id' => '11', 'name' => 'Motor Housing']);
        DB::table('categories')->insert(['id' => '17', 'parent_id' => '11', 'name' => 'Filter Holders']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
