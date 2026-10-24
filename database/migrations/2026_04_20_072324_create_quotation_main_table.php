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
        Schema::create('quotation_main', function (Blueprint $table) {
            $table->id();
             $table->string('unique_id');
            $table->string('quotation_id');
            $table->string('screen_id');
            $table->string('customer_name');
            $table->string('mobile_no');
            $table->string('address');
            $table->string('total_amount');
              $table->integer('is_delete')->default(0);
            $table->integer('is_active')->default(1);
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotation_main');
    }
};
