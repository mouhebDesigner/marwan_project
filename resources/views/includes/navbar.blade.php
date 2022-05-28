<nav>
    <div class="row clearfix">
        <a href="{{ url('profile') }}" class="profile_name">
            {{ Auth::user()->nom }}
            {{ Auth::user()->prenom }}
        </a>
        <ul class="main-nav" animate slideInDown>
            <li><a href="{{ url('home') }}"><b>ACCUEIL</b></a></li>
            @if(Auth::user()->isAdmin())
            <li class="logout"><a href="{{ url('home') }}"><b>ADMIN DASHBOARD</b></a></li>
            @else 
            
            <li class="logout"><a href="{{ url('home') }}"><b>FORMATEUR DASHBOARD</b></a></li>
            @endif

        </ul>
    </div>
</nav>