<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Akademik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item"><a class="nav-link" href="/layouts">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/prodi">Prodi</a></li>
                    <li class="nav-item"><a class="nav-link" href="/mahasiswa" aria-disabled="true">Mahasiswa</a></li>
                    <li class="nav-item"><a class="nav-link" href="/dosen" aria-disabled="true">Dosen</a></li>
                    {{-- <li class="nav-item"><a class="nav-link"
                            href="{{ route('prodi', ['jurusan' => 'Teknologi Informasi', 'prodi' => 'TRPL']) }}"
                            disabled>Prodi</a>
                    </li> --}}
                    <li class="nav-item"><a class="nav-link" href="/matakuliah">Matakuliah</a></li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Welcome, {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow border-0">
                                <li><a class="dropdown-item" href="/users">Daftar User</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="/logout" method="post">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
