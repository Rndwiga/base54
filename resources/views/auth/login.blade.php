@extends('layouts.app')

@section('content')
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                {{--<h4 class="logo-name">{{config('app.name')}}</h4>--}}

            </div>
            <h3>Login</h3>
            @include('partials.flash')
            <form class="m-t" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" placeholder="Username" value="{{ old('email') }}" autofocus required="">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember"> Remember Me
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login  <i class="fa fa-sign-in"></i></button>

                <a href="{{ url('/password/reset') }}"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ url('/register') }}">Create an account <i class="fa fa-user "></i></a>
            </form>
            <p class="m-t"> <small>&copy; {{date('Y')}} Tyondo Enterprise </small> </p>
        </div>
    </div>
@endsection
