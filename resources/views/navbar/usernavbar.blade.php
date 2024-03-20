<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">

    <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand ms-4 ms-lg-0">

            <div class="d-flex align-items-center">
                <!-- <img src="img/logo-secondary.png" alt="" srcset="" style="height: 100px; width: auto;"> -->
                <h1 class="text-primary m-0">UD<span class="text-white"> Dewisuter</span></h1>
            </div>

        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{route('dashboardPelanggan')}}" class="nav-item nav-link active px-lg-4">Beranda</a>
                <a href="{{route('dashboardPelanggan')}}#tentangKami" class="nav-item nav-link px-lg-4">Tentang Kami</a>
                <a href="{{route('produk-dashboard')}}" class="nav-item nav-link px-lg-4">Produk</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Halaman
                    </a>
                    <ul class="dropdown-menu">
                        @if(auth()->check() && auth()->user()->role == 'admin')
                            <li><a class="dropdown-item" href="{{route('dashboard')}}">Admin Dashboard</a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{route('order')}}">Keranjang</a></li>
                    </ul>
                </li>
            </div>
            <div class="d-none d-lg-flex ms-2">
                <a class="btn btn-outline-primary py-2 px-3" href="{{ route('logout') }}">
                    Log out
                </a>
            </div>
        </div>
    </nav>
</div>
