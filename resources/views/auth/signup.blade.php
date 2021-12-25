@extends('master.main2')


@section('title','Sign Up')

@section('content')
<div class="row justify-content-center flex-coulmn">
    <div class="col-lg-4">

        <!-- <h2>Sign In</h2> -->
        <div class="">
            <h1 class="text-center"><a href="/" class="text-light">Market Place</a></h1>
        </div>
        <div class="px-4 py-3  rounded shadow">
            <div class="mt-3">
                <style>
                    body {
                        font-size: 14px;
                    }

                    input::placeholder {
                        color: #000 !important;
                    }

                    .form-control,
                    .input-group-text {
                        height: 25px !important;
                    }
                </style>
                <form action="{{route('auth.signup.post')}}" method="post" class="w-75 mx-auto">
                    {{csrf_field()}}

                    <div class="form-group ">
                        <label for="" class="text-light"><i class="fas fa-user-tie"></i> Enter User Name</label>
                        <input type="text" class="form-control @if($errors->has('username')) is-invalid @endif" placeholder="Username" name="username" id="username">
                        @if($errors->has('username'))
                        <p class="text-danger">{{$errors->first('username')}}</p>
                        @endif
                    </div>
                    <div class="">
                        <div class="my-1">
                            <label for="" class="text-light"><i class="fas fa-key"></i> Enter User Password</label>
                            <input type="password" class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Password" name="password" id="password">
                        </div>
                        <div class="my-1">
                            <label for="" class="text-light"><i class="fas fa-key"></i> Enter User Confirm Password</label>
                            <input type="password" class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Confirm Password" name="password_confirmation" id="password_confirm">
                        </div>

                    </div>
                    @if($errors->has('password'))
                    <p class="text-danger">{{$errors->first('password')}}</p>
                    @endif
                    <!-- <div class="form-group mt-1">
                        <small class="text-muted">
                            Your private key for decrypting messages will be protected with your password. Please make
                            sure that you choose a strong one
                        </small>
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="" class="text-light">Enter User Referral Code</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Referral Code</div>
                            </div>
                            <input type="text" name="refid" value="{{$refid}}" class="form-control" @if($refid !=='' ) readonly @endif>
                        </div>

                    </div> -->
                    @include('includes.captcha')
                    @if($errors->has('captcha'))
                    <p class="text-danger">{{$errors->first('captcha')}}</p>
                    @endif
                    <div class="form-group text-center">
                        <div class="">
                            <div class="">
                                <button type="submit" class="btn btn-sm btn-outline-primary btn-block">Sign Up</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <h6 class="text-light text-center">or</h6>
                        <a href="{{route('auth.signin')}}" class="btn btn-sm btn-outline-light btn-block">Sign In</a>
                        <!-- <a href="{{route('auth.signin')}}" class="text-muted">Already have an account ?</a> -->
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@stop