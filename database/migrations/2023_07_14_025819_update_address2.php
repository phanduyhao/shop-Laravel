<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
            // Xóa cột "town"
            $table->dropColumn('town');

            // Xóa cột "zip"
            $table->dropColumn('zip');
        });
    }

    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
            // Thêm lại cột "town"
            $table->string('town')->nullable();

            // Thêm lại cột "zip"
            $table->string('zip')->nullable();
        });
    }
};
