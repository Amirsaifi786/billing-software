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
        Schema::create('customers', function (Blueprint $table) {
         
  $table->id();
  $table->string('customer_name');
  $table->string('email')->nullable();
  $table->string('mobile_no');
  $table->text('address');
  $table->string('zip_code')->nullable();
  $table->string('country');
  $table->string('state')->nullable();
  $table->string('city')->nullable();
  $table->string('tax_identification_no')->nullable();

  // Account details
  $table->enum('account_type', ['debit', 'credit']);
  $table->decimal('opening_balance', 10, 2)->default(0);

  // Identity details
  $table->string('document_type')->nullable();
  $table->string('document_no')->nullable();

  // Anniversary details
  $table->date('date_of_birth')->nullable();
  $table->boolean('dob_applicable')->default(false);
  $table->date('anniversary_date')->nullable();
  $table->boolean('anniversary_applicable')->default(false);

  // Other details
  $table->boolean('credit_allowed')->default(false);
  $table->decimal('credit_limit', 10, 2)->default(0);
  $table->text('remark')->nullable();
  $table->string('avatar')->nullable();

  $table->timestamps(); // Created and Updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
