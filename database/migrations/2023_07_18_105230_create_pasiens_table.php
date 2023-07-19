<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
//            $table->id();
            $table->id('PasienId')->unique();
            $table->string('Name');
            $table->string('Address');
            $table->string('Phone');
            $table->string('Rtrw');
            $table->date('Dob');
            $table->string('Gender');
            $table->timestamps();

            $table->unsignedBigInteger('KelurahanId')->nullable();
            $table->index('KelurahanId');
            $table->foreign('KelurahanId')->references('id')->on('regions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
}
