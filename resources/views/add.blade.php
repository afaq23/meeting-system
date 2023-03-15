@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myClass">
                            Add Data
                        </button>

                        <a href="{{ url('/all-data') }}" class="btn btn-success">See All Data</a>
                        <div class="modal" id="myClass">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add New Data</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-hidden="true"></button>
                                    </div>
                                    <div class="container"></div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ url('/adding-data') }}" class="class_form"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="row mb-3">
                                                <label for="attendee_one_id"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Attendee Type') }}</label>

                                                <div class="col-md-6">
                                                    <select class="form-select" name="attendee_one_id"
                                                        aria-label="Default select example">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('attendee_one_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="attendee_two_id"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Attendee Type') }}</label>

                                                <div class="col-md-6">
                                                    <select class="form-select" name="attendee_two_id"
                                                        aria-label="Default select example">
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('attendee_two_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="datetime"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Date & Time') }}</label>

                                                <div class="col-md-6">
                                                    <input type="datetime-local" id="datetime" name="datetime">


                                                    @error('desc')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>







                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Submit') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" data-bs-dismiss="modal" class="btn btn-outline-dark">Close</a>
                                        {{-- <input type="submit" name="Submit" class="btn btn-success"> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
