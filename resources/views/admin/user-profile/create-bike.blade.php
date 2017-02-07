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
                        <h5>New Role</h5>
                        <div class="ibox-tools">
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::open(['action' => 'Admin\ACL\AuthenticateController@createRole', 'method' => 'post', 'class'=> 'form-horizontal form-label-left']) !!}
                                <div class="form-group">
                                        {{ Form::text('name', null, ['required'=> 'required','placeholder' => 'New role name', 'class' => 'form-control col-md-7 col-xs-12']) }}
                                </div>
                                <div class="form-group">
                                        {{ Form::text('description', null, ['required'=> 'required','placeholder' => 'Role Description', 'class' => 'form-control col-md-7 col-xs-12']) }}
                                </div>
                                {{--<div class="form-group">
                                        {{ Form::select('role_id', ['' => 'What is the relationship?'] + $roles , null, ['class' => 'form-control col-md-7 col-xs-12']) }}
                                </div>--}}
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
                            <div class="col-md-12">
                                {!! Form::open(['action' => 'Admin\ACL\AuthenticateController@createRole', 'method' => 'post', 'class'=> 'form-horizontal form-label-left']) !!}
                                <div class="form-group">
                                        {{ Form::text('name', null, ['required'=> 'required','placeholder' => 'New Permission', 'class' => 'form-control col-md-7 col-xs-12']) }}
                                </div>
                                <div class="form-group">
                                        {{ Form::select('role_id', ['' => 'Attach to Role'] + $rolesSelect , null, ['class' => 'form-control col-md-7 col-xs-12']) }}
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
                        <h5>Role List</h5>
                        <div class="ibox-tools">
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-group">
                                    @foreach($roles as $role)
                                    <li class="list-group-item">
                                       {{$role->name}}
                                        {{--<span class="badge badge-primary">16</span>--}}
                                    </li>
                                    @endforeach
                                </ul>
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