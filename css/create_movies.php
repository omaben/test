<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudentRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $date = new DateTime();
        $unixTimeStamp = $date->getTimestamp();

        /*
        |--------------------------------------------------------------------------
        | Movies
        |--------------------------------------------------------------------------
        */
        Schema::connection('mysql')->create('movies', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('name', 99);
            $table->text('label');

            $table->integer('created')->unsigned();
            $table->integer('register_by')->unsigned();
            $table->integer('modified')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->boolean('record_deleted')->default(0);

            $table->engine = 'InnoDB';
        });
        DB::connection('mysql')->table('movies')->insert([
            [
                'name' => 'test',
                'label' => 'new',
                'created' => $unixTimeStamp,'register_by' => 1,'modified' => $unixTimeStamp,'modified_by' => 1,'record_deleted' => 0
            ],
            
        ]);
        /*
        |--------------------------------------------------------------------------
        | Genres
        |--------------------------------------------------------------------------
        */
        Schema::connection('mysql')->create('genres', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('name', 99);

            $table->integer('created')->unsigned();
            $table->integer('register_by')->unsigned();
            $table->integer('modified')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->boolean('record_deleted')->default(0);

            $table->engine = 'InnoDB';
        });
        DB::connection('mysql')->table('genres')->insert([
            [
                'name' => 'testGenre',
                'created' => $unixTimeStamp,'register_by' => 1,'modified' => $unixTimeStamp,'modified_by' => 1,'record_deleted' => 0
            ],
            
        ]);
         /*
        |--------------------------------------------------------------------------
        | GenresMovies
        |--------------------------------------------------------------------------
        */
        Schema::connection('mysql')->create('genre_movie', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->integer('genre_id')->unsigned();
            $table->integer('movie_id')->unsigned();

            $table->engine = 'InnoDB';
        });
        Schema::connection('mysql')->table('genre_movie', function (Blueprint $table) {
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('movie_id')->references('id')->on('movies');
        });
        DB::connection('mysql')->table('genre_movie')->insert([
            [
                'genre_id' => '1',
                'movie_id' => '1',
            ],
            
        ]);
        
        
        /*
        |--------------------------------------------------------------------------
        | actors
        |--------------------------------------------------------------------------
        */
        Schema::connection('mysql')->create('actors', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->string('name', 99);

            $table->integer('created')->unsigned();
            $table->integer('register_by')->unsigned();
            $table->integer('modified')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->boolean('record_deleted')->default(0);

            $table->engine = 'InnoDB';
        });
        DB::connection('mysql')->table('actors')->insert([
            [
                'name' => 'bendada',
                'created' => $unixTimeStamp,'register_by' => 1,'modified' => $unixTimeStamp,'modified_by' => 1,'record_deleted' => 0
            ],
            
        ]);
         /*
        |--------------------------------------------------------------------------
        | ActorsMovies
        |--------------------------------------------------------------------------
        */
        Schema::connection('mysql')->create('actor_movie', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();
            $table->integer('actor_id')->unsigned();
            $table->integer('movie_id')->unsigned();

            $table->engine = 'InnoDB';
        });
        Schema::connection('mysql')->table('actor_movie', function (Blueprint $table) {
            $table->foreign('actor_id')->references('id')->on('actors');
            $table->foreign('movie_id')->references('id')->on('movies');
        });
        DB::connection('mysql')->table('actor_movie')->insert([
            [
                'actor_id' => '1',
                'movie_id' => '1',
            ],
            
        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql')->drop('movies');
        Schema::connection('mysql')->drop('genres');
        Schema::connection('mysql')->drop('genre_movie');
        Schema::connection('mysql')->drop('actors');
        Schema::connection('mysql')->drop('actor_movie');
        
    }
}
?>