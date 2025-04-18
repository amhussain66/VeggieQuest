@extends('admin.layout.master')

@section('title')
    Users Details
@endsection

@section('content')

    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users Details</li>
            </ol>
        </nav>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-10"><h6 class="card-title">Users Details</h6></div>
                        </div>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Refral Code</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Created By</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ ($user->refral_code) ? $user->refral_code : '--' }}</td>
                                    <td>
                                        @if($user->status=="active")
                                            <span class="badge bg-success">{{ $user->status }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $user->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</td>
                                    <td><b>{{ $user->register_by }}</b></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-10"><h6 class="card-title">Users Levels Details</h6></div>
                        </div>
                        <div class="table-responsive">
                            <table class="table dataTableExample">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Level</th>
                                    <th>Price</th>
                                    <th>Discount</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($user->levels_record as $l=>$level)
                                    <tr>
                                        <td>{{ $l+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $level->heading }}</td>
                                        <td>¥{{ $level->price }}</td>
                                        <td>{{ $level->discount }}%</td>
                                        <td>
                                            @if($level->status=="active")
                                                <span class="badge bg-success">{{ $level->status }}</span>
                                            @elseif($level->status=="completed")
                                                <span class="badge bg-dark">{{ $level->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $level->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ Carbon\Carbon::parse($level->created_at)->format('d-m-Y') }}</td>
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

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-10"><h6 class="card-title">Users Invite History</h6></div>
                        </div>
                        <div class="table-responsive">
                            <table class="table dataTableExample">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($user->invite_history as $l1=>$invite_history_data)
                                    <tr>
                                        <td>{{ $l1+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ Carbon\Carbon::parse($invite_history_data->created_at)->format('d-m-Y H:i') }}</td>
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

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-10"><h6 class="card-title">Members Register Against This User</h6></div>
                        </div>
                        <div class="table-responsive">
                            <table class="table dataTableExample">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Level</th>
                                    <th>Registered At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($user->users_registered_against_this_member as $l2=>$users_registered_against_this_member_data)
                                    <tr>
                                        <td>{{ $l2+1}}</td>
                                        <td>{{ $users_registered_against_this_member_data->name }}</td>
                                        <td>{{ $users_registered_against_this_member_data->email }}</td>
                                        <td>{{ $users_registered_against_this_member_data->phone }}</td>
                                        <td>{{ ($users_registered_against_this_member_data->current_level) ? $users_registered_against_this_member_data->current_level->heading : 'Not Specified By Admin' }}</td>
                                        <td>{{ Carbon\Carbon::parse($users_registered_against_this_member_data->created_at)->format('d-m-Y H:i') }}</td>
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

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-10"><h6 class="card-title">Users Payment Details</h6></div>
                        </div>
                        <div class="table-responsive">
                            <table class="table dataTableExample">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Receipt</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($user->payment_record as $p=>$payment)
                                    <tr>
                                        <td>{{ $p+1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>¥{{ $payment->amount }}</td>
                                        <td>{{ $payment->type }}</td>
                                        <td><a href="{{ $payment->receipt_url }}" class="btn btn-outline-info"
                                               target="_blank">View Receipt</a></td>
                                        <td>
                                            @if($payment->status=="succeeded")
                                                <span class="badge bg-success">{{ $payment->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $payment->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ Carbon\Carbon::parse($level->created_at)->format('d-m-Y') }}</td>
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
