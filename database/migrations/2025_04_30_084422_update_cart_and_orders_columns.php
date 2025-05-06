<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCartAndOrdersColumns extends Migration
{
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->unsignedInteger('quantity')->change(); // dari integer ke unsignedInteger
            $table->decimal('price', 12, 2)->change(); // dari float ke decimal
            $table->decimal('amount', 15, 2)->change(); // dari float ke decimal
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedInteger('quantity')->change();
            $table->decimal('sub_total', 15, 2)->change();
            $table->decimal('coupon', 15, 2)->nullable()->change();
            $table->decimal('total_amount', 18, 2)->change();
        });
    }

    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->integer('quantity')->change();
            $table->float('price')->change();
            $table->float('amount')->change();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->integer('quantity')->change();
            $table->float('sub_total')->change();
            $table->float('coupon')->nullable()->change();
            $table->float('total_amount')->change();
        });
    }
}

