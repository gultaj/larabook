@extends('layouts.default')

    @section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>Post a Status!</h1>
        {{ Form::open() }}
        <div class="form-group">
            {{ Form::label('body', 'Status:') }}
            {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3]) }}
            {{ $errors->first('body', '<p class="text-danger">:message</p>') }}
        </div>
        <div class="form-group text-right">
            {{ Form::submit('Post Status', ['class' => 'btn btn-success']) }}
        </div>
        {{ Form::close() }}


        <h2>Statuses</h2>
        @forelse($statuses as $status)

            <article class="media">
                <div class="pull-left">
                    {{ HTML::image(Presenter::gravatar($status->user->email, 50), $status->user->username, ['class' => 'img-circle']) }}
                </div>
                <div class="media-body">
                    <h4 class="media-heading">
                        @if($currentUser->id == $status->user->id)
                            {{ $currentUser->username }}
                        @else
                            {{ link_to_route('users.profile', $status->user->username, ['username' => $status->user->username]) }}
                        @endif
                    </h4>
                    <p>{{ $status->created_at->diffForHumans() }}</p>
                    {{ $status->body }}
                </div>
            </article>
        @empty
            <h4>Empty</h4>
        @endforelse
    </div>

@stop