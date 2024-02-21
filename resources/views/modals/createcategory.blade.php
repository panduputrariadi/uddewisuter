<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="kategori" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control rounded-0" id="exampleInputEmail1" name="namaKategori"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Stok</label>
                        <input type="number" class="form-control rounded-0" id="exampleInputEmail1" name="stok"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Harga</label>
                        <input type="number" class="form-control rounded-0" id="exampleInputEmail1" name="harga"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Berat</label>
                        <input type="text" class="form-control rounded-0" id="exampleInputEmail1" name="berat"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="form-floating">
                        <textarea class="form-control rounded-0 mb-3" placeholder="Leave a comment here" id="floatingTextarea" name="deskripsi"></textarea>
                        <label for="floatingTextarea">Deskripsi</label>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-0">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
