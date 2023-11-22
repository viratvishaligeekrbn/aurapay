@extends('auth.auth')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user" name="login_form" id="login_form">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                            placeholder="Enter Username..." name="username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" placeholder="Password"
                                            name="password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <a href="javascript:;" class="btn btn-primary btn-user btn-block" id="login_btn"> Login
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    {{-- <a class="small" href="{{ route('forgot_username') }}">Forgot
                                        Username?</a>
                                    <a class="small" href="{{ route('forgot_password') }}">Forgot
                                        Password?</a> --}}
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">Create an
                                        Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('push_script')
    <script>
        $('#login_btn').click(function() {
            var formdata = $('#login_form').serializeArray();
            $.ajax({
                url: "{{ route('login_me') }}",
                method: "POST",
                data: formdata,
                success: function(data) {
                    if (data.status == 0) {
                        toastr["error"](data.message);
                    } else {
                        toastr["success"](data.message);
                        window.location.href = "{{ route('admin.dashboard') }}";

                    }
                }
            })

        });
    </script>
@endsection
