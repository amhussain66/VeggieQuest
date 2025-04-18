@extends('admin.layout.master')

@section('title')
    Contact Messages
@endsection

@section('content')

    <link rel="stylesheet" href="{{ URL::asset('admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">

    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin./') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Messages</li>
            </ol>
        </nav>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($contact_messages as $t=>$contact_message)
                                    <tr>
                                        <td>{{ $t+1 }}</td>
                                        <td>{{ $contact_message->name }}</td>
                                        <td>{{ $contact_message->email }}</td>
                                        <td>{{ $contact_message->subject }}</td>
                                        <td><textarea rows="2" class="mb-2">{{ $contact_message->message }}</textarea></td>
                                        <td>
                                            <a href="{{ route('admin.delete_contact_message',[encrypt($contact_message->id)]) }}"
                                               onclick="return(confirm('are you sure to delete this record permanently ?'))"
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
