 @extends('auth.auth')
 @section('content')
     <div class="card o-hidden border-0 shadow-lg my-5">
         <div class="card-body p-0">
             <!-- Nested Row within Card Body -->
             <div class="row">
                 <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                 <div class="col-lg-7">
                     <div class="p-5">
                         <div class="text-center">
                             <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                         </div>
                         <form class="user" name="register_form" id="register_form">
                             @csrf
                             <div class="form-group row">
                                 <div class="col-sm-6 mb-3 mb-sm-0">
                                     <input type="text" class="form-control form-control-user" placeholder="First Name"
                                         name="first_name">
                                 </div>
                                 <div class="col-sm-6">
                                     <input type="text" class="form-control form-control-user" placeholder="Last Name"
                                         name="last_name">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-sm-6 mb-3 mb-sm-0">
                                     <input type="email" class="form-control form-control-user"
                                         placeholder="Email Address" name="email">
                                 </div>
                                 <div class="col-sm-6">
                                     <input type="text" class="form-control form-control-user" placeholder="Phone Number"
                                         name="phone">
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-sm-6 mb-3 mb-sm-0">
                                     <input type="text" class="form-control form-control-user"
                                         placeholder="Find Username" name="username" id="findusername">
                                 </div>
                                 <div class="col-sm-6">
                                     <select name="role" class="form-control">
                                         <option selected disabled>Select a Role</option>
                                         <option value="user">User</option>
                                         <option value="retailer">Retailer</option>
                                         <option value="whitelable">White Lable</option>
                                         <option value="distributor">Distributor</option>
                                         <option value="staff">Admin Member</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <div class="col-sm-6 mb-3 mb-sm-0">
                                     <input type="password" autocomplete="off" class="form-control form-control-user"
                                         placeholder="Password" name="password">
                                 </div>
                                 <div class="col-sm-6">
                                     <input type="password" autocomplete="off" class="form-control form-control-user"
                                         placeholder="Repeat Password" name="password_confirmation">
                                 </div>
                             </div>
                             <a href="javascript:;" class="btn btn-primary btn-user btn-block" id="register_btn">
                                 Register Account
                             </a>
                         </form>
                         <hr>
                         <div class="text-center">
                             <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
 @section('push_script')
     <script>
         // ------------toastr End here------------
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
         // ------------------------jquery end here------------------------
         $('#register_btn').click(function() {
             var formdata = $('#register_form').serializeArray();
             $.ajax({
                 url: "{{ route('register_me') }}",
                 method: "POST",
                 data: formdata,
                 success: function(data) {
                     if (data.status == 0) {
                         toastr["error"](data.message);
                     } else {
                         toastr["success"](data.message);

                     }
                 }
             })

         });
     </script>
 @endsection
