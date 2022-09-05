<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->longText('content')->nullable();

            $table->string('author_name')->nullable();

            $table->string('author_phone')->unique()->nullable();

            $table->string('author_email')->unique()->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
