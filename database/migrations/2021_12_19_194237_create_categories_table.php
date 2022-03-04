<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->timestamps();
        });

        DB::table('categories')->insert([
            'category' => 'CSS',
        ]);
        DB::table('categories')->insert([
            'category' => 'Javascript',
        ]);
        DB::table('categories')->insert([
            'category' => 'HTML',
        ]);
        DB::table('categories')->insert([
            'category' => 'Laravel',
        ]);
        DB::table('categories')->insert([
            'category' => 'Web Development',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
