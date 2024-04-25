<main>
    <div class="container-fluid pt-1">
        <div class="ms-5 mb-3">
            <form action="" method="get" class="d-flex">
                <div class="mb-3 ms-2 d-flex">
                    <input type="date" class="form-control rounded-0" aria-describedby="emailHelp" name="keyword">
                    <button class="btn btn-outline-primary rounded-0" type="submit">Search</button>
                </div>
            </form>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <div class="" id="konfirmasiPembayaran">
                    <div class="">
                        @foreach ($groupedOrders as $productName => $orders)
                            <h3>{{ $productName }}</h3>
                            <table class="table table-bordered text-center mb-0">
                                <thead class="bg-light text-dark">
                                    <tr>
                                        <th>Nama Pembeli</th>
                                        <th>Status Pembeli</th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah Beli</th>
                                        <th>Sisa Stok</th>
                                        <th>Tanggal Stok dikurangi</th>
                                        <th>Stok Awal</th>
                                        <th>Tanggal Stok Masuk</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->user['name'] }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{$order->product['namaProduk']}} - {{$order->product->category['namaKategori']}}</td>
                                        <td>Rp {{ number_format($order->product->category['harga'], 0, ',', '.') }}</td>
                                        <td>{{ $order->jumlahBeli }}</td>
                                        {{-- Menampilkan jumlah beli --}}
                                        <td>
                                            @foreach ($stocks as $stock)
                                                @if ($stock['category'] == $order->product->category['namaKategori'])
                                                    {{ $stock['initial_stock'] }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($order->updated_at)->format('d-m-Y') }}</td>
                                        {{-- Menampilkan stok awal --}}
                                        <td>
                                            @foreach ($stocks as $stock)
                                                @if ($stock['category'] == $order->product->category['namaKategori'])
                                                    {{ $stock['final_stock'] }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($order->product->category['created_at'])->format('d-m-Y') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
