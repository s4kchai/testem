<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('financial_records', function (Blueprint $table) {
            $table->id();
            $table->string('prefix');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthdate');
            $table->integer('age')->virtualAs('(YEAR(CURDATE()) - YEAR(birthdate))');
            $table->string('profile_image')->nullable();
            $table->timestamp('last_updated_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('financial_records');
    }
}
