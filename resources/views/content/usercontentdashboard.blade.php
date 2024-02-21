<div class="container-xxl py-5" id="tentangKami">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="position-relative overflow-hidden h-100" style="min-height: 400px;">
                    <img class="position-absolute w-100 h-100 pt-5 pe-5" src="images/img-capt-1.jpeg" alt=""
                        style="object-fit: cover;" data-aos="fade-up">
                    <img class="position-absolute top-0 end-0 bg-white ps-2 pb-2" src="images/img-capt-2.webp"
                        alt="" style="width: 200px; height: 200px;" data-aos="fade-up">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="h-100">
                    <div class="section-title d-inline-block text-primary px-3" data-aos="fade-up">Tentang UD Dewisuter
                    </div>
                    <h1 class="display-6 ms-3" data-aos="fade-up">UD Dewisuter</h1>
                    <div class="p-4 mb-4">
                        <p data-aos="fade-up">UD Dewisuter menyediakan babi ternak yang sehat dan berkualitas. Dengan
                            pemilihan bibit yang cermat dan perawatan yang baik, mereka menjamin bahwa babi ternak yang
                            dijual memiliki standar kesehatan dan kebersihan yang tinggi. Untuk memastikan pertumbuhan
                            optimal dan kesehatan babi ternak, UD Dewisuter menyediakan pakan babi berkualitas tinggi.
                            Dengan formulasi yang disesuaikan, pakan ini dirancang untuk memberikan nutrisi lengkap yang
                            diperlukan untuk pertumbuhan yang sehat. UD Dewisuter juga menyediakan daging babi segar
                            yang dipotong dengan teliti dan diolah dengan standar kebersihan yang tinggi. Dengan
                            pemrosesan yang higienis, daging babi yang dijual oleh UD Dewisuter selalu berkualitas dan
                            lezat.</p>
                        <a class="btn btn-outline-primary py-2 px-3 rounded-0"
                            href="https://maps.app.goo.gl/DSkvxH3V6yBog9tN8" data-aos="fade-up">
                            Alamat UD Dewisuter
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl mb-5" id="produk">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-12 align-items-center justify-content-center">
                <div class="justify-content-center">
                    <div class="section-title-4 text-primary px-3 ms-5 text-center" data-aos="fade-up">Produk Kami
                    </div>
                    <h1 class="display-6 ms-3 text-center" data-aos="fade-up">UD Dewisuter
                    </h1>
                </div>
            </div>

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
