<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_vendors', function (Blueprint $table) {
            $table->string('vendor_id',25)->primary();
            $table->string('vendor_market');
            $table->string('vendor_section');
            $table->string('vendor_stall');
            $table->string('vendor_fname');
            $table->string('vendor_mname');
            $table->string('vendor_lname');
            $table->string('vendor_nextension');
            $table->date('vendor_birthday');
            $table->string('vendor_placeofbirth');
            $table->string('vendor_permanentaddress');
            $table->string('vendor_cityaddress');
            $table->string('vendor_contact_number');
            $table->string('vendor_civil_status');
            $table->string('vendor_citizenship');
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
        Schema::dropIfExists('tbl_vendors');
    }
}
