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
    Schema::table('customers', function (Blueprint $table) {
        // If these fields exist as integer, update them to use foreign keys
        $table->unsignedBigInteger('country')->nullable()->change();
        $table->unsignedBigInteger('state')->nullable()->change();
        $table->unsignedBigInteger('city')->nullable()->change();

        // Assuming 'countries', 'states', 'cities' tables exist, add foreign key constraints
        $table->foreign('country')->references('id')->on('countries')->onDelete('set null');
        $table->foreign('state')->references('id')->on('states')->onDelete('set null');
        $table->foreign('city')->references('id')->on('cities')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('customers', function (Blueprint $table) {
        // Drop the foreign key constraints first
        $table->dropForeign(['country']);
        $table->dropForeign(['state']);
        $table->dropForeign(['city']);

        // Revert columns to their original type if needed
        $table->integer('country')->nullable()->change();
        $table->integer('state')->nullable()->change();
        $table->integer('city')->nullable()->change();
    });
}

    /**
     * Reverse the migrations.
     */
   
};
