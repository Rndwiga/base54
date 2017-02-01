@extends('layouts.portal')

@section('title', 'Main page')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Users</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/')}}">Home</a>
            </li>
            <li>
                <a>Users</a>
            </li>
            <li class="active">
                <strong>User List</strong>
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
                                <th>Name</th>
                                <th>email</th>
                                <th>Role</th>
                                <th>Activation</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th width="auto">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($users))
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role->name}}</td>
                                        <td>{{$user->activated == 1 ? 'Active' : 'Deactivated'}}</td>
                                        <td>{{$user->is_active == 1 ? 'Enabled' : 'Disabled'}}</td>
                                        <td>{{$user->created_at->diffForhumans()}}</td>


                                        <td>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class='pull-left'>
                                                    <a href="{{url('admin/users/'. $user->id .'/edit')}}" class="btn btn-success" ><i class="fa fa-pencil"></i></a>
                                                    <a href="#" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                                                    &nbsp;
                                                </div>
                                                {{--<div class='pull-right'>--}}
                                                <div class=''>
                                                    {!! Form::open(['url' => 'password/email', 'method' => 'post']) !!}
                                                    <input type="hidden" class="form-control" name="email" value="{{$user->email}}">
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
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

    </script>
@endsection
