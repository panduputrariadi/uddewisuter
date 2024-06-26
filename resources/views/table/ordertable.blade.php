<div class="container-fluid pt-1">
    <div class="row px-xl-5">
        <div class="col-lg-12 table-responsive mb-5">
            <a href="cetakLaporan">
                <button type="button" class="btn btn-primary rounded-0 my-3">
                    download laporan
                </button>
            </a>
            <div class="" id="konfirmasiPembayaran">
                <div class="">
                    <table class="table table-bordered text-center mb-0">
                        <thead class="bg-light text-dark">
                            <tr>
                                <th>Nama Pembeli</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Jumlah Beli</th>
                                <th>Biaya kirim</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Alamat Tujuan</th>
                                <th>Estimasi</th>
                                <th>Tanggal Order</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            @foreach ($order as $item)
                                <tr>
                                    <td>{{$item->user['name']}}</td>
                                    <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;">
                                        {{ $item->product['namaProduk'] }}
                                        {{ Str::limit($item->product->category['namaKategori'], 30, '...') }}
                                    </td>
                                    <td class="align-middle">Rp
                                        {{ number_format($item->product->category['harga'], 0, ',', '.') }}</td>
                                    <td class="align-middle">{{ $item->jumlahBeli }}</td>
                                    <td>Rp {{ number_format($item->biayaKirim, 0, ',', '.') }}</td>
                                    <td class="align-middle">Rp {{ number_format($item->totalPembelian, 0, ',', '.') }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->alamatTujuan }}</td>
                                    <td>{{$item->estimasi}}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                    <td class="align-middle">
                                        <a href="" class="" data-bs-toggle="modal"
                                            data-bs-target="#editOrder_{{ $item->id }}">
                                            <button type="button" class="btn btn-sm btn-warning">
                                                <i class='bx bx-edit-alt'></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                @include('modals.updatemanageorder')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>
