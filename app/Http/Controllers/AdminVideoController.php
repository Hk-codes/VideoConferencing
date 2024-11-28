<?php

namespace App\Http\Controllers;

use App\Models\VideoCall;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class AdminVideoController extends Controller
{

    public function index()
    {
        // Admin can see all posts
        // $posts = Post::all();
        
        $video_calls = VideoCall::all();
        
        return view('admin.post.index', compact('video_calls'));
    }

    // Show the schedule form
    public function showScheduleForm()
    {
        return view('admin.post.schedule');
    }

    // Handle form submission and schedule the call
    public function schedule(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'scheduled_time' => 'required|date',
            'password' => 'required|string|min:6',
        ]);

        // Generate unique session ID for the meeting
        $sessionId = Str::random(10);
        $meetingLink = route('admin.video.call.join', ['sessionId' => $sessionId]);
        // Save the meeting details
        VideoCall::create([
            'title' => $validatedData['title'],
            'scheduled_time' => $validatedData['scheduled_time'],
            'password' => bcrypt($validatedData['password']),
            'session_id' => $sessionId,
            'meeting_link' => $meetingLink,
        ]);

        // Generate the meeting link
        // $meetingLink = route('video.call.join', ['sessionId' => $sessionId]);

        return view('admin.post.schedule-success', ['link' => $meetingLink]);
    }

    public function videoroom(Request $request, $sessionId)
    {
        // Validate the form inputs
        $validatedData = $request->validate([
            'password' => 'required|string',
            'captcha' => 'required|captcha',
        ]);
    
        // Find the video call using the session ID
        $videoCall = VideoCall::where('session_id', $sessionId)->first();
    
        // Check if the meeting exists
        if (!$videoCall) {
            return redirect()->back()->withErrors(['Video Meeting not found.']);
        }
    
        // Check if the entered password matches the stored password
        if (!Hash::check($validatedData['password'], $videoCall->password)) {
            return redirect()->back()->withErrors(['password' => 'Meeting password is incorrect.']);
        }
    
        // If the password is correct, proceed to join the meeting
        // Redirect or perform actions to join the meeting
        return view('admin.post.room', ['sessionId' => $sessionId]);
    }

    public function showAdminJoinForm($sessionId)
    {
        // Find the video call using the sessionId
        $videoCall = VideoCall::where('session_id', $sessionId)->first();

        if (!$videoCall) {
            return redirect()->back()->withErrors(['error' => 'Invalid video call session.']);
        }

        return view('admin.post.join', compact('videoCall'));
    }

//   public function room($sessionId)
//     {

//         return view('video-call.room', compact('sessionId'));
//     }
    
}

