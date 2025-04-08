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
        Schema::table('contacts', function (Blueprint $table) {

            $table->dropUnique(['email']);
            $table->dropUnique(['contact']);
            
            $table->unique(['user_id', 'email']);
            $table->unique(['user_id', 'contact']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {

            $table->dropUnique(['user_id', 'email']);
            $table->dropUnique(['user_id', 'contact']);
            
            $table->string('email')->unique()->change();
            $table->string('contact', 9)->unique()->change();
        });
    }
};
