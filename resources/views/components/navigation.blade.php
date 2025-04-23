<header>
    <nav>
        <ul>
            <li><a href="/">Sākums</a></li>
            @if (auth()->check() && auth()->user()->type === 'teacher')
                <li><a href="/register">Pievienot studentu</a></li>
                <li><a href="/subjects">Mācību priekšmeti</a></li>
                <li><a href="/grades/create">Pievienot atzīmi</a></li>
            @endif
            @auth<li><a href="/grades">Skatīt atzīmi</a></li>@endauth
            @auth<li><a href="/profile">Skatīt profilu</a></li>@endauth
        </ul>
    </nav>
</header>