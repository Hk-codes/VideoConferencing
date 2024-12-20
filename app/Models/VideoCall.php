<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoCall extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'scheduled_time',
        'password',
        'session_id',
        'meeting_link',
    ];
}