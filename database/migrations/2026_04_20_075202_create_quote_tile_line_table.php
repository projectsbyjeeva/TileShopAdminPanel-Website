<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     *  'unique_id',
        'quotation_id',
        'screen_id',
        'design_name',
        'dark_line',
        'light_line',
        'highlight_line',
         'design_name',
        'dark_box',
        'light_box',
        'highlight_box',
        'total_box',
        'is_active',
        'is_delete'
     */
    public function up(): void
    {
        Schema::create('quote_tile_line', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id');
            $table->string('quotation_id');
            $table->string('screen_id');
            $table->string('design_name');
            $table->string('dark_line');
            $table->string('light_line');
            $table->string('highlight_line');
            $table->string('dark_box');
            $table->string('light_box');
            $table->string('highlight_box');
             $table->string('total_box');
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
        Schema::dropIfExists('quote_tile_line');
    }
};
