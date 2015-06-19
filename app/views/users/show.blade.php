@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-4 media">
            <p class="pull-left">
                {{ HTML::image(Presenter::gravatar($user->email, 50), $user->username, ['class' => 'img-circle']) }}
            </p>
            <div class="media-body">
                <h1 class="media-heading">{{ $user->username }}</h1>

                <ul class="list-inline text-muted">
                    <li>{{ $count = $user->statuses->count() }} {{ str_plural('Status', $count) }}</li>
                    <li>{{ $count = $user->followers->count() }} {{ str_plural('Follower', $count) }}</li>
                </ul>


            </div>
            @foreach($user->followers() as $follower)
                <p>{{ $follower->username }}</p>
            @endforeach
        </div>
        <div class="col-md-6">
            @unless($currentUser->id == $user->id)
                @if ($user->followed($currentUser))
                    {{ Form::open(['route' => ['follow', 'id' => $user->id], 'method' => 'DELETE']) }}
                    {{ Form::hidden('user_id', $user->id) }}
                    {{ Form::button('Unfollow', ['type' => 'submit', 'class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                @else
                    {{ Form::open(['route' => 'follows']) }}
                    {{ Form::hidden('user_id', $user->id) }}
                    {{ Form::button('Follow', ['type' => 'submit', 'class' => 'btn btn-info']) }}
                    {{ Form::close() }}
                @endif
            @endunless
            <h2>Statuses</h2>
            @foreach($user->statuses as $status)
                <div>
                    <p class="pull-left">{{ $status->created_at->diffForHumans() }}</p>
                    <p class="col-md-offset-3">{{ $status->body }}</p>
                </div>
            @endforeach
        </div>
    </div>

@stop
