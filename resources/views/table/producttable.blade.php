<div class="container-fluid">
    @include('modals.createproduct')
    <button type="button" class="btn btn-primary rounded-0 my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Produk
    </button>

    <table class="table table-bordered overflow-x-auto">
        <thead>
            <tr class="text-center">
                <th scope="col">nomor</th>
                <th scope="col">Foto Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Jenis Produk</th>
                <th scope="col">Stok</th>
                <th scope="col">Harga</th>
                <th scope="col">Berat</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($produk as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="width: 100px;">
                        @if ($data->photo->count() > 0)
                            <div id="carousel{{ $data->id }}" class="carousel slide" data-bs-ride="carousel"
                                style="width: 100px;">
                                <div class="carousel-inner" style="width: 100px;">
                                    @foreach ($data->photo as $key => $photo)
                                        <div class="carousel-item{{ $key == 0 ? ' active' : '' }}">
                                            <img src="{{ asset('storage/' . $photo->path) }}"
                                                alt="Image {{ $key + 1 }}"
                                                style="width: 100px; height: 100px;">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carousel{{ $data->id }}" role="button"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel{{ $data->id }}" role="button"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
                        @endif
                    </td>
                    <td>{{$data->namaProduk}} {{$data->kelamin}} - {{$data->category['namaKategori']}}</td>
                    <td>{{$data->jenisProduk}}</td>
                    <td>{{$data->category['stok']}}</td>
                    <td>Rp {{number_format($data->category['harga'], 0, ',', '.')}}</td>
                    <td>{{$data->category['berat']}}</td>
                    <td>{{Str::limit($data->category['deskripsi'], 20, '...')}}</td>
                    <td>
                        <a href="" class="text-dark" data-bs-toggle="modal" data-bs-target="#editProduk_{{$data->id}}">
                            <button type="button" class="btn btn-warning">
                                <i class='bx bx-edit-alt'></i>
                            </button>
                        </a>
                        <a href="produk/{{$data->id}}" class="delete-confirmation" data-confirm-delete="true">
                            <button type="button" class="btn btn-danger text-light">
                                <i class='bx bxs-trash-alt'></i>
                            </button>
                        </a>
                    </td>
                </tr>
                @include('modals.updateproduct')
            @endforeach
        </tbody>
    </table>

</div>
