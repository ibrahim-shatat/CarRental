<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('cms/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('cms/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('cms/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="cms/index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="cms/index3.html" method="post">
        <div class="input-group mb-3">
            

            <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Enter Your Old Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Enter Your New Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          {{-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> --}}
          <!-- /.col -->
          <div class="col-4">
            @if (Auth::guard('admin')->id())
                <button type="submit" onclick="change({{ Auth::guard('admin')->id() }},'admin')" class="btn btn-primary btn-block">Change Password</button>
            @elseif (Auth::guard('supplier')->id())
                <button type="submit" onclick="change({{ Auth::guard('supplier')->id() }},'supplier')" class="btn btn-primary btn-block">Change Password</button>
            @elseif (Auth::guard('buyer')->id())
                <button type="submit" onclick="change({{ Auth::guard('buyer')->id() }},'buyer')" class="btn btn-primary btn-block">Change Password</button>
            @elseif (Auth::guard('renter')->id())
                <button type="submit" onclick="change({{ Auth::guard('renter')->id() }},'renter')" class="btn btn-primary btn-block">Change Password</button>

            @endif
            </div>
          <!-- /.col -->
        </div>
      </form>

    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('cms/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('cms/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('cms/dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('cms/dist/js/pages/dashboard.js') }}"></script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('js/crud.js')}}"></script>

<script>
 function change(id,guard) {
    let formData = new FormData();
    formData.append('oldpassword',document.getElementById('oldpassword').value);
    formData.append('newpassword',document.getElementById('newpassword').value);
    storeRoute('/cms/admin/'+guard+'/changePassword/'id,formData);
  }
</script>
</body>
</html>
