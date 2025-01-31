<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | Fuel Management System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <p style="color: #9C5C22; font-size: 27px; text-align: center"><b>Fuel Management System</b></p>
    <div class="login-logo">
    </div>
    <!-- /.login-logo -->
    <div class="shadow-lg">
      <div class="card" style="border-top: 4px solid #9C5C22">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Login</p>

          <form action="{{route('login')}}" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" required autocomplete="email" autofocus  placeholder="Email">
              
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                @enderror
            
                  <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                  </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" id="myInput" required autocomplete="current-password">
              
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{$message}}</strong>
                </span>
              @enderror

              
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="eye" onclick="myFunction()">
                    <i id="hide1" style="display: none" class="fa fa-eye"></i>
                    <i id="hide2" class="fa fa-eye-slash"></i>
                  </span>
                </div>
              </div>
            </div>

            <br>

            <div class="row">
              <div class="col-8">
                {{-- <div class="icheck-primary">
                  <input type="checkbox" class="form-check-input" name="remember" id="remember" {{old('remember') ? 'checked' : ''}}>
                  <label for="remember">
                    {{ __('Remember Me')}}
                  </label>
                </div> --}}
              </div>
              <!-- /.col -->
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary btn-lg">
                  {{ __('Login')}}
                </button>
              </div>
              <!-- /.col -->
            </div>
          


            <!-- /.social-auth-links -->

            {{-- <p class="mb-1">
              @if(Route::has('password.request'))
                <a href="{{route('password.request')}}">
                  {{ __('Lupa Password Anda?')}}
                </a>
              @endif
            </p> --}}
          </form>
          {{-- <p class="mb-0">
          Belum Punya Akun?<a href="{{route('register')}}" class="text-center"> Register</a>
          </p> --}}
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
  </div>
  <!-- /.login-box -->

  <script>
    function myFunction() {
      var x = document.getElementById("myInput");
      var y = document.getElementById("hide1");
      var z = document.getElementById("hide2");

      if (x.type === 'password') {
        x.type = "text";
        y.style.display = "block";
        z.style.display = "none";
      } else {
        x.type = "password";
        y.style.display = "none";
        z.style.display = "block";
      }
    }

  </script>
  <!-- jQuery -->
  <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
