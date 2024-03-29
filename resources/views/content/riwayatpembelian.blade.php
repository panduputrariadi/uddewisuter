<div class="bg-image container-fluid mb-5 py-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3 text-white">Riwayat Pembelian</h1>
        <div class="d-inline-flex">
            <div class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-white text-decoration-none">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Riwayat Pebelian Anda</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-1">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="bg-light text-dark">
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah Beli</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Alamat Tujuan</th>
                        <th>Nota</th>
                        <th>Estimasi</th>
                        <th>Hubungi Penjual</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($order as $item)
                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;">
                                {{ $item->product['namaProduk'] }}
                                {{ Str::limit($item->product->category['namaKategori'], 30, '...') }}
                            </td>
                            <td class="align-middle">Rp
                                {{ number_format($item->product->category['harga'], 0, ',', '.') }}</td>
                            <td class="align-middle">{{ $item->jumlahBeli }}</td>
                            <td class="align-middle">Rp {{ number_format($item->totalPembelian, 0, ',', '.') }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->alamatTujuan }}</td>
                            <td class="align-middle">
                                @if ($item->status == \App\Models\Order::PEMBAYARAN_BERHASIL)
                                    <a href="cetakNota/{{ $item->id }}">
                                        <button class="btn btn-sm btn-info">
                                            <i class='bx bx-down-arrow-alt'></i>
                                        </button>
                                    </a>
                                @endif
                            </td>
                            <td class="align-middle">
                                {{ $item->estimasi }}
                            </td>
                            <td>
                                <a href="https://api.whatsapp.com/send?phone=62895428272427" target="_blank">
                                    <button class="btn btn-sm btn-primary px-3 ms-3 rounded-0">
                                        <i class="fas fa-comment mr-1"></i> WhatsApp
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
