<x-app-layout title="Confirmation">
  <section class="mt-5 container">
      <h1 class="text-center mb-3">Konfirmasi Transfer Pulsa</h1>

      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-4">
                              <p class="text-secondary">Pulsa Kamu</p>
                              <h3 class="fw-semibold">
                                  {{ $transaction->amount }}
                              </h3>
                          </div>
                          <div class="col-md-4">
                              <p class="text-secondary">Hasil Penukaran</p>
                              <h3 class="fw-semibold">
                                  Rp. {{ $transaction->convert }}
                              </h3>
                          </div>
                          <div class="col-md-4">
                              <p class="text-secondary">Status</p>
                              @if($transaction->status == 'Pending')
                              <h3 class="fw-semibold text-warning">
                                  {{ $transaction->status }}
                              </h3>
                              @else
                              <h3 class="fw-semibold text-success">
                                {{ $transaction->status }}
                            </h3>
                              @endif
                          </div>
                          <div class="col-md-4">
                              <p class="text-secondary">Operator</p>
                              <h3 class="fw-semibold">
                                  {{ $transaction->provider->name }}
                              </h3>
                          </div>
                          @if($transaction->status == 'Pending')
                          <div class="col-md-12 mt-5">
                              <p class="text-dark">Silahkan Kirim Bukti Pengiriman Pulsa <span class="text-danger">*</span></p>
                              <a href="https://wa.me/628561193850" target="_blank" class="btn btn-success">
                                  <svg class="text-white" style="width:24px; margin-right: 8px;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16.344 12.168-1.4-1.4a1.98 1.98 0 0 0-2.8 0l-.7.7a1.98 1.98 0 0 1-2.8 0l-2.1-2.1a1.98 1.98 0 0 1 0-2.8l.7-.7a1.981 1.981 0 0 0 0-2.8l-1.4-1.4a1.828 1.828 0 0 0-2.8 0C-.638 5.323 1.1 9.542 4.78 13.22c3.68 3.678 7.9 5.418 11.564 1.752a1.828 1.828 0 0 0 0-2.804Z"/>
                                  </svg>
                                  Kirim Whatsapp
                              </a>
                          </div>
                          @else
                          <div class="col-md-12 mt-5">
                             <a href="{{ route('home') }}" class="btn btn-success">Close</a>
                          </div>
                          @endif
                      </div>
                      <div class="mt-5">
                        <a href="{{ route('transaction-web.index') }}" class="btn btn-danger">Kembali</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</x-app-layout>
