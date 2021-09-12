<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('home');
            $table->string('who_are_we');
            $table->string('personal_consultancy');
            $table->string('courses');
            $table->string('stock_analysis');
            $table->string('contact_us');
            $table->string('terms_and_conditions');
            $table->string('about_us');
            $table->string('system_name');

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
        Schema::dropIfExists('settings');
    }
}
