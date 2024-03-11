<div class="bg-image container-fluid mb-5 py-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3 text-white">List Produk</h1>
        <div class="d-inline-flex">
            <div class="" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-white text-decoration-none">Beranda</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">List Produk</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl mb-5" id="produk">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12 align-items-center justify-content-center">
                <div class="justify-content-center">
                    <div class="section-title-4 text-primary px-3 ms-5 text-center" data-aos="fade-up">Produk Kami</div>
                    <h1 class="display-6 ms-3 text-center mb-3" data-aos="fade-up">UD Dewisuter
                    </h1>
                </div>
            </div>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach ($produk as $data)
                <div class="col-lg-4 col-md-5" data-aos="fade-up">
                    <div class="team-item position-relative rounded">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <div id="carousel-{{ $data->id }}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($data->photo as $index => $photo)
                                        <div class="product carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <img class="d-block w-100" src="{{ asset('storage/' . $photo->path) }}"
                                                alt="Product Image" style="height:400px;">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carousel-{{ $data->id }}" role="button"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next " href="#carousel-{{ $data->id }}" role="button"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="team-text bg-light text-center p-4">
                            <h5>{{ $data->namaProduk }} {{ Str::limit($data->category['namaKategori'], 20, '...') }}</h5>
                            <p class="text-primary">Rp {{ number_format($data->category['harga'], 0, ',', '.') }}</p>
                            <div class="team-social d-flex justify-content-center">
                                <a class="btn btn-square ms-2 rounded-circle d-flex align-items-center justify-content-center" href="detailProduk/{{$data->id}}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-square ms-2 rounded-circle d-flex align-items-center justify-content-center" href="">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
