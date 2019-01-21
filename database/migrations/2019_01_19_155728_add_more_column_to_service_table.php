<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreColumnToServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->integer('period')->after('plan');
            $table->integer('night_trafic')->after('period');
            $table->integer('speed')->after('night_trafic');
            $table->integer('limit_amount')->after('speed');
            $table->integer('international_trafic')->after('limit_amount');
            $table->text('description')->after('international_trafic');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('period');
            $table->dropColumn('night_trafic');
            $table->dropColumn('speed');
            $table->dropColumn('limit_amount');
            $table->dropColumn('international_trafic');
            $table->dropColumn('description');
        });
    }
}
