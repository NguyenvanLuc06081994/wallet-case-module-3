<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIncategoriesToIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incomes', function (Blueprint $table) {
            $table->unsignedBigInteger('incategory_id')->after('note');
            $table->foreign('incategory_id')->references('id')->on('incategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incomes', function (Blueprint $table) {
            //
        });
    }
}
