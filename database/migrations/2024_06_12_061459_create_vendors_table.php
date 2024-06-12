<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('contact_no');
            $table->string('name');
            $table->string('company_name')->nullable();
            $table->integer('no_of_cars');
            $table->boolean('owner_drives');
            $table->string('class');
            $table->string('type_of_vehicles');
            $table->boolean('is_interested');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
