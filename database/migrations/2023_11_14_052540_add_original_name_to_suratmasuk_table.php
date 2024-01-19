<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('suratmasuk', function (Blueprint $table) {
            $table->string('original_name')->after('foto');
        });
    }

    public function down()
    {
        Schema::table('suratmasuk', function (Blueprint $table) {
            $table->dropColumn('original_name');
        });
    }
};