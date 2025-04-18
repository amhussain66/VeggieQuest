@extends('admin.layout.master')

@section('title')
    Users Login History
@endsection

@section('content')

    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users Login History</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-12"><h6 class="card-title">Users Login History</h6></div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Email</th>
                                    <th>Ip Address</th>
                                    <th>Last Login</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($usersloginhistory as $u=>$usersloginhistor)
                                    <tr>
                                        <td>{{ $u+1 }}</td>
                                        <td>{{ ($usersloginhistor->email) ? $usersloginhistor->email : '' }}</td>
                                        <td>{{ ($usersloginhistor->ipaddress) ? $usersloginhistor->ipaddress : '' }}</td>
                                        <td>{{ Carbon\Carbon::parse($usersloginhistor->last_login)->format('d-m-Y H:i') }}</td>
                                        <td>{{ $usersloginhistor->type }}</td>
                                        <td>{{ $usersloginhistor->status }}</td>
                                        <td>{{ Carbon\Carbon::parse($usersloginhistor->created_at)->format('d-m-Y') }}</td>
                                    </tr>
                                @empty
                                @endif
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
