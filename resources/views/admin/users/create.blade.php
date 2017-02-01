@extends('layouts.portal')

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
      <div class="col-lg-12">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5>New User</h5>
            <div class="ibox-tools">
              <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
              </a>
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-wrench"></i>
              </a>
              <ul class="dropdown-menu dropdown-user">
                <li><a href="#">Config option 1</a></li>
              </ul>
              <a class="close-link">
                <i class="fa fa-times"></i>
              </a>
            </div>
          </div>
          <div class="ibox-content">
            <div class="row">
              <div class="col-md-6 col-md-offset-3">

                {!! Form::open(['action' => 'Admin\UsersController@store', 'method' => 'post', 'class'=> 'form-horizontal form-label-left' , 'files' => true ]) !!}

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Full Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ Form::text('name', null, ['required'=> 'required', 'class' => 'form-control col-md-7 col-xs-12']) }}
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ Form::email('email', null, ['required'=> 'required', 'class' => 'form-control col-md-7 col-xs-12']) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ Form::select('role_id', ['' => 'Select'] + $roles , null, ['class' => 'form-control col-md-7 col-xs-12']) }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    {{ Form::select('is_active', array(1 => 'Active', 0 => 'Deactivate'), 0, ['class' => 'form-control col-md-7 col-xs-12']) }}
                  </div>
                </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <a href="{{url('admin/users')}}" class="btn btn-primary">Cancel</a>
                    <button type="submit" class="btn btn-success">Submit</button>
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