<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="/">Akademik</a>
    <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="bi" width="16" height="16"><use xlink:href="#list"/></svg>
            </button>
        </li>
    </ul>
    <div class="w-100"></div>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            @auth
                <form action="/logout" method="post" class="d-inline">
                    @csrf
                    <button type="submit" class="nav-link px-3 bg-transparent border-0 text-white">Sign out</button>
                </form>
            @else
                <a class="nav-link px-3 text-white" href="/login">Sign in</a>
            @endauth
        </div>
    </div>
</header>
