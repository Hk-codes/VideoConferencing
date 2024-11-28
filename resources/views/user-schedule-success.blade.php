{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Meeting Scheduled Successfully</h1>
    <p>Share this link to invite others:</p>
    <a href="{{ $link }}">{{ $link }}</a>
</div>
@endsection --}}





@extends('layouts.app')

@section('content')
<div class="container"  style="margin-top: 200px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0" style="border-radius: 10px;">
                <div class="card-header text-center bg-success text-white" style="border-radius: 10px 10px 0 0;">
                    <h4 class="fw-bold mb-0">Meeting Scheduled Successfully!</h4>
                </div>
                <div class="card-body p-4">
                    <p class="text-center">Share this link to invite others:</p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="meetingLink" value="{{ $link }}" readonly>
                        <button class="btn btn-outline-secondary" type="button" onclick="copyToClipboard()">Copy</button>
                    </div>
                    <p class="text-center">
                        Click the button above to copy the link, and share it with your participants.
                    </p>
                    <div class="text-center mt-4">
                        <a href="{{ route('user-index') }}" class="btn btn-primary">Back to Main</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function copyToClipboard() {
        const link = document.getElementById('meetingLink');
        link.select();
        link.setSelectionRange(0, 99999); // For mobile devices
        document.execCommand("copy");
        alert("Meeting link copied to clipboard: " + link.value);
    }
</script>
@endsection
