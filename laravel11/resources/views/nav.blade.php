<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @if(isset($user->email))
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
            @endif
            

            @if(isset($user->email) && $user->role == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="/post">Post</a>
            </li>
            @endif
            
            @if(isset($user->email) && $user->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Admin</a>
                </li>
            @endif
            
            @if(!isset($user->email))
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
            @endif

            @if(isset($user->email))
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            @endif

            @if(!isset($user->email))
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            @endif
        </ul>
    </div>
</nav>