@extends('layouts/main')

@section('title')
   Password Reset
@endsection

@section('content')
<div class="container">

<h2 class="move-up">Password Reset</h2>
<div class="row body-background">

    <div class="row">
        <br>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default move-down">
                <div class="panel-heading text-center">
                    <strong>Reset Your Password</strong>
                    <br>Enter the username of your location <i>(possibly HK something)</i>, and a password reset email will be sent to the Admin.
                </div>
            
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <br>
                {!! Form::open(['data-parsley-validate' => '', 'route' => 'password.email', 'method' => 'post']) !!} 

                <div class="input-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    
                <span class="input-group-addon"><i class="fa fa-user fa-lg" aria-hidden="true" data-toggle="tooltip" title="This field is required"></i>&nbsp;&nbsp;Username:</span>
                {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required' => '', 'unique' => '']) }}
               

                </div> 

                <br>
                 @if ($errors->has('username'))
                    <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif

                {{ Form::submit('Send Password Reset Link to Admin Email', ['class' => 'col-md-5 btn btn-primary btn-block move-down']) }}
                <br>
                {!! Form::close() !!}  

                    {{-- <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}"> --}}
                        {{-- {{ csrf_field() }} --}}

                        {{-- <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username:</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        {{-- <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link to Admin Email
                                </button>
                            </div>
                        </div> --}}
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
