@extends('admin.adminLayout')
@section('body')

    <body class="hold-transition login-page">

        @if($message = Session::get('success'))
        <div class="alert alert-info">{{$message}}</div>
        @endif
        @if($message = Session::get('message'))
        {{-- <div class="alert alert-info">{{$message}}</div> --}}
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{$message}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        <div class="login-box">
            <div class="login-logo">
                <a ><b>Admin</b>Login</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form action="{{route('admin-login')}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name='email' placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>

                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name='password' placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In">
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    {{-- <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
              <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
          </div> --}}
                    <!-- /.social-auth-links -->

                    <p class="mb-1">
                        <a href="#">I forgot my password</a>
                    </p>
                    {{-- <p class="mb-0">
            <a href="register.html" class="text-center">Register a new membership</a>
          </p> --}}
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        {{-- <script src="../../plugins/jquery/jquery.min.js"></script> --}}
        <!-- Bootstrap 4 -->
        {{-- <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}

    </body>
@endsection
