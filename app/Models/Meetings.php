<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meetings extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'scheduled_time',
        'password',
        'session_id',
        'meeting_link',
        'company_name',
    ];
}
