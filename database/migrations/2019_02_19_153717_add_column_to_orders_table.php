<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
//            $table->string('user_name');
//            $table->string('user_lastname');
//            $table->string('user_mobile');
//            $table->string('user_email');
//            $table->string('user_address');
            $table->string('user_type_order')->default(0);
            $table->integer('price');
            $table->integer('discount_amount')->default(0);
            $table->integer('payable_amount');
            $table->integer('status');
            $table->integer('refId')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
//            $table->dropColumn('user_name');
//            $table->dropColumn('user_lastname');
//            $table->dropColumn('user_mobile');
//            $table->dropColumn('user_email');
            $table->dropColumn('user_type_order');
            $table->dropColumn('order_price');
            $table->dropColumn('order_discount_amount');
            $table->dropColumn('order_payable_amount');
            $table->dropColumn('order_status');
        });
    }
}
