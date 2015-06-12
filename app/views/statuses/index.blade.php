@extends('layouts.default')

    @section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>Post a Status!</h1>
        {{ Form::open() }}
        <div class="form-group">
            {{ Form::label('body', 'Status:') }}
            {{ Form::textarea('body', null, ['class' => 'form-control']) }}
            {{ $errors->first('body', '<p class="text-danger">:message</p>') }}
        </div>
        <div class="form-group">
            {{ Form::submit('Post Status', ['class' => 'btn btn-primary']) }}
        </div>
        {{ Form::close() }}


        <h2>Statuses</h2>
        @foreach($statuses as $status)

            <article class="media">
                <div class="pull-left">
                    {{ HTML::image(Presenter::gravatar($currentUser->email, 50), $currentUser->username, ['class' => '']) }}
                </div>
                <div class="media-body">
                    <h4 class="media-heading">{{ $currentUser->username }}</h4>
                    <p>{{ $status->created_at->diffForHumans() }}</p>
                    {{ $status->body }}
                </div>
            </article>

        @endforeach
    </div>

@stop