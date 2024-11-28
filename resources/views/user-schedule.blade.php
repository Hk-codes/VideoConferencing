{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Schedule a Video Call</h1>

    <form method="POST" action="{{ route('video.call.schedule.post') }}">
        @csrf

        <div class="form-group">
            <label for="title">Meeting Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="scheduled_time">Scheduled Time</label>
            <input type="datetime-local" name="scheduled_time" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Meeting Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Schedule Meeting</button>
    </form>
</div>
@endsection --}}




@extends('layouts.app')

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="margin-top: 170px;">
    <div class="row justify-content-center w-100">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white text-center" style="border-radius: 5px;">
                    <h2>Schedule a Video Call</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('schedule.meeting') }}">
                        @csrf

                         <!-- Company Name -->
                        <div class="form-group mb-3">
                          <label for="company_name" class="form-label">Company Name</label>
                          <input type="text" name="company_name" class="form-control" placeholder="Enter Company Name" required>
                        </div>
                        <!-- Meeting Title -->
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Meeting Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter meeting title" required>
                        </div>

                        <!-- Scheduled Time -->
                        <div class="form-group mb-3">
                            <label for="scheduled_time" class="form-label">Scheduled Time</label>
                            <input type="datetime-local" name="scheduled_time" class="form-control" required>
                        </div>

                        <!-- Meeting Password -->
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Create Meeting Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter meeting password" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex">
                            <button type="submit" class="btn bg-primary text-white btn-lg flex-fill me-2">
                                <i class="fas fa-calendar-plus"></i> Schedule Meeting
                            </button>
                            <!-- Back Button -->
                            <button type="button" onclick="window.location='{{ route('user-index') }}'" class="btn bg-secondary text-white btn-lg ">
                                <i class="fas fa-arrow-left"></i> Back to Dashboard
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



{{-- @extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-info text-white text-center" style="border-radius: 10px 10px 0 0;">
                    <h2 class="fw-bold">Schedule a Video Call</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('video.call.schedule.post') }}">
                        @csrf

                        <!-- Meeting Title -->
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Meeting Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter meeting title" required>
                        </div>

                        <!-- Scheduled Time -->
                        <div class="form-group mb-3">
                            <label for="scheduled_time" class="form-label">Scheduled Time</label>
                            <input type="datetime-local" name="scheduled_time" class="form-control" required>
                        </div>

                        <!-- Meeting Password -->
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Meeting Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter meeting password" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-info btn-lg">
                                <i class="fas fa-calendar-plus"></i> Schedule Meeting
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('dashboard') }}" class="btn btn-link">Back to Dashboard</a>
            </div>
        </div>
    </div>
</div>
@endsection --}}
