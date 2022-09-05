<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAndAddstatusToReadinglistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reading_lists', function (Blueprint $table) {
            $table->dropColumn('book_read'); // Remove "book_read" field
            $table->integer('book_read_number')->after('id'); // Add "status" column

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reading_lists', function (Blueprint $table) {
            $table->boolean('book_read');
            $table->dropColumn('book_read_number');
        });
    }
}
