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
        Schema::table('discount_codes', function (Blueprint $table) {
            $table->integer('hours')->nullable()->after('amount'); // 1,2,3
            $table->string('arrangement')->nullable()->after('hours'); // prosecco, picnic, ...
            $table->string('purchaser_name')->nullable()->after('arrangement');
            $table->string('purchaser_email')->nullable()->after('purchaser_name');
        });
    }

    public function down()
    {
        Schema::table('discount_codes', function (Blueprint $table) {
            $table->dropColumn(['hours', 'arrangement', 'purchaser_name', 'purchaser_email']);
        });
    }

};
