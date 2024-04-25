@php
    use App\Models\Order;

    $orderCount = Order::where('status', Order::PEMBAYARAN_BERHASIL)->sum('jumlahBeli');
    $salesCount = Order::where('status', Order::SEGERA_DI_KONFIRMASI)->sum('jumlahBeli');
    $buyerCount = Order::where('status', Order::PEMBAYARAN_BERHASIL)->sum('totalPembelian');
@endphp

<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a class="active" href="#">Home</a>
                </li>
            </ul>
        </div>
    </div>

    <ul class="box-info">
        <li>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3>{{$orderCount}}</h3>
                <p>Total Jumlah Pembelian</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-group' ></i>
            <span class="text">
                <h3>Rp {{number_format($buyerCount, 0, ',', '.')}}</h3>
                <p>Total Transaksi</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-circle' ></i>
            <span class="text">
                <h3>{{$salesCount}}</h3>
                <p>Konfirmasi Pemesanan</p>
            </span>
        </li>
    </ul>
</main>
<!-- MAIN -->
