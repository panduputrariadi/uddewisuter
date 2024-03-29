<section id="sidebar">
    <a href="#" class="brand text-decoration-none">
        <i class='bx bxs-smile'></i>
        <span class="text">UD.Dewi Suter</span>
    </a>
    <ul class="side-menu top">
        <li class="{{ \Illuminate\Support\Facades\Route::current()->uri == 'dashboard' ? 'active':''}}">
            <a href="dashboard">
                <i class='bx bxs-dashboard' ></i>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li class="{{ \Illuminate\Support\Facades\Route::current()->uri == 'produk' ? 'active':''}}">
            <a href="produk">
                <i class='bx bxs-shopping-bag-alt' ></i>
                <span class="text">Product</span>
            </a>

        </li>
        <li class="{{ \Illuminate\Support\Facades\Route::current()->uri == 'kategori' ? 'active':''}}">
            <a href="kategori">
                <i class='bx bxs-category' ></i>
                <span class="text">Kategori</span>
            </a>
        </li>

        <li class="{{ \Illuminate\Support\Facades\Route::current()->uri == 'kelolaOrder' ? 'active':''}}">
            <a href="kelolaOrder">
                <i class='bx bxs-message-dots' ></i>
                <span class="text">Order Manage</span>
            </a>
        </li>
        <li class="{{ \Illuminate\Support\Facades\Route::current()->uri == '/' ? 'active':''}}">
            <a href="/">
                <i class='bx bxs-bookmark' ></i>
                <span class="text">Dashboard Pelanggan</span>
            </a>
        </li>

    </ul>
    <ul class="side-menu">

        <li>
            <a href="{{route('logout')}}" class="logout">
                <i class='bx bxs-log-out-circle' ></i>
                <span class="text">Logout</span>
            </a>
        </li>
    </ul>
</section>
