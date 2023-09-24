<x-app-layout>
  <section class="py-5">
      <div class="container">
          <h1 class="text-center mb-4">History Transaksi</h1>

          <div class="row flex-column justify-content-center align-items-center gap-2">
              @forelse ($transactions as $transaction)
                  <div class="col-md-12">
                      <div
                          class="bg-white p-2 border rounded-4 d-flex flex-row justify-content-between align-items-center">
                          <div>
                              <img src={{ url('uploads/' . $transaction->provider->image) }} class="rounded-4"
                                  alt="Image" style="width:100px;" />
                          </div>
                          <div class="d-flex justifty-content-end align-items-center gap-3">
                            <div>
                              <p class="text-secondary">Berhasil Transfer</p>
                              <h3 class="fw-semibold text-success">{{ $transaction->convert }}</h3>
                            </div>
                            <div>
                              <a href="{{ route('transaction-web.show', $transaction->id) }}"
                                class="btn btn-primary">Lihat</a>

                            </div>
                             
                          </div>

                      </div>
                  </div>
              @empty
              @endforelse
          </div>
      </div>
  </section>
</x-app-layout>
