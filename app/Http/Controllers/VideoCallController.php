<?php

namespace App\Http\Controllers;

use App\Models\Meetings;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class VideoCallController extends Controller
{


public function index()
{
    // Get the logged-in user's company name
    $userCompanyName = auth()->user()->company_name;

    // Filter the meetings to only show those with the same company name as the user
    $meetings = Meetings::where('company_name', $userCompanyName)->get();

    // Return the view with the filtered meetings
    return view('user-index', compact('meetings'));
}

    // public function index()
    // {
    //     // User can see all posts
    //     // $posts = Post::all();
        
    //     $meetings = Meetings::all();
        
    //     return view('user-index', compact('meetings'));
    // }

    // Show the schedule form
    public function showMeetingScheduleForm()
    {
        return view('user-schedule');
    }

    // Handle form submission and schedule the call
    public function meetingschedule(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'scheduled_time' => 'required|date',
            'password' => 'required|string|min:6',
        ]);

        // Generate unique session ID for the meeting
        $sessionId = Str::random(10);
        $meetingLink = route('video.call.join', ['sessionId' => $sessionId]);

        // Save the meeting details, associating it with the logged-in user
        Meetings::create([
            'company_name' => $validatedData['company_name'],
            'title' => $validatedData['title'],
            'scheduled_time' => $validatedData['scheduled_time'],
            'password' => bcrypt($validatedData['password']),
            'session_id' => $sessionId,
            'meeting_link' => $meetingLink,

            // 'user_id' => auth()->id(), // Store the user ID, assuming you have a user_id column
        ]);

        return view('user-schedule-success', ['link' => $meetingLink]); 
    }

    public function room(Request $request, $sessionId)
    {
        // Validate the form inputs
        $validatedData = $request->validate([
            'password' => 'required|string',
            'captcha' => 'required|captcha',
            // 'g-recaptcha-response' => 'required|captcha' // Ensure reCAPTCHA validation
        ]);
    
        // Find the video call using the session ID
        $meetings = Meetings::where('session_id', $sessionId)->first();
    
        // Check if the meeting exists
        if (!$meetings) {
            return redirect()->back()->withErrors(['Meeting not found.']);
        }
    
        // Check if the entered password matches the stored password
        if (!Hash::check($validatedData['password'], $meetings->password)) {
            return redirect()->back()->withErrors(['password' => 'The provided password is incorrect.']);
        }
    
        // If the password is correct, proceed to join the meeting
        return view('video-call.room', ['sessionId' => $sessionId]);
    }

        public function refreshCaptcha()
    {
        return response()->json(['captcha_src' => captcha_src()]);
    }

    public function showJoinForm($sessionId)
    {
        // Find the video call using the sessionId
        $meetings = Meetings::where('session_id', $sessionId)->first();

        if (!$meetings) {
            return redirect()->back()->withErrors(['error' => 'Invalid video call session.']);
        }

        return view('video-call.join', compact('meetings'));
    }
}


// namespace App\Http\Controllers;

// use App\Models\VideoCall;
// use Illuminate\Http\Request;
// use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Hash;


// class VideoCallController extends Controller
// {


//     public function index()
//     {
//         // Admin can see all posts
//         $video_calls = VideoCall::all();
        
//         return view('index', compact('video_calls'));
//     }

//     public function room(Request $request, $sessionId)
//     {
//         // Validate the form inputs
//         $validatedData = $request->validate([
//             'password' => 'required|string',
//             'captcha' => 'required|captcha',
//         ]);
    
//         // Find the video call using the session ID
//         $videoCall = VideoCall::where('session_id', $sessionId)->first();
    
//         // Check if the meeting exists
//         if (!$videoCall) {
//             return redirect()->back()->withErrors(['Meeting not found.']);
//         }
    
//         // Check if the entered password matches the stored password
//         if (!Hash::check($validatedData['password'], $videoCall->password)) {
//             return redirect()->back()->withErrors(['password' => 'The provided password is incorrect.']);
//         }
    
//         // If the password is correct, proceed to join the meeting
//         // Redirect or perform actions to join the meeting
//         return view('video-call.room', ['sessionId' => $sessionId]);
//     }

//     public function showJoinForm($sessionId)
//     {
//         // Find the video call using the sessionId
//         $videoCall = VideoCall::where('session_id', $sessionId)->first();

//         if (!$videoCall) {
//             return redirect()->back()->withErrors(['error' => 'Invalid video call session.']);
//         }

//         return view('video-call.join', compact('videoCall'));
//     }

//     public function refreshCaptcha()
//     {
//         return response()->json(['captcha_src' => captcha_src()]);
//     }

// //   public function room($sessionId)
// //     {

// //         return view('video-call.room', compact('sessionId'));
// //     }

//     // public function room(Request $request, $sessionId)
//     // {
//     //     // Validate the form inputs
//     //     $validatedData = $request->validate([
//     //         'password' => 'required|string',
//     //         // 'g-recaptcha-response' => 'required|captcha' // Ensure reCAPTCHA validation
//     //     ]);
    
//     //     // Find the video call using the session ID
//     //     $videoCall = VideoCall::where('session_id', $sessionId)->first();
    
//     //     // Check if the meeting exists
//     //     if (!$videoCall) {
//     //         return redirect()->back()->withErrors(['Meeting not found.']);
//     //     }
    
//     //     // Check if the entered password matches the stored password
//     //     if (!Hash::check($validatedData['password'], $videoCall->password)) {
//     //         return redirect()->back()->withErrors(['password' => 'The provided password is incorrect.']);
//     //     }
    
//     //     // If the password is correct, proceed to join the meeting
//     //     // Redirect or perform actions to join the meeting
//     //     return view('video-call.room', ['sessionId' => $sessionId]);
//     // }
    
// }

