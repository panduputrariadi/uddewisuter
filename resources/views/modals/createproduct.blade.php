<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="produk" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control rounded-0" id="exampleInputEmail1" name="namaProduk"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis Produk</label>
                        <input type="text" class="form-control rounded-0" id="exampleInputEmail1" name="jenisProduk"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kategori Produk</label>
                        <select id="series_products" name="categoriesId" class="form-select rounded-0">
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach ($kategori as $data)
                                <option value="{{ $data->id }}">{{ $data->namaKategori }}</option>
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
