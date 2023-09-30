<x-app-layout title="Detail History Transaksi">
    <section class="my-5 container">
        <h1 class="fw-semibold text-center mb-4">Detail History Transaksi</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="text-secondary">Pulsa Kamu</p>
                                <h3 class="fw-semibold">{{ $transaction->amount }}</h3>
                            </div>
                            <div class="col-md-6">
                                <p class="text-secondary">Hasil Penukaran</p>
                                <h3 class="fw-semibold">Rp.{{ $transaction->convert }}</h3>
                            </div>
                            <div class="col-md-6">
                                <p class="text-secondary">Status</p>
                                @if ($transaction->status == 'Pending')
                                    <h3 class="fw-semibold text-warning">
                                        {{ $transaction->status }}
                                    </h3>
                                @else
                                    <h3 class="fw-semibold text-success">
                                        {{ $transaction->status }}
                                    </h3>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <p class="text-secondary">Operator</p>
                                <h3 class="fw-semibold">{{ $transaction->provider->name }}</h3>
                            </div>
                            <div class="col-md-6 mt-3">
                                <p class="text-secondary">Rekening</p>
                                <div class="card bg-white">
                                    <div class="card-body">
                                        <h5 class="fw-semibold">{{ $transaction->bankUser->bank->nama_bank }}</h5>
                                        <h5 class="fw-semibold">{{ $transaction->bankUser->nama }}</h5>
                                        <h5 class="fw-semibold">{{ $transaction->bankUser->number_bank }}</h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mt-3">
                          <a href="{{ route('transaction-web.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>

                </div>
            </div>


        </div>


    </section>
</x-app-layout>
