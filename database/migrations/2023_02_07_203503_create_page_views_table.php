<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('page_views', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('website_id')->constrained()->cascadeOnDelete();

            $table->string('session_id');
            $table->string('host');
            $table->string('screen_size');
            $table->string('country_code');
            $table->text('path');
            $table->text('user_agent');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_views');
    }
};
