<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoporateBodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coporate_bodies', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('tradename');
            $table->string('entityRegistration')->nullable();
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->string('principalCountry')->nullable();
            $table->string('managementCountry')->nullable();
            $table->string('sector')->nullable();
            $table->string('idType')->nullable();
            $table->string('registrationNumber')->nullable();
            $table->string('giin')->nullable();
            $table->string('fundsSource')->nullable();
            $table->string('taxType')->nullable();
            $table->string('taxNumber')->nullable();
            $table->string('countryTax')->nullable();
            $table->string('fatca')->nullable();
            $table->string('vat')->nullable();
            $table->string('businessUnitNumber')->nullable();
            $table->string('businessComplexName')->nullable();
            $table->string('businessStreetNumber')->nullable();
            $table->string('businessStreetName')->nullable();
            $table->string('businessSurburb')->nullable();
            $table->string('businessCity')->nullable();
            $table->string('businessPostal')->nullable();
            $table->string('businessProvince')->nullable();
            $table->string('addressCountry')->nullable();

            $table->string('bankName')->nullable();
            $table->string('bankType')->nullable();
            $table->string('bankBranch')->nullable();
            $table->string('bankBranchCode')->nullable();
            $table->string('bankAccountNumber')->nullable();
            $table->string('bankAccountHolder')->nullable();
            $table->string('bankCountry')->nullable();
            $table->string('iban')->nullable();
            $table->string('swift')->nullable();
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
        Schema::dropIfExists('coporate_bodies');
    }
}
