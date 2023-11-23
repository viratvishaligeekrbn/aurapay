@extends('backend.layouts.app')
@section('push_css')
<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
        <a href="{{ route('admin.add_user') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50">
            </i> Add User</a>
    </div>
    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
            <div class="col-lg-3 d-flex justify-content-between">
                <div class="form-group">
                    <select name="status_changed" id="" class="form-control">
                        <option value="">fdgdfg</option>
                        <option value="">fdgdfg</option>
                        <option value="">fdgdfg</option>
                    </select>
                </div>
                <div>
                    <a href="#" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="no-sort"><input type="checkbox" name="ids"></th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th class="no-sort">image</th>
                            <th>Joining Date</th>
                            <th>Status</th>
                            <th class="no-sort">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td><input type="checkbox" name="ids"></td>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>image</th>
                            <th>Joining Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td><input type="checkbox" name="ids"></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['first_name'] }} {{ $item['last_name'] }}</td>
                            <td class="text-capitalize">{{ $item['username'] }} </td>
                            <td class="text-capitalize">{{ $item['role'] }}</td>
                            <td><img src="{{ $item['image'] }}" height="50px"></td>
                            <td>{{ date('d M, Y', strtotime($item['joining_date'])) }}</td>
                            <td class="text-capitalize">
                                <?php if ($item['status'] == 'active') {
                                            $badge = 'success';
                                        } elseif ($item['status'] == 'pending') {
                                            $badge = 'warning';
                                        } elseif ($item['status'] == 'inactive') {
                                            $badge = 'primary';
                                        } elseif ($item['status'] == 'suspend') {
                                            $badge = 'danger';
                                        } else {
                                            $badge = 'primary';
                                        }
                                        ?>
                                <span class="badge badge-{{ $badge }}">{{ $item['status'] }}</span>
                            </td>
                            <td><span><a href="#"><i class="fa fa-eye text-success "></i></a></span> |
                                <span><a href="#"><i class="fa fa-edit "></i></a></span> |
                                <span><a href="#"><i class="fa fa-trash text-danger"></i></a></span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('push_script')
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>


<!-- Page level custom scripts -->
<script>
    $(document).ready(function() {
            $('#dataTable').DataTable({
                "columnDefs": [{
                    "targets": 'no-sort',
                    "orderable": false,
                }]
            });
        });
</script>
@endsection
