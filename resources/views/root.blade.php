<x-app-layout title="Selamat Datang Nikmati Layanan Convert Pulsa">
    <section id="banner">
        <div class="glide my-5">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @foreach ($banners as $banner)
                        <li class="glide__slide">
                            <div class="container bg-primary rounded-4">
                                <div class="row align-items-center">
                                    <div class="col-sm-4 col-md-6 col-lg-7  p-5">
                                        <h1 class="text-white display-3 fw-semibold">{{ $banner->title }}</h1>
                                        <p class=" h4 fw-light lh-base text-white">{{ $banner->content }}</p>
                                        <a href="{{ $banner->link }}"
                                            class="btn btn-outline-light btn-lg mt-4 fw-semibold text-uppercase"
                                            target="__blank">Kepoin Yuk</a>
                                    </div>
                                    <div class="col-sm-4 col-md-6 col-lg-5 p-5">
                                        <img src="{{ url('uploads/' . $banner->image) }}" alt="Banner" class="mx-auto"
                                            style="width: 400px;">
                                    </div>
                                </div>

                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <section id="provider " class="my-4 container">
        <h1 class="fw-semibold">Pilih Operator Pulsa</h1>
        <div class="row row-cols-1 row-cols-md-4 g-4 mt-2">
            @foreach ($providers as $provider)
                <div class="col">
                    <x-card image="{{ url('uploads/' . $provider->image) }}" title="{{ $provider->name }}"
                        rate="{{ $provider->rate }}" link="{{ route('transaction.create', $provider->id) }}" />
                </div>
            @endforeach
        </div>
    </section>

    <section id="rate" class="my-4 container">
        <h1 class="fw-semibold">Rate Hari Ini</h1>
        <div class="row mt-3 gap-3">
            @foreach ($providers as $provider)
                <div class="col-md-12">
                    <div class="card bg-white shadow-sm" id="card">
                        <div class="card-body">
                            <h1 class="fw-semibold">{{ $provider->name }}</h1>
                            <p class="h4 fw-light">Rate : {{ $provider->rate }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section id="hubungi-kami" class="my-4 container">
        <div class="container">
            <div class="row">
                <div class="col-md-12 bg-primary rounded-4 p-5 text-center">
                    <h1 class="fw-semibold text-white">Kita siap membantu kamu <span class="text-warning fw-bold">24
                            Jam</span></h1>
                    <p class="text-white h5">Hubungi kami jika ada yang ingin ditanyakan</p>
                    <a href="https://wa.me/628561193850" target="__blank" class="btn btn-outline-light btn-lg fw-semibold mt-3 ">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="my-4 container">
        <h1 class="fw-semibold text-center">FAQ</h1>
        <div class="row mt-3 gap-3 bg-white p-4 rounded-4">
            <div class="col-md-12 py-4">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    @forelse ($faqs as $key => $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button bg-white text-dark fw-semibold" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq-{{ $key }}"
                                    aria-expanded="{{ $key === 0 ? 'true' : 'false' }}"
                                    aria-controls="faq-{{ $key }}">
                                    {{ $faq->question }}
                                </button>
                            </h2>

                            <div id="faq-{{ $key }}"
                                class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}">
                                <div class="accordion-body">
                                    <p class="h5 text-dark">{{ $faq->answer }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-light p-3">
                            <p class="text-secondary text-center">Tidak ada FAQ</p>
                        </div>
                    @endforelse
                </div>
            </div>
    </section>


    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide/dist/css/glide.core.min.css">
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var glide = new Glide('.glide', {
                    type: 'carousel', // Jenis carousel
                    startAt: 0, // Slide awal
                    perView: 1, // Jumlah slide yang ditampilkan sekaligus
                    focusAt: 'center', // Fokus slide di tengah
                    autoplay: 3000, // Autoplay dengan durasi 3 detik
                });

                glide.mount();
            });
        </script>
    @endpush


</x-app-layout>
