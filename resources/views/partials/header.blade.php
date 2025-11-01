<header class="bg-header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a style="--bs-navbar-brand-hover-color: var(--at-light-orange);"
               class="navbar-brand fs-3 fw-bold text-light-orange" href="/">
                EDPA
            </a>
            <button class="navbar-toggler bg-light-orange"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul style="--bs-nav-link-color: var(--bs-light); --bs-nav-link-hover-color: var(--at-orange); --bs-navbar-active-color: var(--at-orange)"
                    class="navbar-nav lsp-125 text-uppercase fw-semibold m-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                           aria-current="{{ request()->is('/') ? 'page' : 'false' }}"
                           href="/">
                            home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light {{ request()->is('/systems') ? 'active' : '' }}"
                           aria-current="{{ request()->is('/systems') ? 'page' : 'false' }}"
                           href="/systems">
                            systems
                        </a>
                    </li>
                </ul>
                @guest
                    <div>
                        <a class="btn btn-primary me-1 {{ request()->is('/auth/signup') ? 'active' : '' }}"
                           href="/auth/signup">
                            Sign Up
                        </a>
                        <a class="btn btn-success {{ request()->is('/auth/login') ? 'active' : '' }}"
                           href="/auth/login">
                            Log In
                        </a>
                    </div>
                @endguest
                @auth
                    <div class="d-flex">
                        <a class="btn btn-primary me-2 {{ request()->is('/user/profile') ? 'active' : '' }}"
                           href="#">
                            Profile
                        </a>
                        <form action="/auth/logout" method="post">
                            @csrf
                            <button class="btn btn-secondary" type="submit">Log Out</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </nav>
</header>
