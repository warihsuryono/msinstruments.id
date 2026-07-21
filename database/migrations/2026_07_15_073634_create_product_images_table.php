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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained(table: 'products', indexName: 'product_images_product_id')->default(1);
            $table->string('image')->nullable();
            $table->unsignedBigInteger('deleted_by')->default(0)->nullable();
            $table->unsignedBigInteger('created_by')->default(0)->nullable();
            $table->unsignedBigInteger('updated_by')->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('product_images')->insert(['product_id' => 1, 'image' => 'product_images/01KXQHKKK0V5R8S69D06Z5172C.jpg']);
        DB::table('product_images')->insert(['product_id' => 9, 'image' => 'product_images/01KXQHW55Z8QWRWVJWAVJC2J81.png']);
        DB::table('product_images')->insert(['product_id' => 9, 'image' => 'product_images/01KXQHWPR7GWYXDJYT1KNG66S2.jpg']);
        DB::table('product_images')->insert(['product_id' => 8, 'image' => 'product_images/01KXQJVRB0TMANXQGG21QZ76W3.png']);
        DB::table('product_images')->insert(['product_id' => 7, 'image' => 'product_images/01KXQJX6RDZN6XY1C7P368RGED.png']);
        DB::table('product_images')->insert(['product_id' => 9, 'image' => 'product_images/01KXQNK14G39TEE5D2FX8FCP5Z.jpg']);
        DB::table('product_images')->insert(['product_id' => 9, 'image' => 'product_images/01KXQNM1ZR6P381VQ494MM75PB.jpg']);
        DB::table('product_images')->insert(['product_id' => 8, 'image' => 'product_images/01KXQNMS9DA10WFKP9N6S69C6W.jpg']);
        DB::table('product_images')->insert(['product_id' => 8, 'image' => 'product_images/01KXQNNREC342NTC9D3HHR8VPR.jpg']);
        DB::table('product_images')->insert(['product_id' => 6, 'image' => 'product_images/01KXQPM4TEKHTTVWCGRCK4BP5C.jpg']);
        DB::table('product_images')->insert(['product_id' => 5, 'image' => 'product_images/01KXQPPPDCHYHYAANVFYTEDX1E.jpg']);
        DB::table('product_images')->insert(['product_id' => 4, 'image' => 'product_images/01KXQPWQ6H47A3KRDETTMN6MZN.jpg']);
        DB::table('product_images')->insert(['product_id' => 3, 'image' => 'product_images/01KXQPYDAY84XH3YJDN6M46ZED.jpg']);
        DB::table('product_images')->insert(['product_id' => 2, 'image' => 'product_images/01KXQQ0S8CADB57SJXHTKJ18JF.jpg']);
        DB::table('product_images')->insert(['product_id' => 10, 'image' => 'product_images/01KXQQ3VKRM8S5FK6NACSXWGHB.jpg']);
        DB::table('product_images')->insert(['product_id' => 26, 'image' => 'product_images/01KXZC23EKXMV4AE2AZR3YHZ56.jpg']);
        DB::table('product_images')->insert(['product_id' => 12, 'image' => 'product_images/01KXZCSZS0JVYK6X0Z5XAXYD6H.jpg']);
        DB::table('product_images')->insert(['product_id' => 11, 'image' => 'product_images/01KXZCXWDTRT4CTZANQP8VF735.jpg']);
        DB::table('product_images')->insert(['product_id' => 15, 'image' => 'product_images/01KXZD83MHV5QM1KYDF5S2T51S.jpg']);
        DB::table('product_images')->insert(['product_id' => 16, 'image' => 'product_images/01KXZDE6GHSCPKQNQ962S44694.jpg']);
        DB::table('product_images')->insert(['product_id' => 17, 'image' => 'product_images/01KXZDGXFPJYVW49NX290SHHRZ.jpg']);
        DB::table('product_images')->insert(['product_id' => 18, 'image' => 'product_images/01KXZE7G5YJB45P2QG5AYTF2G8.jpg']);
        DB::table('product_images')->insert(['product_id' => 18, 'image' => 'product_images/01KXZE7VKK9PY49534EBPJ4TCK.jpg']);
        DB::table('product_images')->insert(['product_id' => 19, 'image' => 'product_images/01KXZEA214CDHQS6Q86KY8TTVR.jpg']);
        DB::table('product_images')->insert(['product_id' => 13, 'image' => 'product_images/01KXZEF1RJK311G9Y9D0Z5SBFD.jpg']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
