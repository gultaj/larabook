@extends('layouts.default')

@section('content')

    <div class="jumbotron">
        <h1>Welcome to Larabook!</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias dolorem doloremque dolores et explicabo harum illo impedit iste libero obcaecati perspiciatis porro quibusdam quis, quisquam reiciendis tempora unde veniam voluptates.</p>

        @if (!$currentUser)

            <p>{{ link_to_route('register', 'Sign Up', null, ['class' => 'btn btn-primary btn-lg']) }}</p>

        @endif
        
    </div>

@stop
