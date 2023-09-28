  <div class="card bg-white shadow-sm">
    <div class="d-flex">
      <a href="{{ $link }}" class="p-2">
          <img src="{{ $image }}" class="rounded-3" alt="..." style="width: 100px; height:100px;">
      </a>
      <div class="card-body">
          <h5 class="card-title fw-semibold">{{ $title }}</h5>
          <p class="card-text">Rate pada provider ini {{ $rate }}</p>
          {{-- <a href="{{ $link }}" class="btn btn-primary">Tukar Sekarang</a> --}}
      </div>
    </div>
  </div>
