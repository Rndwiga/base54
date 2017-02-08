@extends('layouts.portal')

@section('content')
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
      <h2>Basic Form</h2>
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

                <form role="form">
                  <div class="form-group"><label>Email</label> <input type="email" placeholder="Enter email" class="form-control"></div>
                  <div class="form-group"><label>Password</label> <input type="password" placeholder="Password" class="form-control"></div>
                  <div>
                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Log in</strong></button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection