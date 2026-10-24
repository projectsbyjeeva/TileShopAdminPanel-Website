<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::table('user_creation', function (Blueprint $table) {
        $table->string('user_name', 100)->after('name'); 
    });
}

public function down()
{
    Schema::table('user_creation', function (Blueprint $table) {
        $table->dropColumn('user_name');
    });
}
};
