@extends('admin.adminLayout')
@section('body')

    <body class="hold-transition login-page">


        {{-- <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>{{$message}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div> --}}



        <div class="login-box">
            <div class="login-logo">
                {{-- <form action="" method="post">

                    <a href="{{route('verify-email')}}"><b>Admin</b>Login</a>
                </form> --}}
            </div>



            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>

                    <form action="{{route('verify-email')}}" method="post">
                        @method('post')
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name='email' value="{{auth()->user()->email}}">
                            {{-- <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div> --}}
                        </div>


                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name='pin_code' placeholder="pin code">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        @error('pin_code')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                            <!-- /.col -->
                            <div class="col-12">
                                <input type="submit" class="btn btn-primary btn-block btn-flat" value="verify email">
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>




                </div>
            </div>
        </div>

    </body>
@endsection
