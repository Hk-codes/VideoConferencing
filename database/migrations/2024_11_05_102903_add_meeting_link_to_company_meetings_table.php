<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMeetingLinkToCompanyMeetingsTable extends Migration
{
    public function up()
    {
        Schema::table('company_meetings', function (Blueprint $table) {
            $table->string('meeting_link')->nullable(); // Add the meeting_link column
        });
    }

    public function down()
    {
        Schema::table('company_meetings', function (Blueprint $table) {
            $table->dropColumn('meeting_link'); // Drop the meeting_link column if rolling back
        });
    }
}

