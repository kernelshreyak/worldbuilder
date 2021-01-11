<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SchemaSetup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worlds', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('world_id');
            $table->foreign('world_id')->references('id')->on('worlds');

            $table->string('name');
            $table->text('description');
            $table->string('keywords',200);
            $table->timestamps();
        });

        Schema::create('characters', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('world_id');
            $table->foreign('world_id')->references('id')->on('worlds');

            $table->unsignedInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations');

            $table->string('name');
            $table->text('description');
            $table->string('keywords',200);
            $table->timestamps();
        });

        Schema::create('weapons', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('world_id');
            $table->foreign('world_id')->references('id')->on('worlds');

            $table->unsignedInteger('character_id')->nullable();
            $table->foreign('character_id')->references('id')->on('characters');
            
            $table->unsignedInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations');
            
            
            $table->string('name');
            $table->text('description');
            $table->string('keywords',200);
            $table->timestamps();
        });

        Schema::create('stories', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('world_id');
            $table->foreign('world_id')->references('id')->on('worlds');

            $table->unsignedInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations');

            $table->unsignedInteger('character_id')->nullable();
            $table->foreign('character_id')->references('id')->on('characters');
            
            $table->string('name');
            $table->integer('chapter');
            $table->text('description');
            $table->string('keywords',200);
            $table->timestamps();
        });

        Schema::create('skillsabilities', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('world_id');
            $table->foreign('world_id')->references('id')->on('worlds');

            $table->string('name');
            $table->enum('type', ['ability', 'skill']);
            $table->text('description');
            $table->string('keywords',200);
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
        Schema::drop('worlds');
        Schema::drop('locations');
        Schema::drop('characters');
        Schema::drop('weapons');
        Schema::drop('stories');
        Schema::drop('skillsabilities');
    }
}
