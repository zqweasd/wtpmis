<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_vendor_family', function (Blueprint $table) {
            $table->foreign('vendor_id', 25)->references('vendor_id')->on('tbl_vendors');
            $table->string('vendor_id', 25);
            $table->string('vendor_spouse_lname');
            $table->string('vendor_spouse_fname');
            $table->string('vendor_spouse_mname');
            $table->string('vendor_father_lname');
            $table->string('vendor_father_fname');
            $table->string('vendor_father_mname');
            $table->string('vendor_mother_maidename');
            $table->string('vendor_mother_lname');
            $table->string('vendor_mother_fname');
            $table->string('vendor_mother_mname');
            $table->string('vendor_child_id', 25)->primary();
            $table->string('vendor_child_name');
            $table->date('vendor_child_birthday');
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
        Schema::dropIfExists('tbl_vendor_family');
    }
}
