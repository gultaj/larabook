@extends('layouts.default')

@section('content')

    <h1>Register!</h1>

    <div class="row">
        <div class="col-xs-6">

            {{ Form::open(['route' => 'register.store']) }}

            <div class="form-group">
                {{ Form::label('username', 'Username:') }}
                {{ Form::text('username', null, ['class' => 'form-control']) }}
                {{ $errors->first('username', '<p class="text-danger">:message</p>') }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}
                {{ $errors->first('email', '<p class="text-danger">:message</p>') }}
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control']) }}
                {{ $errors->first('password', '<p class="text-danger">:message</p>') }}
            </div>

            <div class="form-group">
                {{ Form::label('password_confirmation', 'Password Confirmation:') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                {{ $errors->first('password_confirmation', '<p class="text-danger">:message</p>') }}
            </div>

            <div class="form-group">
                {{ Form::submit('Sign Up', ['class' => 'btn btn-primary']) }}
            </div>

            {{ Form::close() }}
        </div>
    </div>

@stop