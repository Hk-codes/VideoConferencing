<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_calls', function (Blueprint $table) {
            $table->string('meeting_link')->nullable(); // Add the meeting_link column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_calls', function (Blueprint $table) {
            $table->dropColumn('meeting_link'); // Remove the meeting_link column if the migration is rolled back
        });
    }
};
