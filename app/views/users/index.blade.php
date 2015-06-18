@extends('layouts.default')

@section('content')

    <h1>All users</h1>

    <ul class="media-list">

    @foreach($users as $user)

        <li class="media">
            <div class="media-left">
                <a href="{{ route('users.profile', ['username' => $user->username]) }}">
                    {{ HTML::image(Presenter::gravatar($user->email, 50), $user->username, ['class' => 'media-object img-circle']) }}
                </a>
            </div>
            <div class="media-body media-middle">
                <a href="{{ route('users.profile', ['username' => $user->username]) }}">
                    <h4 class="media-heading">{{ $user->username }}</h4>
                </a>
            </div>
        </li>

    @endforeach

    </ul>

    {{ $users->links() }}

@stop