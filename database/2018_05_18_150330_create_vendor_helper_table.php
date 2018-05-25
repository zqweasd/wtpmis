<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorHelperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_vendor_helper', function (Blueprint $table) {
            $table->foreign('vendor_id', 25)->references('vendor_id')->on('tbl_vendors');
            $table->string('vendor_id', 25);
            $table->string('helper_id', 25)->primary();
            $table->string('vendor_helper_surname');
            $table->string('vendor_helper_firstname');
            $table->string('vendor_helper_middlename');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_vendor_helper');
    }
}
