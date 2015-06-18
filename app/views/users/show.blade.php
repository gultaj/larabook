@extends('layouts.default')

@section('content')

    <div class="row">
        <div class="col-md-4">
            <h1 class="">{{ $user->username }}</h1>
            {{ HTML::image(Presenter::gravatar($user->email, 70), $user->username, ['class' => 'img-circle']) }}
        </div>
        <div class="col-md-6">
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
