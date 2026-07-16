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
        Schema::create('product_parameters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained(table: 'products', indexName: 'product_parameters_product_id')->default(1);
            $table->foreignId('parameter_id')->constrained(table: 'parameters', indexName: 'product_parameters_parameter_id')->default(1);
            $table->string('range')->nullable()->default('');
            $table->string('principle')->nullable()->default('');
            $table->string('resolution')->nullable()->default('');
            $table->string('accuracy')->nullable()->default('');
            $table->string('response_time')->nullable()->default('');
            $table->string('specification')->nullable()->default('');
            $table->unsignedBigInteger('deleted_by')->default(0)->nullable();
            $table->unsignedBigInteger('created_by')->default(0)->nullable();
            $table->unsignedBigInteger('updated_by')->default(0)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_parameters');
    }
};
