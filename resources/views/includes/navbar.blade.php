<nav>
    <div class="row clearfix">
        <p>
            {{ Auth::user()->nom }}
            {{ Auth::user()->prenom }}
        </p>
        <ul class="main-nav" animate slideInDown>
            <li><a href="{{ url('home') }}"><b>ACCUEIL</b></a></li>
            <li class="logout"><a href="{{ url('home') }}"><b>ADMIN DASHBOARD</b></a></li>

        </ul>
    </div>
</nav>