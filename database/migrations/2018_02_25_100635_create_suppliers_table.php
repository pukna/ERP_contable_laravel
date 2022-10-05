<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('company_name');
            $table->string('type');
            $table->string('vat_number');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city');
            $table->boolean('special_taxpayer')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('way_payment')->nullable();
            $table->string('payment_deadline')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('bank_id')->nullable();
            $table->string('bank_type')->nullable();
            $table->string('account_number')->nullable();
            $table->string('name_owner')->nullable();
            $table->string('ruc_ced')->nullable();
            $table->boolean('is_active')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}
