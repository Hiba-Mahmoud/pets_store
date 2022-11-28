@extends('admin.adminLayout')
@section('nav')
@extends('admin.nav')
@endsection
@section('content')




<div class="login-box">
    <div class="login-logo">
        <a >create brand</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            {{-- <p class="login-box-msg">Sign in to start your session</p> --}}

            <form action="{{route('brands.store')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name='name_ar' placeholder="name_ar">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                </div>
                @error('name_ar')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


                <div class="input-group mb-3">
                    <input type="text" class="form-control" name='name_en' placeholder="name_en">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                </div>
                @error('name_en')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
                <div class="input-group mb-3">

                    <input type="checkbox" class="form-control" name='is_active' id="is-active" >
                    <label for="is-active">is active</label>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('is_active')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                    <!-- /.col -->
                    <div class="col-4">
                        <input type="submit" class="btn btn-primary btn-block btn-flat" value="submit">
                    </div>
                    <!-- /.col -->
                </div>
            </form>




        </div>
        <!-- /.login-card-body -->
    </div>
</div>









@endsection

