@if(Session::has('message'))
		<div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{session('message')}}
  	</div>
@endif

@if (session::has('activationStatus'))
    <div class="alert alert-success">
        {{ trans('auth.activationStatus') }}
    </div>
@endif

@if (session::has('activationWarning'))
    <div class="alert alert-warning">
        {{ trans('auth.activationWarning') }}
    </div>
@endif
