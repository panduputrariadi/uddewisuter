<!-- Modal -->
<div class="modal fade" id="editOrder_{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Order Pelanggan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('melengkapiOrder', $item->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Konfirmasi Status</label>
                        <select id="series_products" name="status" class="form-select rounded-0">
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="{{ \App\Models\Order::PEMBAYARAN_BERHASIL }}">Pembayaran Telah Berhasil</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Estimasii</label>
                        <input type="text" class="form-control rounded-0" id="exampleInputEmail1" name="estimasi"
                            aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary rounded-0">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
