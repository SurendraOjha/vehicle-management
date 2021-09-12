@extends('layouts.login')
@section('title')
    Login
@endsection
@section('content')
<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">

    @php
        @$setting = \App\Models\Setting::find(1);
    @endphp
        <div class="auth_brand">
            <a class="navbar-brand" href="javascript:void(0);" style="color:#0292D7">

            <img src="{{asset('public/uploads/'.@$setting->system_name)}}"
            width="30" height="30" class="d-inline-block align-top mr-2" alt="">
                {{@$setting->company_name}}
        </a>
        </div>
        <div class="card">
            <div class="body">
                <p class="lead" style="color:#0292D7">Login to your account</p>

                <form method="POST" class="form-auth-small m-t-20" action="{{ route('login') }}">
                        @csrf

                        {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="signin-email" class="control-label sr-only">Email</label>
                        <input type="email" name="email" class="form-control round @error('email') is-invalid @enderror"
                    id="signin-email" value="{{old('email')}}" placeholder="Email">

                         @error('email')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="signin-password" class="control-label sr-only">Password</label>
                        <input type="password" name="password" class="form-control round @error('password') is-invalid @enderror"
                        id="signin-password" value="" placeholder="Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group clearfix">
                        <label class="fancy-checkbox element-left">
                            <input type="checkbox">
                            <span>Remember me</span>
                        </label>
                    </div>
                    <button type="submit" onclick="this.form.submit();this.disabled = true;"  class="btn btn-primary btn-round btn-block">LOGIN</button>

                </form>
                    {{-- <div class="bottom">
                        <span class="helper-text m-b-10"><i class="fa fa-lock"></i>
                        <a href="{{url('reset-password')}}">Forgot password?</a></span>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
@endsection
