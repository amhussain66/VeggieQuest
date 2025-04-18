@extends('admin.layout.master')

@section('title')
    Users List
@endsection

@section('content')

    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users List</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-10"><h6 class="card-title">Users List</h6></div>
                            <div class="col-md-2">
                                <a href="{{ route('admin.AddUsers') }}" class="btn btn-outline-dark w-100">Add Users</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
{{--                                    <th>Address</th>--}}
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $t=>$user)
                                    <tr>
                                        <td>{{ $t+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>{{ $user->phone }}</td>
{{--                                        <td>{{ $user->address }}</td>--}}
                                        <td>
                                            @if($user->status=="active")
                                                <span class="badge bg-success">{{ $user->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $user->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.edituser',[encrypt($user->id)]) }}"
                                               class="btn btn-outline-dark btn-icon">
                                                <i data-feather="edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a onclick="return(confirm('Are you sure to delete this record permanently ?'))"
                                               href="{{ route('admin.deleteuser',[encrypt($user->id)]) }}"
                                               class="btn btn-outline-danger btn-icon">
                                                <i data-feather="trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
@section('script')

    <script src="{{ URL::asset('admin/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/data-table.js') }}"></script>

@endsection
