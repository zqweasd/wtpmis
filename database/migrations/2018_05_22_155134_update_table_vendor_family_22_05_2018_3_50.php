<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableVendorFamily22052018350 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_vendor_family', function (Blueprint $table) {
            $table->string('vendor_family_id',25)->primary();
            $table->dropColumn('vendor_child_id');
            $table->dropColumn('vendor_child_name');
            $table->dropColumn('vendor_child_birthday');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_vendor_family', function (Blueprint $table) {
            //
        });
    }
}
