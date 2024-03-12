<div class="bg-image container-fluid mb-5 py-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3 text-white">Pesanan</h1>
        <div class="d-inline-flex">
            <div class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-white text-decoration-none">Beranda</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Pesanan Anda</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-1">
    <div class="row px-xl-5">
        <small id="emailHelp" class="form-text text-muted" style="font-style: italic; color: #999;">Mohon untuk isikan alamat tujuan dengan klik tombol kuning di kolom aksi! agar memunculkan tombol menuju WA untuk konfirmasi pembayaran
            Anda</small>
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
                        <th>Aksi</th>
                        <th>Konfirmasi Pembayaran</th>
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
                                <a href="hapusOrder/{{ $item->id }}" data-confirm-delete="true"
                                    class="delete-confirmation">
                                    <button class="btn btn-sm btn-primary">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </a>
                                <a href="" class="" data-bs-toggle="modal"
                                    data-bs-target="#editOrder_{{ $item->id }}">
                                    <button type="button" class="btn btn-sm btn-warning">
                                        <i class='bx bx-edit-alt'></i>
                                    </button>
                                </a>
                                <a href="cetakNota/{{$item->id}}">
                                    <button class="btn btn-sm btn-info">
                                        <i class='bx bx-down-arrow-alt'></i>
                                    </button>
                                </a>
                            </td>
                            <td>
                                @if ($item->alamatTujuan)
                                    <a href="https://api.whatsapp.com/send?phone=62895428272427" target="_blank">
                                        <button class="btn btn-sm btn-primary px-3 ms-3 rounded-0">
                                            <i class="fas fa-comment mr-1"></i> WhatsApp
                                        </button>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @include('modals.updateorder')
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
