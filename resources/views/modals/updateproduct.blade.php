<!-- Modal -->
<div class="modal fade" id="editProduk_{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="produk/{{$data->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control rounded-0" id="exampleInputEmail1" name="namaProduk"
                            aria-describedby="emailHelp" value="{{$data->namaProduk}}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis Produk</label>
                        <input type="text" class="form-control rounded-0" id="exampleInputEmail1" name="jenisProduk"
                            aria-describedby="emailHelp" value="{{$data->jenisProduk}}">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kategori Produk</label>
                        <select id="series_products" name="categoriesId" class="form-select rounded-0">
                            <option value="" disabled>Pilih Kategori</option>
                            @foreach ($kategori as $listData)
                                <option value="{{ $listData->id }}" {{ $data->category->id == $listData->id ? 'selected' : '' }}>
                                    {{ $listData->namaKategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Foto Produk</label>
                        <input class="form-control rounded-0" type="file" name="photos[]" id="photos" multiple>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-0">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
