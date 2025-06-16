<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Only attempt to add columns if they don't exist
        if (!Schema::hasColumn('products', 'is_preOrder') && !Schema::hasColumn('products', 'estimated_days')) {
            Schema::table('products', function (Blueprint $table) {
                $table->boolean('is_preOrder')->default(false);
                $table->integer('estimated_days')->nullable();
            });
        }
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIfExists(['is_preOrder', 'estimated_days']);
        });
    }
};
