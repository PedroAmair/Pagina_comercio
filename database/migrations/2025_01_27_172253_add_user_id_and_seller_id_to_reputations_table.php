<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reputations', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('seller_id')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reputations', function (Blueprint $table) {
            $table->dropForeign('reputations_seller_id_foreign');
            $table->dropForeign('reputations_user_id_foreign');
            $table->dropColumn('seller_id');
            $table->dropColumn('user_id');
        });
    }
};
