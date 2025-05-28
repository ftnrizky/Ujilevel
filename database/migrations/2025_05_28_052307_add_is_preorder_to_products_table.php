<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Illuminate\Database\Schema\Blueprint $table) {
            $table->boolean('is_preOrder')->default(false);
            $table->integer('estimated_days')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('products', function (Illuminate\Database\Schema\Blueprint $table) {
            $table->dropColumn(['is_preOrder', 'estimated_days']);
        });
    }
    
};
