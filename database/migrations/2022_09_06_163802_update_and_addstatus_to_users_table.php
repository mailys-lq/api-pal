<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAndAddstatusToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('url_image_profil')->after('editor_or_reader')->nullable(); // Add "url image profil" column
            $table->text('url_image_couverture')->after('editor_or_reader')->nullable(); // Add "url image profil" column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('url_image_profil');
            $table->dropColumn('url_image_couverture');
        });
    }
}
