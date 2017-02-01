@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="passwordBox animated fadeInDown">
    <div class="row">

        <div class="col-md-12">
            <div class="ibox-content">
                <h2 class="font-bold">Forgot password</h2>
                <p>
                    Enter your email address and your password will be reset and emailed to you.
                </p>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <form class="m-t" role="form" method="POST" action="{{ url('/password/email') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control" placeholder="Email address" name="email" value="{{ old('email') }}" required="">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary block full-width m-b">Send new password <i class="fa fa-refresh "></i></button>
                            <a href="{{url('/login')}}" class="btn btn-default block full-width m-b">Login <i class="fa fa-sign-in"></i></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            {{config('app.name')}}
        </div>
        <div class="col-md-6 text-right">
            <small>&copy; {{date('Y')}}</small>
        </div>
    </div>
</div>
@endsection
