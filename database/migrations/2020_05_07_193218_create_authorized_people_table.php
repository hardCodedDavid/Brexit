<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorizedPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authorized_people', function (Blueprint $table) {
            $table->id();
            $table->morphs('authorizable');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('relationship')->nullable();
            $table->string('preferred_name')->nullable();
            $table->string('gender');
            $table->string('email')->unique();
            $table->string('countryBirth')->nullable();
            $table->string('countryResidence')->nullable();
            $table->string('countryCitizen')->nullable();
            $table->string('dob')->nullable();
            $table->string('maritalStatus')->nullable();
            $table->string('idType')->nullable();
            $table->string('passportNumber')->nullable();
            $table->string('passportCountry')->nullable();
            $table->string('passportExpiry')->nullable();
            $table->string('dialingCode')->nullable();
            $table->string('phone')->nullable();
            $table->string('employment')->nullable();
            $table->string('income')->nullable();
            $table->string('incomeSource')->nullable();
            $table->string('fundSource')->nullable();

            $table->string('businessUnitNumber')->nullable();
            $table->string('businessComplexName')->nullable();
            $table->string('businessStreetNumber')->nullable();
            $table->string('businessStreetName')->nullable();
            $table->string('businessSurburb')->nullable();
            $table->string('businessCity')->nullable();
            $table->string('businessPostal')->nullable();
            $table->string('businessProvince')->nullable();
            $table->string('addressCountry')->nullable();
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
        Schema::dropIfExists('authorized_people');
    }
}
