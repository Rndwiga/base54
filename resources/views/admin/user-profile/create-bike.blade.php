@extends('layouts.portal')

@section('css')

@endsection
@section('content')
    <!-- page content -->
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>User Form</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    <a href="{{url('admin/users')}}">Users</a>
                </li>
                <li class="active">
                    <strong>User Form</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Primary bike</h5>
                        <div class="ibox-tools">
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::open(['action' => 'Admin\UsersController@store', 'method' => 'post', 'class'=> 'form-horizontal form-label-left' , 'files' => true ]) !!}
                                <div class="form-group">
                                        {{ Form::text('bike_one_make', null, ['required'=> 'required','placeholder' => 'Primary bike make e.g kawaski', 'class' => 'form-control col-md-7 col-xs-12']) }}
                                </div>
                                <div class="form-group">
                                        {{ Form::text('bike_one_plate', null, ['required'=> 'required','placeholder' => 'Primary bike plate', 'class' => 'form-control col-md-7 col-xs-12']) }}
                                </div>
                                <div class="form-group">
                                        {{ Form::text('bike_one_description', null, ['required'=> 'required','placeholder' => 'primary bike description e.g color', 'class' => 'form-control col-md-7 col-xs-12']) }}
                                </div>
                                <div class="form-group">
                                        {{ Form::select('role_id', ['' => 'What is the relationship?'] + $roles , null, ['class' => 'form-control col-md-7 col-xs-12']) }}
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <a href="{{url('admin/users')}}" class="btn btn-block btn-primary">Cancel</a>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-xs-6">
                                        <button type="submit" class="btn btn-block btn-success pull-right">Submit</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Secondary bike</h5>
                        <div class="ibox-tools">
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::open(['action' => 'Admin\UsersController@store', 'method' => 'post', 'class'=> 'form-horizontal form-label-left' , 'files' => true ]) !!}
                                <div class="form-group">
                                        {{ Form::text('bike_two_make', null, ['required'=> 'required','placeholder' => 'secondary bike make e.g kawaski', 'class' => 'form-control col-md-7 col-xs-12']) }}
                                </div>
                                <div class="form-group">
                                        {{ Form::text('bike_two_plate', null, ['required'=> 'required','placeholder' => 'secondary bike plate', 'class' => 'form-control col-md-7 col-xs-12']) }}
                                </div>
                                <div class="form-group">
                                        {{ Form::text('bike_two_description', null, ['required'=> 'required','placeholder' => 'secondary bike description', 'class' => 'form-control col-md-7 col-xs-12']) }}
                                </div>
                                <div class="form-group">
                                        {{ Form::select('role_id', ['' => 'What is the relationship?'] + $roles , null, ['class' => 'form-control col-md-7 col-xs-12']) }}
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <a href="{{url('admin/users')}}" class="btn btn-block btn-primary">Cancel</a>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-xs-6">
                                        <button type="submit" class="btn btn-block btn-success pull-right">Submit</button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection