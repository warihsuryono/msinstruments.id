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
        Schema::create('parameters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sample_category_id')->constrained(table: 'sample_categories', indexName: 'sample_category_id')->default(1);
            $table->string('code')->nullable()->default('');
            $table->string('name')->nullable()->default('');
            $table->unsignedBigInteger('deleted_by')->default(0)->nullable();
            $table->unsignedBigInteger('created_by')->default(0)->nullable();
            $table->unsignedBigInteger('updated_by')->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'tsp', 'name' => 'TSP']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'pm2.5', 'name' => 'PM 2.5']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'pm10', 'name' => 'PM10']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'no2', 'name' => 'NO<sub>2</sub>']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'o3', 'name' => 'O<sub>3</sub>']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'co', 'name' => 'CO']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'so2', 'name' => 'SO<sub>2</sub>']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'hc', 'name' => 'HC']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'h2s', 'name' => 'H<sub>2</sub>S']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'cs2', 'name' => 'CS<sub>2</sub>']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'nh3', 'name' => 'NH<sub>3</sub>']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'ch4', 'name' => 'CH<sub>4</sub>']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'voc', 'name' => 'VOC']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'nmhc', 'name' => 'NMHC']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'pressure', 'name' => 'Pressure']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'wd', 'name' => 'Wind Direction']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'ws', 'name' => 'Wind Speed']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'temperature', 'name' => 'Temperature']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'humidity', 'name' => 'Humidity']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'sr', 'name' => 'Solar Radiation']);
        DB::table('parameters')->insert(['sample_category_id' => '1', 'code' => 'rain_intensity', 'name' => 'Rain Intensity']);

        DB::table('parameters')->insert(['sample_category_id' => '2', 'code' => 'ph', 'name' => 'pH']);
        DB::table('parameters')->insert(['sample_category_id' => '2', 'code' => 'cod', 'name' => 'COD']);
        DB::table('parameters')->insert(['sample_category_id' => '2', 'code' => 'bod', 'name' => 'BOD']);
        DB::table('parameters')->insert(['sample_category_id' => '2', 'code' => 'do', 'name' => 'DO']);
        DB::table('parameters')->insert(['sample_category_id' => '2', 'code' => 'tss', 'name' => 'TSS']);
        DB::table('parameters')->insert(['sample_category_id' => '2', 'code' => 'nh3n', 'name' => 'NH3-N']);
        DB::table('parameters')->insert(['sample_category_id' => '2', 'code' => 'hg', 'name' => 'Hg']);
        DB::table('parameters')->insert(['sample_category_id' => '2', 'code' => 'pb', 'name' => 'Pb']);
        DB::table('parameters')->insert(['sample_category_id' => '2', 'code' => 'as', 'name' => 'As']);
        DB::table('parameters')->insert(['sample_category_id' => '2', 'code' => 'cd', 'name' => 'Cd']);
        DB::table('parameters')->insert(['sample_category_id' => '2', 'code' => 'cr', 'name' => 'Cr']);
        DB::table('parameters')->insert(['sample_category_id' => '2', 'code' => 'ni', 'name' => 'Ni']);
        DB::table('parameters')->insert(['sample_category_id' => '2', 'code' => 'cu', 'name' => 'Cu']);
        DB::table('parameters')->insert(['sample_category_id' => '2', 'code' => 'zn', 'name' => 'Zn']);
        DB::table('parameters')->insert(['sample_category_id' => '2', 'code' => 'debit', 'name' => 'Debit']);

        DB::table('parameters')->insert(['sample_category_id' => '3', 'code' => 'so2', 'name' => 'SO<sub>2</sub>']);
        DB::table('parameters')->insert(['sample_category_id' => '3', 'code' => 'nox', 'name' => 'NO<sub>x</sub>']);
        DB::table('parameters')->insert(['sample_category_id' => '3', 'code' => 'co', 'name' => 'CO']);
        DB::table('parameters')->insert(['sample_category_id' => '3', 'code' => 'co2', 'name' => 'CO<sub>2</sub>']);
        DB::table('parameters')->insert(['sample_category_id' => '3', 'code' => 'o2', 'name' => 'O<sub>2</sub>']);
        DB::table('parameters')->insert(['sample_category_id' => '3', 'code' => 'pm', 'name' => 'PM']);
        DB::table('parameters')->insert(['sample_category_id' => '3', 'code' => 'opacity', 'name' => 'Opacity']);
        DB::table('parameters')->insert(['sample_category_id' => '3', 'code' => 'temperature', 'name' => 'Temperature']);
        DB::table('parameters')->insert(['sample_category_id' => '3', 'code' => 'pressure', 'name' => 'Pressure']);
        DB::table('parameters')->insert(['sample_category_id' => '3', 'code' => 'flow', 'name' => 'Flow']);
        DB::table('parameters')->insert(['sample_category_id' => '3', 'code' => 'velocity', 'name' => 'Velocity']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parameters');
    }
};
