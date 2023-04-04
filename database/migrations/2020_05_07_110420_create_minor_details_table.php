<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinorDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minor_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username');
            $table->dateTime('dob')->nullable();
            $table->string('gender');
            $table->string('countryR')->nullable();
            $table->string('countryN')->nullable();
            $table->string('countryB')->nullable();
            $table->string('cityB')->nullable();
            $table->string('idType')->nullable();
            $table->string('passportNumber')->nullable();
            $table->string('passportCountry')->nullable();
            $table->dateTime('passportExpiry')->nullable();
            $table->string('dialingCode')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('addressUnitNumber')->nullable();
            $table->string('addressComplexNumber')->nullable();
            $table->string('addressStreetNumber')->nullable();
            $table->string('addressStreetName')->nullable();
            $table->string('addressCity')->nullable();
            $table->string('addressSurburb')->nullable();

            $table->string('bankName')->nullable();
            $table->string('bankAccountType')->nullable();
            $table->string('bankBranchName')->nullable();
            $table->string('bankBranchCode')->nullable();
            $table->string('bankAccountNumber')->nullable();
            $table->string('bankAccountHolder')->nullable();
            $table->string('bankCountry')->nullable();
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
        Schema::dropIfExists('minor_details');
    }
}
