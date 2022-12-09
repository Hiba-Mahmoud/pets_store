@extends('admin.adminLayout')
@section('nav')
@extends('admin.nav')
@endsection
@section('content')




<div class="login-box">
    <div class="login-logo">
        <a >{{__('admin/animalType.create')}}</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            {{-- <p class="login-box-msg">Sign in to start your session</p> --}}

            <form action="{{route('animalTypes.store')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name='name_ar' placeholder="{{__('admin/animalType.name_ar')}}">
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
                    <input type="text" class="form-control" name='name_en' placeholder="{{__('admin/animalType.name_en')}}">
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
                    <select class="form-control" name="animal_id" id="">
                        <option >{{__('admin/animalType.animal')}}</option>
                        @foreach ($animals as $animal)
                        <option value="{{$animal->id}}">{{$animal->translation->name}}</option>

                        @endforeach
                    </select>
                    {{-- <input type="text" class="form-control" name='name_en' placeholder="{{__('admin/animalType.animal')}}"> --}}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                </div>
                @error('name_en')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
                <div class="input-group mb-3 pr-4">

                    <input type="checkbox" class=" form-check-input" name='is_active' id="is-active" >
                    <label class="form-check-label" for="is-active">{{__('admin/animalType.active')}}</label>

                </div>

                @error('is_active')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                    <!-- /.col -->
                    <div class="col-12">
                        <input type="submit" class="btn btn-primary btn-block btn-flat " value="{{__('admin/animalType.submit')}}">
                    </div>
                    <!-- /.col -->
                </div>
            </form>




        </div>
        <!-- /.login-card-body -->
    </div>
</div>









@endsection

