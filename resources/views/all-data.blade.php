@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-10 col-xl-10 col-md-10 col-sm-12 col-xs-12 mx-auto">
                <div class="view-content-area">
                    <h4 class="text-center">All Data</h4>


                    {{-- <form action="" class="float-end text-right">
                        <div class="input-group pb-3">
                            <div class="form-outline">
                                <input type="search" name="search" id="form1" class="form-control"
                                    value="{{ $search }}" placeholder="Search" />
                            </div>
                            <button class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <a href="{{ url('/view-all-classes') }}" class="back-register-btn">
                            <div class="btn btn-view btn-warning mb-5">Reset Search</div>
                        </a>
                    </form> --}}


                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">id </th>
                                <th scope="col">Attendee Type</th>
                                <th scope="col">Attendee Type</th>
                                <th scope="col">Date & Time</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        @if (count($alldata) > 0)
                            @foreach ($alldata as $single_data)
                                <tbody>
                                    <tr>
                                        <td>{{ $single_data->id }}</td>
                                        <td class="name_with_hover">
                                            {{ $single_data->getUser($single_data->attendees_one_id)->name }} </a></td>
                                        <td style="max-width: 200px;">
                                            {{ $single_data->getUser($single_data->attendees_two_id)->name }}</td>
                                        <td>{{ $single_data->meeting_time }}</td>
                                        <td> <a href="{{ url('/all-data/edit/') }}/{{ $single_data->id }}"
                                                class="btn btn-success">edit</a></td>
                                        <td> <a href="{{ url('/all-data/delete') }}/{{ $single_data->id }}"
                                                class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                                id="super_admin_{{ $single_data->id }}">delete</a></td>
                                    </tr>

                                </tbody>
                            @endforeach
                        @else
                            <p class="no_data"> Your searching DATA is not avaiable </p>
                        @endif
                    </table>
                    <div class="pagination float-end">
                        {{ $alldata->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
