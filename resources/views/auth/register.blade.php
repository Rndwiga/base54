@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.min.css" />
    @endsection
@section('content')
    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>
                {{--<h1 class="logo-name">{{config('app.name')}}</h1>--}}
            </div>
            <h3>Register</h3>
            {!! Form::open(['action' => 'Auth\RegisterController@register', 'method' => 'post','class' => 'm-t', 'role' => 'form']) !!}
            {{--<form class="m-t" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}--}}
                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required="">
                    @if ($errors->has('first_name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required="">
                    @if ($errors->has('last_name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                    @endif
                </div>


            {{--
            <div class="form-group{{ $errors->has('mobile_number') ? ' has-error' : '' }}">
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                        <input type="text" class="form-control" name="mobile_number" data-mask="(999) 999-999-999" value="{{ old('mobile_number') }}" placeholder="Registered mobile number" required="">
                        <span class="help-block">(254) 700-000-000</span>
                        @if ($errors->has('mobile_number'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('mobile_number') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            <div class="form-group{{ $errors->has('alternate_mobile_number') ? ' has-error' : '' }}">
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                        <input type="text" class="form-control" name="alternate_mobile_number" data-mask="(999) 999-999-999" value="{{ old('alternate_mobile_number') }}" placeholder="Other number">
                        <span class="help-block">(254) 700-000-000</span>
                        @if ($errors->has('alternate_mobile_number'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('alternate_mobile_number') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                            <div class="form-group{{ $errors->has('nick_name') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" name="nick_name" value="{{ old('nick_name') }}" placeholder="Nickname e.g. Aguy" required="">
                                @if ($errors->has('nick_name'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('nick_name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('blood_type') ? ' has-error' : '' }}">
                                <select class="form-control m-b" name="blood_type" required>
                                    <option>select your blood group</option>
                                    <option value="A_positive">A+</option>
                                    <option value="A_negative">A-</option>
                                    <option value="B_positive">B+</option>
                                    <option value="B_negative">B-</option>
                                    <option value="O_positive">O+</option>
                                    <option value="O_negative">O-</option>
                                    <option value="AB_positive">AB+</option>
                                    <option value="AB_negative">AB-</option>
                                </select>
                            @if ($errors->has('blood_type'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('blood_type') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group date {{ $errors->has('date_of_birth') ? ' has-error' : '' }}" data-provide="datepicker">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="Date of birth" required="">
                                    @if ($errors->has('date_of_birth'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                                </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group{{ $errors->has('biker_group') ? ' has-error' : '' }}">
                                <select class="form-control m-b" name="biker_group">
                                    <option> -- Select Biker Group -- </option>
                                    <option>Team Apache</option>
                                    <option>SuperHERO Biker Club</option>
                                    <option>Tribe Bikers</option>
                                    <option>True Bikers</option>
                                    <option>Cruzin Kings Bikers Club</option>
                                    <option>Lady Bikers</option>
                                    <option>The Superbikes Association</option>
                                    <option>Dirt Masters</option>
                                    <option>Outriders Associations</option>
                                    <option>Adventure Riders</option>
                                    <option>Adventure Riders</option>
                                    <option>Coast Bikers</option>
                                    <option>Jubilee Riders</option>
                                    <option>Enduro Bikers</option>
                                    <option>East End Bikers</option>
                                    <option>Ajabu Riders</option>
                                    <option>Inked Bikers</option>
                                    <option>Kuul Bikers</option>
                                    <option>Mature Bikers</option>
                                    <option>Lakeside Outriders</option>
                                </select>

                            @if ($errors->has('biker_group'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('biker_group') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('current_location') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" name="current_location" value="{{ old('current_location') }}" placeholder="Where do you stay?" required="">
                                @if ($errors->has('current_location'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('current_location') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('town_of_residence') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" name="town_of_residence" value="{{ old('town_of_residence') }}" placeholder="Town" required="">
                                @if ($errors->has('town_of_residence'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('town_of_residence') }}</strong>
                                </span>
                                @endif
                            </div>--}}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" placeholder="Your email" name="email" value="{{ old('email') }}" required="">
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" placeholder="Your password" name="password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                </div>
                <div class="form-group">
                    <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register <i class="fa fa-user "></i></button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ url('/login') }}">Login  <i class="fa fa-sign-in"></i></a>
            </form>
            <p class="m-t"> <small>&copy; {{date('Y')}} Tyondo Enterprise</small> </p>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });


    </script>
@endsection