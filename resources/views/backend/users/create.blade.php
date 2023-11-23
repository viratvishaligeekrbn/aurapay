@extends('backend.layouts.app')
@section('push_css')
    <!-- Custom styles for this page -->
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
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
            </div>
            <div class="card-body">
                <form id="add_user" name="add_user">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="first name" name="first_name">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="last name" name="last_name">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" id="findusername" class="form-control" placeholder="username"
                                    name="username">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" placeholder="email" name="email">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" placeholder="phone" name="phone">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option selected disabled> select role</option>
                                    <option value="admin"> Admin</option>
                                    <option value="team"> Team</option>
                                    <option value="user"> User</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option selected disabled> select status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive"> Inactive</option>
                                    <option value="pending"> Pending</option>
                                    <option value="suspend"> Suspend</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="password" name="password">
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" placeholder="password"
                                    name="password_confirmation">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Support PIN</label>
                                <input type="text" class="form-control" placeholder="support_pin" name="support_pin">
                                <small id="emailHelp" class="form-text text-muted">*user cannot change this </small>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Transaction Pin</label>
                                <input type="text" class="form-control" placeholder="transaction_pin"
                                    name="transaction_pin">
                                <small id="emailHelp" class="form-text text-muted">*leave blank for user self creation
                                </small>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Email Verified</label>
                                <input type="checkbox" class="form-control" name="email_verified" value="0">
                                <small id="emailHelp" class="form-text text-muted">*leave blank for user self verification
                                </small>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="card-footer py-3">
                <a href="{{ route('admin.admin') }}" class="btn btn-primary">Cancel </a>
                <a href="javascript:;" class="btn btn-success" id="AdduserBtn">Add </a>
            </div>
        </div>
    </div>
@endsection
@section('push_script')
    <script>
        $('#findusername').keyup(function() {
            if (this.value.length > 2) {
                var typ_name = $(this).val();
                $.ajax({
                    url: "{{ route('check_username') }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "username": typ_name
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            $('#findusername').removeClass('icon-wrong')
                            $('#findusername').addClass('icon-right')
                        } else if (data.status == 0) {
                            $('#findusername').removeClass('icon-right')
                            $('#findusername').addClass('icon-wrong')
                        }
                    }
                })
            }
        });
        // -----------------------------------------jQuery end here
        $('#AdduserBtn').click(function() {
            var formdata = $('#add_user').serializeArray();
            $.ajax({
                url: "{{ route('admin.store') }}",
                method: "POST",
                data: formdata,
                success: function(response) {
                    if (response.status == 1) {
                        toastr["success"](response.message);
                        setTimeout(function() {
                            window.location.href = "{{ route('admin.admin') }}";
                        }, 500);
                    } else {
                        toastr["error"](response.message);
                    }
                }
            })
        })
    </script>
@endsection
