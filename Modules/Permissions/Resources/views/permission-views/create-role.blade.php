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
                        <h5>Create New Role</h5>
                        <div class="ibox-tools">
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::open(['route' => 'roles.form.create', 'method' => 'post', 'class'=> 'form-horizontal form-label-left']) !!}
                                <div class="form-group">
                                        {{ Form::text('name', null, ['required'=> 'required','placeholder' => 'Role name', 'class' => 'form-control col-md-7 col-xs-12']) }}
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

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>New Permission</h5>
                        <div class="ibox-tools">
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::open(['route' => 'permissions.create', 'method' => 'post', 'class'=> 'form-horizontal form-label-left']) !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::text('name', null, ['required'=> 'required','placeholder' => 'New Permission', 'class' => 'form-control col-md-7 col-xs-12']) }}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {{ Form::select('group_id', ['' => 'Attach to permission group'] + $permissionGroupSelect , null, ['class' => 'form-control col-md-7 col-xs-12']) }}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::text('description', null, ['required'=> 'required','placeholder' => 'Permission description', 'class' => 'form-control col-md-7 col-xs-12']) }}
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
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>System Users</h5>
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
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>Permission Group</th>
                                <th>Permission</th>
                                <th>Permission Description</th>
                                <th>Created</th>
                                <th width="17%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($permissions))
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{$permission->group->name}}</td>
                                        <td>{{$permission->name}}</td>
                                        <td>{{$permission->description}}</td>
                                        <td>{{$permission->created_at->diffForhumans()}}</td>
                                        <td>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class='pull-left'>
                                                    <a href="{{url('admin/users/'. $permission->id .'/edit')}}" class="btn btn-success" ><i class="fa fa-pencil"></i></a>
                                                    <a href="#" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                                                    &nbsp;
                                                </div>
                                                {{--<div class='pull-right'>--}}
                                                <div class=''>
                                                    {!! Form::open(['url' => 'password/email', 'method' => 'post']) !!}
                                                    <input type="hidden" class="form-control" name="email" value="{{$permission->email}}">
                                                    <button type="submit" class="btn bg-warning"><i class="fa fa-refresh"></i></button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection