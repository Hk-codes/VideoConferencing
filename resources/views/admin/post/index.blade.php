@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 150px;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>All Meetings

                <a href="{{ route('admin.schedule') }}" class="btn btn-primary">
                    <i class="fas fa-calendar-plus"></i> Schedule New Meeting
                </a>
            </h1>
            <div class="ms-auto">
                <a href="{{ route('register') }}" class="btn btn-primary">
                    <i class="fas fa-user"></i> Register New Company User
                </a>
                
                {{-- <a href="{{ route('register') }}" class="btn btn-primary">
                    <i class="fas fa-user"></i> Register New Company User
                </a> --}}
            </div>
        </div>

        <!-- Add a scrollable container specifically for the table -->
        <div class="table-responsive mt-4" style="max-height: 75vh; overflow-y: auto; overflow-x: auto;">
            <table class="table table-striped table-bordered table-hover  mb-0">
                <thead style="color:white; background-color:#0e4c8b; position: sticky; top: 0; z-index: 1;" >
                    <tr class="text-center">
                        <th scope="col">No.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Scheduled Time</th>
                        <th scope="col">Session ID</th>
                        <th scope="col">Share Link</th>
                        <th scope="col">Join Meeting</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($video_calls as $video_call)
                    <tr class="text-center">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $video_call->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($video_call->scheduled_time)->format('d M Y, h:i A') }}</td>
                        <td>{{ $video_call->session_id }}</td>
                        <td>
                            <button type="button" class="copy_button btn btn-secondary btn-block" data-clipboard-text="{{ $video_call->meeting_link }}">
                                <i class="fas fa-copy"></i> Copy
                            </button>
                        </td>
                        <td>
                            <button type="button" class="join_button btn btn-success btn-block" disabled 
                                data-scheduled-time="{{ \Carbon\Carbon::parse($video_call->scheduled_time)->format('Y-m-d') }}" 
                                data-meeting-link="{{ $video_call->meeting_link }}">
                                <i class="fas fa-video"></i> Join
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const copyButtons = document.querySelectorAll('.copy_button');

                copyButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const meetingLink = this.getAttribute('data-clipboard-text');
                        
                        const textarea = document.createElement('textarea');
                        textarea.value = meetingLink;
                        document.body.appendChild(textarea);
                        textarea.select();
                        document.execCommand('copy');
                        document.body.removeChild(textarea);
                        
                        alert('Meeting link copied to clipboard!');
                    });
                });
            });

            document.addEventListener('DOMContentLoaded', function() {
                const joinButtons = document.querySelectorAll('.join_button');

                function checkMeetingDates() {
                    const now = new Date();
                    const currentDate = now.toISOString().split('T')[0];

                    joinButtons.forEach(button => {
                        const scheduledDate = button.getAttribute('data-scheduled-time');
                        if (currentDate === scheduledDate) {
                            button.disabled = false;
                        }
                    });
                }

                joinButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        if (!this.disabled) {
                            const meetingLink = this.getAttribute('data-meeting-link');
                            window.location.href = meetingLink;
                        }
                    });
                });

                setInterval(checkMeetingDates, 1000);
            });
        </script>
    </div>
</div>
@endsection




{{-- @extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 150px;">
    <div class="container ">
        <div class="d-flex justify-content-between align-items-center">
         <h1> All Meetings </h1>
            <div class="ms-auto"> <!-- This div pushes the button to the right -->
                <a href="{{ route('admin.schedule') }}" class="btn btn-primary">
                    <i class="fas fa-calendar-plus"></i> Schedule New Meeting
                </a>
            </div>
        </div>
        
        <table class="table table-striped table-bordered table-hover mt-4">
            <thead style ="color:white; background-color:#0e4c8b">
                <tr class="text-center">
                    <th scope="col">No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Scheduled Time</th>
                    <th scope="col">Session ID</th>
                    <th scope="col">Share Link</th>
                    <th scope="col">Join Meeting</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($video_calls as $video_call)
                <tr class="text-center">
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $video_call->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($video_call->scheduled_time)->format('d M Y, h:i A') }}</td>
                    <td>{{ $video_call->session_id }}</td>
                    <td>
                        <button type="button" class="copy_button btn btn-secondary btn-sm" data-clipboard-text="{{ $video_call->meeting_link }}"><i class="fas fa-copy"></i> Copy Link</button>
                    </td>
                    <td>
                        <button type="button" class="join_button btn btn-success btn-block" disabled 
                            data-scheduled-time="{{ \Carbon\Carbon::parse($video_call->scheduled_time)->format('Y-m-d') }}" 
                            data-meeting-link="{{ $video_call->meeting_link }}">
                            <i class="fas fa-video"></i> Join
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const copyButtons = document.querySelectorAll('.copy_button');
        
                copyButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const meetingLink = this.getAttribute('data-clipboard-text'); // Get the meeting link from the button's data attribute
                        
                        // Create a temporary textarea element to hold the text
                        const textarea = document.createElement('textarea');
                        textarea.value = meetingLink; // Set the value to the meeting link
                        document.body.appendChild(textarea); // Append the textarea to the body
                        textarea.select(); // Select the text
                        document.execCommand('copy'); // Execute the copy command
                        document.body.removeChild(textarea); // Remove the textarea from the document
        
                        // Optionally, provide feedback to the user
                        alert('Meeting link copied to clipboard!');
                    });
                });
            });
            
            document.addEventListener('DOMContentLoaded', function() {
                const joinButtons = document.querySelectorAll('.join_button');
        
                function checkMeetingDates() {
                    const now = new Date();
                    const currentDate = now.toISOString().split('T')[0]; // Get the current date in YYYY-MM-DD format
        
                    joinButtons.forEach(button => {
                        const scheduledDate = button.getAttribute('data-scheduled-time'); // Get the scheduled date from the button
        
                        if (currentDate === scheduledDate) {
                            button.disabled = false; // Enable the button if the dates match
                        }
                    });
                }
        
                // Click event for the join buttons
                joinButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        if (!this.disabled) { // Check if the button is enabled
                            const meetingLink = this.getAttribute('data-meeting-link'); // Get the meeting link
                            window.location.href = meetingLink; // Redirect to the meeting link
                        }
                    });
                });
        
                // Check every second
                setInterval(checkMeetingDates, 1000);
            });
        </script>
    </div>
</div>
@endsection --}}