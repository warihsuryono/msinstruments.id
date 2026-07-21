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
        Schema::create('product_specifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained(table: 'products', indexName: 'product_specifications_product_id')->default(1);
            $table->string('name')->nullable()->default('');
            $table->text('specification')->nullable();
            $table->unsignedBigInteger('deleted_by')->default(0)->nullable();
            $table->unsignedBigInteger('created_by')->default(0)->nullable();
            $table->unsignedBigInteger('updated_by')->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('product_specifications')->insert(['product_id' => 17, 'name' => 'Flow Rate Range', 'specification' => '<p>0.1 s/d. 3.0 LPM</p>']);
        DB::table('product_specifications')->insert(['product_id' => 17, 'name' => 'Flow Accuracy', 'specification' => '<p>± 5% of reading</p>']);
        DB::table('product_specifications')->insert(['product_id' => 17, 'name' => 'Flow Resolution ', 'specification' => '<p>0.01 LPM</p>']);
        DB::table('product_specifications')->insert(['product_id' => 17, 'name' => 'Number of Channels ', 'specification' => '<p>5 channels (independent)</p>']);
        DB::table('product_specifications')->insert(['product_id' => 17, 'name' => 'Pump Type', 'specification' => '<p>Brushless Micro Diaphragm Pump</p>']);
        DB::table('product_specifications')->insert(['product_id' => 17, 'name' => 'Max. Vacuum Pressure', 'specification' => '<p>70 kPa</p>']);
        DB::table('product_specifications')->insert(['product_id' => 17, 'name' => 'Control System ', 'specification' => '<p>Smart Pump Controller</p>']);
        DB::table('product_specifications')->insert(['product_id' => 17, 'name' => 'Display ', 'specification' => '<p>5&quot; Touchscreen</p>']);
        DB::table('product_specifications')->insert(['product_id' => 17, 'name' => 'Real-time Monitoring', 'specification' => '<p>Flowrate, Volume, Temperature, Timer, Battery</p>']);
        DB::table('product_specifications')->insert(['product_id' => 17, 'name' => 'Operating Condition ', 'specification' => '<p>10 - 45°C, 10 - 85% RH</p>']);
        DB::table('product_specifications')->insert(['product_id' => 17, 'name' => 'Power Supply ', 'specification' => '<p>AC 220V, 50 Hz</p>']);
        DB::table('product_specifications')->insert(['product_id' => 17, 'name' => 'Battery ', 'specification' => '<p>Lithium 12V 7 Ah, with Integratred Battery</p><p>Management System (BMS)</p>']);
        DB::table('product_specifications')->insert(['product_id' => 17, 'name' => 'Operating Time', 'specification' => '<p>± 6 - 8 hours</p>']);
        DB::table('product_specifications')->insert(['product_id' => 17, 'name' => 'Charging Time ', 'specification' => '<p>± 4 - 5 hours</p>']);
        DB::table('product_specifications')->insert(['product_id' => 17, 'name' => 'Dimensions ', 'specification' => '<p>28 x 44 x 20 cm</p>']);
        DB::table('product_specifications')->insert(['product_id' => 17, 'name' => 'Impinger Bottle', 'specification' => '<p>- 1 pcs midget impinger amber with fritted bubbler for NO2 (POR 3) porosity size 60 um, vol. 100 mL;</p><p> - 4 pcs midget impinger, clear, vol. 30 mL;</p><p> - 5 pcs mist trap with silica gel, clear, vol. 30 mL;</p>']);
        DB::table('product_specifications')->insert(['product_id' => 11, 'name' => 'Application ', 'specification' => '<p>Outdoor air sampler, PM10, PM2.5, low volume air sampler</p>']);
        DB::table('product_specifications')->insert(['product_id' => 11, 'name' => 'Inlet ', 'specification' => '<p> Aluminum material in clear anodized , follow EPA standard</p>']);
        DB::table('product_specifications')->insert(['product_id' => 11, 'name' => 'Cyclone ', 'specification' => '<p>SCC style cyclone , aluminum material in clear anodized</p>']);
        DB::table('product_specifications')->insert(['product_id' => 11, 'name' => 'Cabinet ', 'specification' => '<p>Aluminum material in powder coating, with connect pipe and connector</p><p></p>']);
        DB::table('product_specifications')->insert(['product_id' => 11, 'name' => 'Filter holder', 'specification' => '<p>47mm filter holde</p>']);
        DB::table('product_specifications')->insert(['product_id' => 11, 'name' => 'Filter & paper', 'specification' => '<p> 47mm filter, Ultrafine glass fiber -Ø47mm,100pcs per box</p>']);
        DB::table('product_specifications')->insert(['product_id' => 11, 'name' => 'TSP adapter', 'specification' => '<p>Adapter for TSP inlet</p>']);
        DB::table('product_specifications')->insert(['product_id' => 11, 'name' => 'Control pump ', 'specification' => '<p> LCD Display : 4.3-inch HD Touch Screen, Provide real-time flow,</p><p> Running Time, Standard Volume, Battery Power Info, and other information</p>']);
        DB::table('product_specifications')->insert(['product_id' => 15, 'name' => 'Vacuum Capacity', 'specification' => '<pre><code>Max 5.0 LPM</code></pre>']);
        DB::table('product_specifications')->insert(['product_id' => 15, 'name' => 'Vacuum Pump Technology', 'specification' => '<pre><code>Electromagnet - vibration dual valve</code></pre>']);
        DB::table('product_specifications')->insert(['product_id' => 15, 'name' => 'Vacuum Pump', 'specification' => '<pre><code>5 Unit (independent) Control dimer potensiometer</code></pre>']);
        DB::table('product_specifications')->insert(['product_id' => 15, 'name' => 'Indicator Flow', 'specification' => '<pre><code>5 unit Direct Reading Flowmeter (independent); \n3 unit kap. 1.5 LPM (max.);\n2 unit kap. 0.8 LPM (max)</code></pre>']);
        DB::table('product_specifications')->insert(['product_id' => 15, 'name' => 'Temperature', 'specification' => '<p>Digital Temperature &amp; Timer</p>']);
        DB::table('product_specifications')->insert(['product_id' => 15, 'name' => 'Suction Hole', 'specification' => '<p>5 each diameter size ¼ inch.</p>']);
        DB::table('product_specifications')->insert(['product_id' => 15, 'name' => 'Power Supply', 'specification' => '<p>AC 220, 50Hz, 25 VA</p>']);
        DB::table('product_specifications')->insert(['product_id' => 15, 'name' => 'Dimension', 'specification' => '<p>41 cm x 23 cm x 27 cm (l x w x h)</p>']);
        DB::table('product_specifications')->insert(['product_id' => 15, 'name' => 'Weight', 'specification' => '<p>5 kg</p>']);
        DB::table('product_specifications')->insert(['product_id' => 15, 'name' => 'Noise', 'specification' => '<p>60 dB</p>']);
        DB::table('product_specifications')->insert(['product_id' => 15, 'name' => 'Impinger Bottle', 'specification' => '<p>1 pcs midget impinger tube inlet amber with fritted bubbler for NO2 (Por 3) size 60 um, kap. 100 mL.<br>4 pcs midget impinger tube inlet, clear, kap. 30 mL.<br>5 unit mist trap with silica gel, clear, kap. 30 mL.</p>']);
        DB::table('product_specifications')->insert(['product_id' => 15, 'name' => 'Selang', 'specification' => '<pre><code>1 set flexible silicone hose, size 3⁄8 inch,\nExhaust Mini fan plugged in</code></pre>']);
        DB::table('product_specifications')->insert(['product_id' => 16, 'name' => 'Vacum Capacity', 'specification' => '<p>Max 5, 0 liter air/ minute</p>']);
        DB::table('product_specifications')->insert(['product_id' => 16, 'name' => 'Vacum Pump Technology', 'specification' => '<p>Electromagnet - vibration dual valve</p>']);
        DB::table('product_specifications')->insert(['product_id' => 16, 'name' => NULL, 'specification' =>  '<p></p>']);
        DB::table('product_specifications')->insert(['product_id' => 16, 'name' => 'Vacum pump', 'specification' => '<p>5 unit with independent control dimer potensiometer</p>']);
        DB::table('product_specifications')->insert(['product_id' => 16, 'name' => 'Indicator Flow', 'specification' => '<p>5 unit Direct Reading Flow-meter. 3 unit 1,5 L/ min ( max),<br>2 unit 0,8 L/min (max) (independent)</p>']);
        DB::table('product_specifications')->insert(['product_id' => 16, 'name' => 'Suction hole/ Dia', 'specification' => '<p>5 each size ¼ inch.</p>']);
        DB::table('product_specifications')->insert(['product_id' => 16, 'name' => 'Power Supply', 'specification' => '<p>AC 220, 50Hz, 25 VA.</p>']);
        DB::table('product_specifications')->insert(['product_id' => 16, 'name' => 'Dimension', 'specification' => '<p>length 41 cm, width 23 cm, height 27 cm, weight Max. 5 kg.</p>']);
        DB::table('product_specifications')->insert(['product_id' => 16, 'name' => 'Noisess', 'specification' => '<p>60 dB</p>']);
        DB::table('product_specifications')->insert(['product_id' => 16, 'name' => 'Main Equipment', 'specification' => '<p>1 pcs impinger tube inlet dark (glare) size 100 mL with filtred bubbler for NO2 (Por 3)  panjang 40 cm, 16-40 mikron.</p><p>4 pcs impinger tube inlet clear size 30mL, ujung pipa &lt;1mm.</p><p>5 unit safety tube inlet clear size 30 mL.</p><p>1 set flexible silicone hose, size 3⁄8 inch</p><p>Exhaust Mini fan plugged in</p><p>include Hardcase Box safety for bottle glass</p><p>Digital Temperature &amp; Digital Timer</p><p>Indicator battery</p>']);
        DB::table('product_specifications')->insert(['product_id' => 16, 'name' => 'Smart Charging', 'specification' => '<p></p>']);
        DB::table('product_specifications')->insert(['product_id' => 16, 'name' => 'Power Input Voltage', 'specification' => '<p>100V-260V 50/60Hz</p>']);
        DB::table('product_specifications')->insert(['product_id' => 16, 'name' => 'Output Voltage', 'specification' => '<p>14.8V</p>']);
        DB::table('product_specifications')->insert(['product_id' => 16, 'name' => 'Output Current', 'specification' => '<p>20A</p>']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_specifications');
    }
};
