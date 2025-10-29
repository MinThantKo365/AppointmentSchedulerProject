@extends('app.layout')
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center shadow-sm" role="alert"
            style="border-left: 6px solid #28a745;">
            <i class="bi bi-check-circle-fill me-2 fs-4 text-success"></i>
            <div class="flex-grow-1">
                {{ session('success') }}
                {{-- Login Success --}}
            </div>
            <button type="button" class="btn-close ms-2" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
{{-- appointment_export --}}
    <div class="container-fluid" style="height: 85.7vh;">
        <div class="d-flex justify-content-end align-items-center">
             
                @if (auth()->user()->role == "admin")
                <a href="{{ route('admin_appointment_export') }}" class="btn btn-info me-2"> <i class="fa-solid fa-plus"></i> Export
                Appointments</a>
                    @else
                    <a href="{{ route('appointment_export') }}" class="btn btn-info me-2"> <i class="fa-solid fa-plus"></i> Export
                Appointments</a>
                @endif
            <a href="{{ route('apt_create_page') }}" class="btn btn-dark"> <i class="fa-solid fa-plus"></i> Create New
                Appointments</a>
        </div>
        <div class="mt-2">
            {{-- Admin View --}}
            @if (auth()->user()->role == 'admin')
                <table class="table table-striped table-dark rounded table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Username</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date<small class="text-muted" style="margin-left: 1px;">(yy-mm-dd)</small>
                            </th>
                            <th scope="col">Time</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    {{-- User Table --}}
                    <tbody>
                        @if ($admin_apt->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center text-muted">There were no appointments found.</td>
                            </tr>
                        @else
                            @foreach ($admin_apt as $aa)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td class="">{{ $aa->title }}</td>
                                    <td class="">{{ $aa->name }}</td>
                                    <td class="w-50" style="width: 250px;">{{ $aa->description }}</td>
                                    <td class="">{{ $aa->appointment_date }}</td>
                                    <td>{{ date('h:i A', strtotime($aa->appointment_time)) }}</td>
                                    <td class="p-2 text-center"><a
                                            href="{{ route('appointment_delete_by_admin', $aa->id) }}"class="btn btn-danger"><i
                                                class="fa-solid fa-trash"></i> Remove</a></td>
                            @endforeach
                        @endif
                        </tr>
                    </tbody>
                </table>
            @else
                <table class="table table-striped table-dark rounded table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date<small class="text-muted" style="margin-left: 1px;">(yy-mm-dd)</small>
                            </th>
                            <th scope="col">Time</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    {{-- User Table --}}
                    <tbody>
                        @if ($user_apt->isEmpty())
                            <tr>
                                <td colspan="7" class="text-center text-muted">There were no appointments found.</td>
                            </tr>
                        @else
                            @foreach ($user_apt as $ua)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td class="">{{ $ua->title }}</td>
                                    <td class="w-50" style="width: 250px;">{{ $ua->description }}</td>
                                    <td class="">{{ $ua->appointment_date }}</td>
                                    <td>{{ date('h:i A', strtotime($ua->appointment_time)) }}</td>
                                    <td class="p-2 text-center"><a
                                            href="{{ route('appointment_delete', $ua->id) }}"class="btn btn-danger"><i
                                                class="fa-solid fa-trash"></i> Remove</a></td>
                            @endforeach
                        @endif
                        </tr>
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
