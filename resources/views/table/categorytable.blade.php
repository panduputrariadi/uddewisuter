<div class="container-fluid">
    @include('modals.createcategory')
    <button type="button" class="btn btn-primary rounded-0 my-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Kategori
    </button>

    <table class="table table-bordered overflow-x-auto">
        <thead>
            <tr class="text-center">
                <th scope="col">nomor</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Stok</th>
                <th scope="col">Harga</th>
                <th scope="col">Berat</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
            @foreach ($kategori as $data)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td >{{$data->namaKategori}}</td>
                    <td class="text-center">{{$data->stok}}</td>
                    <td>Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
                    <td class="text-center">{{$data->berat}}</td>
                    <td>{!! nl2br(e(mb_substr($data->deskripsi, 0, 400))) !!}</td>
                    <td class="text-center">
                        <a href="" class="text-dark" data-bs-toggle="modal" data-bs-target="#editKategori_{{$data->id}}">
                            <button type="button" class="btn btn-warning">
                                <i class='bx bx-edit-alt'></i>
                            </button>
                        </a>
                        {{-- <a href="kategori/{{$data->id}}" class="delete-confirmation" data-confirm-delete="true">
                            <button type="button" class="btn btn-danger text-light">
                                <i class='bx bxs-trash-alt'></i>
                            </button>
                        </a> --}}
                    </td>
                </tr>
                @include('modals.updatecategory')
            @endforeach

        <tbody>

        </tbody>
    </table>

</div>
