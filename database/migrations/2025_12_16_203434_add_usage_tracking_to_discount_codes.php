<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('discount_codes', function (Blueprint $table) {
            $table->boolean('is_multi_use')->default(false)->after('type');
            $table->integer('usage_count')->default(0)->after('is_multi_use');
            $table->integer('max_uses')->nullable()->after('usage_count');
        });

        DB::table('discount_codes')
            ->whereNotNull('valid_from')
            ->orWhereNotNull('valid_until')
            ->update(['is_multi_use' => true]);
    }

    public function down(): void
    {
        Schema::table('discount_codes', function (Blueprint $table) {
            $table->dropColumn(['is_multi_use', 'usage_count', 'max_uses']);
        });
    }
};
