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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable()->default('');
            $table->foreignId('category_id')->constrained(table: 'categories', indexName: 'category_id')->default(1);
            $table->foreignId('sample_category_id')->constrained(table: 'sample_categories', indexName: 'productysample_category_id')->default(1);
            $table->foreignId('controller_type_id')->constrained(table: 'controller_types', indexName: 'controller_type_id')->default(1);
            $table->unsignedBigInteger('motor_type_id')->constrained(table: 'motor_types', indexName: 'motor_type_id')->default(0)->nullable();
            $table->string('name')->nullable()->default('');
            $table->string('sku')->nullable()->default('');
            $table->string('short_description')->nullable()->default('');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('deleted_by')->default(0)->nullable();
            $table->unsignedBigInteger('created_by')->default(0)->nullable();
            $table->unsignedBigInteger('updated_by')->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        DB::table('products')->insert(['code' => 'MS-002-FR-TSP', 'sample_category_id' => 1, 'category_id' => 1, 'controller_type_id' => 1, 'motor_type_id' => 1, 'name' => 'HVAS TSP - FR', 'short_description' => 'High volume Total Suspended Particulate samplers for collection of all ambient particles with no size cut.']);
        DB::table('products')->insert(['code' => 'MS-002-IM-TSP', 'sample_category_id' => 1, 'category_id' => 1, 'controller_type_id' => 1, 'motor_type_id' => 1, 'name' => 'HVAS TSP - IM', 'short_description' => 'High volume Total Suspended Particulate samplers for collection of all ambient particles with no size cut.']);
        DB::table('products')->insert(['code' => 'MS-002-FR-PM10', 'sample_category_id' => 1, 'category_id' => 1, 'controller_type_id' => 1, 'motor_type_id' => 1, 'name' => 'HVAS PM10 - FR', 'short_description' => 'PM10 high volume samplers for collection of particulate matter with aerodynamic diameter less than 10 microns.']);
        DB::table('products')->insert(['code' => 'MS-002-IM-PM10', 'sample_category_id' => 1, 'category_id' => 1, 'controller_type_id' => 1, 'motor_type_id' => 1, 'name' => 'HVAS PM10 - IM', 'short_description' => 'PM10 high volume samplers for collection of particulate matter with aerodynamic diameter less than 10 microns.']);
        DB::table('products')->insert(['code' => 'MS-002-FR-PM2.5', 'sample_category_id' => 1, 'category_id' => 1, 'controller_type_id' => 1, 'motor_type_id' => 1, 'name' => 'HVAS PM2.5 - FR', 'short_description' => 'PM2.5 high volume samplers for collection of particulate matter with aerodynamic diameter less than 2.5 microns.']);
        DB::table('products')->insert(['code' => 'MS-002-IM-PM2.5', 'sample_category_id' => 1, 'category_id' => 1, 'controller_type_id' => 1, 'motor_type_id' => 1, 'name' => 'HVAS PM2.5 - IM', 'short_description' => 'PM2.5 high volume samplers for collection of particulate matter with aerodynamic diameter less than 2.5 microns.']);
        DB::table('products')->insert(['code' => 'MS-005-DAS-TSP', 'sample_category_id' => 1, 'category_id' => 1, 'controller_type_id' => 2, 'motor_type_id' => 1, 'name' => 'HVAS TSP - DAS', 'short_description' => 'High volume Total Suspended Particulate samplers using digital automatic system controller for collection of all ambient particles with no size cut.']);
        DB::table('products')->insert(['code' => 'MS-006-DAS-PM10', 'sample_category_id' => 1, 'category_id' => 1, 'controller_type_id' => 2, 'motor_type_id' => 1, 'name' => 'HVAS PM10 - DAS', 'short_description' => 'PM10 high volume samplers using digital automatic system controller for collection of particulate matter with aerodynamic diameter less than 10 microns.']);
        DB::table('products')->insert(['code' => 'MS-007-DAS-PM2.5', 'sample_category_id' => 1, 'category_id' => 1, 'controller_type_id' => 2, 'motor_type_id' => 1, 'name' => 'HVAS PM2.5 - DAS', 'short_description' => 'PM2.5 high volume samplers using digital automatic system controller for collection of particulate matter with aerodynamic diameter less than 2.5 microns.']);

        DB::table('products')->insert(['code' => 'MS-001-LV', 'sample_category_id' => 1, 'category_id' => 2, 'controller_type_id' => 1, 'motor_type_id' => 1, 'name' => 'Low Volume Air Sampler (LVAS)', 'short_description' => 'The Low Volume Air Sampler (LVAS) is an instrument used for collecting ambient airborne particulate matter samples at a low and constant flow rate.']);
        DB::table('products')->insert(['code' => 'MS-001-LV-DIG', 'sample_category_id' => 1, 'category_id' => 2, 'controller_type_id' => 2, 'motor_type_id' => 2, 'name' => 'Low Volume Air Sampler (LVAS) - Digital', 'short_description' => 'The Low Volume Air Sampler (LVAS) - Digital is an instrument used for collecting ambient airborne particulate matter samples at a low and constant flow rate.']);

        DB::table('products')->insert(['code' => 'MS-001-AQMS', 'sample_category_id' => 1, 'category_id' => 3, 'controller_type_id' => 2, 'motor_type_id' => 1, 'name' => 'Air Quality Monitoring System (AQMS) Portable MS Instruments', 'short_description' => 'The Portable Air Quality Monitoring System (AQMS) by MS Instruments is an ambient air quality monitoring system that operates automatically and continuously in real time (24 hours).']);
        DB::table('products')->insert(['code' => 'MSI-FS1', 'sample_category_id' => 1, 'category_id' => 3, 'controller_type_id' => 2, 'motor_type_id' => 2, 'name' => 'Fix Station Air Quality Monitoring System (AQMS) MS Instruments', 'short_description' => 'The Fix Station Air Quality Monitoring System (AQMS) by MS Instruments is an ambient air quality monitoring system that operates automatically and continuously in real time (24 hours).']);
        DB::table('products')->insert(['code' => 'MSI-EV1', 'sample_category_id' => 1, 'category_id' => 3, 'controller_type_id' => 2, 'motor_type_id' => 2, 'name' => 'Mobile Air Quality Monitoring System (AQMS) MS Instruments', 'short_description' => 'The Mobile Air Quality Monitoring System (AQMS) by MS Instruments is an mobile ambient air quality monitoring system that operates automatically and continuously in real time (24 hours).']);

        DB::table('products')->insert(['code' => 'MS-003-GS', 'sample_category_id' => 1, 'category_id' => 4, 'controller_type_id' => 1, 'motor_type_id' => 3, 'name' => 'Air Sampler Impinger (MS-003-GS)', 'short_description' => 'An Air Sampler Impinger is a wet gas sampling device used to determine the level of ambient air pollution.']);
        DB::table('products')->insert(['code' => 'MS-003-GS Plus', 'sample_category_id' => 1, 'category_id' => 4, 'controller_type_id' => 1, 'motor_type_id' => 3, 'name' => 'Air Sampler Impinger (MS-003-GS) Plus', 'short_description' => 'An Air Sampler Impinger is a wet gas sampling chargeable device used to determine the level of ambient air pollution.']);
        DB::table('products')->insert(['code' => 'MS-005-SAS', 'sample_category_id' => 1, 'category_id' => 4, 'controller_type_id' => 2, 'motor_type_id' => 2, 'name' => 'Smart Air Sampler Impinger (MS005SAS)', 'short_description' => 'An Smart Air Sampler Impinger MS005SAS is a wet gas sampling digital device used to determine the level of ambient air pollution.']);

        DB::table('products')->insert(['code' => 'MS-004-BAMS', 'sample_category_id' => 1, 'category_id' => 5, 'controller_type_id' => 2, 'motor_type_id' => 2, 'name' => 'Dust Online Monitoring System (Beta-Ray Method - BAM PM2.5 )', 'short_description' => 'BAM PM2.5 (Beta Attenuation Mass Monitor), utilizing internationally recognized particulate measurement technology that has been designated by the U.S. Environmental Protection Agency (USEPA) as a Federal Equivalent Method (FEM).']);

        DB::table('products')->insert(['code' => 'MS-008-WQMS', 'sample_category_id' => 2, 'category_id' => 6, 'controller_type_id' => 2, 'motor_type_id' => 0, 'name' => 'Water Quality Monitoring System', 'short_description' => 'Water Quality Monitoring System (WQMS) is an advanced, automated solution designed to monitor water quality in real-time.']);

        DB::table('products')->insert(['code' => 'MS-SGS-HCL HF', 'sample_category_id' => 1, 'category_id' => 7, 'controller_type_id' => 1, 'motor_type_id' => 1, 'name' => 'Stack Gas Sampler - MS-SGS-HCl HF', 'short_description' => 'Stack Gas Sampler is an emission gas sampling instrument used to collect flue gas samples for measuring HF gas emissions from industrial stacks.']);
        DB::table('products')->insert(['code' => 'MS-SGS-HCL H2S', 'sample_category_id' => 1, 'category_id' => 7, 'controller_type_id' => 1, 'motor_type_id' => 1, 'name' => 'Stack Gas Sampler - MS-SGS-HCl H2S', 'short_description' => 'Stack Gas Sampler is an emission gas sampling instrument used to collect flue gas samples for measuring H2S gas emissions from industrial stacks.']);
        DB::table('products')->insert(['code' => 'MS-SGS-HCL NH3', 'sample_category_id' => 1, 'category_id' => 7, 'controller_type_id' => 1, 'motor_type_id' => 1, 'name' => 'Stack Gas Sampler - MS-SGS-HCl NH3', 'short_description' => 'Stack Gas Sampler is an emission gas sampling instrument used to collect flue gas samples for measuring NH3 gas emissions from industrial stacks.']);

        DB::table('products')->insert(['code' => 'MS-001-AGS-MICRO', 'sample_category_id' => 1, 'category_id' => 8, 'controller_type_id' => 1, 'motor_type_id' => 1, 'name' => 'Isokinetic Dust Sampler Method 17', 'short_description' => 'Isokinetic Dust Sampler Method 17 is a particulate sampling instrument used to collect particulate matter samples for monitoring emissions from industrial stacks.']);
        DB::table('products')->insert(['code' => 'MS-002-IDS-PLUS', 'sample_category_id' => 1, 'category_id' => 8, 'controller_type_id' => 1, 'motor_type_id' => 1, 'name' => 'Isokinetic Dust Sampler Method 5 & 29', 'short_description' => 'Isokinetic Dust Sampler Method 5 & 29 is a particulate and metals sampling instrument designed for industrial stack emission monitoring, complying with SNI 7117.17:2009, SNI 7117.20:2009, and USEPA Methods 5 & 29.']);

        DB::table('products')->insert(['code' => 'MS-009-CEMS', 'sample_category_id' => 3, 'category_id' => 9, 'controller_type_id' => 2, 'motor_type_id' => 1, 'name' => 'Continuous Emission Monitoring System (CEMS)', 'short_description' => 'A Continuous Emission Monitoring System (CEMS) is an integrated set of instruments and equipment used to measure gas or particulate matter concentrations and/or emission rates.']);

        DB::table('products')->insert(['code' => 'PROD-HVASDPM25-002', 'sample_category_id' =>  1, 'category_id' => 11, 'controller_type_id' => 2, 'motor_type_id' => 1, 'name' => 'Inlet PM  2.5 digital']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
