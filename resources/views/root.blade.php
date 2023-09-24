<x-app-layout title="Home | Selamat Datang Nikmati Layanan Convert Pulsa">

    <div class="glide my-4">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <!-- Isi slide carousel disini -->
                @foreach ($banners as $banner)

                <li class="glide__slide">
                  <div class="container">
                    <div class="row justify-content-center align-items-center">
                      <div class="col-12 bg-primary p-5 text-center">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                          <h1 class="fw-semibold text-white">{{ $banner->title }}</h1>
                          <button class="btn btn-dark btn-lg my-4">Buruan Coba!</button>
                        </div>                        
                        <img src="{{ url('uploads/' . $banner->image) }}" alt="Gambar 1" class="img-fluid">
                      </div>
                    </div>
                  </div>
                  
                </li>
                @endforeach

                <!-- Tambahkan lebih banyak slide jika diperlukan -->
            </ul>
        </div>
    </div>


    <section id="provider my-4">
        <h1>Pilih Operator Pulsa</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($providers as $provider)
                <div class="col">
                    <x-card image="{{ url('uploads/' . $provider->image) }}" title="{{ $provider->name }}"
                        rate="{{ $provider->rate }}" link="{{ route('transaction.create' , $provider->id)}}" />
                </div>
            @endforeach
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
