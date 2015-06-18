<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{ link_to_route('home', 'Larabook', null, ['class' => 'navbar-brand']) }}
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li>{{ link_to_route('users', 'Users') }}</li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
            @if ($currentUser)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ HTML::image(Presenter::gravatar($currentUser->email), $currentUser->username, ['class' => 'nav-gravatar']) }}
                        {{ $currentUser->username }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>{{ link_to_route('users.profile', 'Your profile', ['username' => $currentUser->username]) }}</li>
                        <li class="divider"></li>
                        <li>{{ link_to_route('logout', 'Log out') }}</li>
                    </ul>
                </li>
            @else
                <li>{{ link_to_route('register', 'Register') }}</li>
                <li>{{ link_to_route('login', 'Log In') }}</li>
            @endif
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>