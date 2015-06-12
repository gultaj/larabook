@extends('layouts.default')

@section('content')

    <h1>Sign In!</h1>
    <div class="row">
        <div class="col-xs-6">
            {{ Form::open(['route' => 'login.post', 'id' => 'signin_form']) }}

                <div class="form-group">
                    {{ Form::label('email') }}
                    {{ Form::email('email', null, ['class' => 'form-control']) }}
                    {{ $errors->first('email', '<p class="text-danger">:message</p>') }}
                </div>

                <div class="form-group">
                    {{ Form::label('password') }}
                    {{ Form::password('password', ['class' => 'form-control']) }}
                    {{ $errors->first('password', '<p class="text-danger">:message</p>') }}
                </div>

                <div class="form-group">
                    {{ Form::submit('Log In', ['class' => 'btn btn-primary']) }}
                </div>

            {{ Form::close() }}
        </div>
    </div>
@stop