<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoCallController;
use App\Http\Controllers\AdminVideoController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\FileController;
use Mews\Captcha\Captcha;
use Mews\Captcha\CaptchaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard'); 

// Route::get("/redirects", function(){

// return redirect()->route('index');
// });

Route::get("/redirects", function(){

    if(auth()->user()->role==1){
        return redirect()->route('post.index');
    }
    elseif(auth()->user()->role==0){
        return redirect()->route('user-index');
    }
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/post', [AdminVideoController::class, 'index'])->name('post.index');
    Route::get('/schedule-call', [AdminVideoController::class, 'showScheduleForm'])->name('admin.schedule');
    Route::post('/schedule-call', [AdminVideoController::class, 'schedule'])->name('meeting.schedule.post');
    // Route::get('/admin/join-call/{sessionId}', [AdminVideoController::class, 'showAdminJoinForm'])->name('admin.video.call.join');
    // Route::post('/admin/join-call/{sessionId}', [AdminVideoController::class, 'videoroom'])->name('admin.video.call.join.post');
});
// Routes to join video call for both admin and admin related users 
Route::get('/admin/join-call/{sessionId}', [AdminVideoController::class, 'showAdminJoinForm'])->name('admin.video.call.join');
Route::post('/admin/join-call/{sessionId}', [AdminVideoController::class, 'videoroom'])->name('admin.video.call.join.post');


// New Company User Routes
Route::get('/video-call', [VideoCallController::class, 'index'])->name('user-index');
Route::get('/user-schedule-call', [VideoCallController::class, 'showMeetingScheduleForm'])->name('user.schedule');
Route::post('/user-schedule-call', [VideoCallController::class, 'meetingschedule'])->name('schedule.meeting');
Route::get('/join-call/{sessionId}', [VideoCallController::class, 'showJoinForm'])->name('video.call.join');
Route::post('/join-call/{sessionId}', [VideoCallController::class, 'room'])->name('video.call.join.post');
// Route::get('captcha', [\Mews\Captcha\Captcha::class, 'create'])->name('captcha.create');
// Route::get('/refresh-captcha', [VideoCallController::class, 'refreshCaptcha'])->name('captcha.refresh');

// For Captch 
Route::get('captcha', [\Mews\Captcha\Captcha::class, 'create'])->name('captcha.create');
Route::get('/refresh-captcha', [VideoCallController::class, 'refreshCaptcha'])->name('captcha.refresh');


// For Registring New Company User 
Route::get('/contact-form', [ContactFormController::class, 'register'])->name('contact-form');
Route::post('/send-email', [ContactFormController::class, 'sendEmail'])->name('send.email');


// Route::post('/upload-file', [FileController::class, 'upload'])->name('file.upload');
// Route::get('/get-files/{session_id}', [FileController::class, 'getFiles'])->name('file.get');

// File Sharing routes 
Route::get('/get-files/{sessionId}', [FileController::class, 'getFiles']); 
Route::post('/upload-file', [FileController::class, 'upload']); 
Route::post('/delete-all-files/{sessionId}', [FileController::class, 'deleteAllFiles']); 
