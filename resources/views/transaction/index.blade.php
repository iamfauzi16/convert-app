<x-app-layout title="History Transaksi">
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
                            <div class="d-flex justifty-content-end align-items-center gap-4">
                                <div>
                                    <p class="text-secondary">Diterima</p>
                                    <h3 class="fw-semibold text-success">Rp.{{ $transaction->convert }}</h3>
                                </div>
                                <div>
                                    <p class="text-secondary">Status</p>
                                    <h3 class="fw-semibold text-success">{{ $transaction->status }}</h3>
                                </div>
                                <div>
                                    @if ($transaction->status == 'Pending')
                                        <a href="{{ route('transaction-web.show', $transaction->id) }}"
                                            class="btn btn-primary">Lihat</a>
                                        <a href="{{ route('confirmation.transaction', $transaction->id) }}"
                                            class="btn btn-primary">Status</a>
                                    @else
                                        <a href="{{ route('transaction-web.show', $transaction->id) }}"
                                            class="btn btn-primary">Lihat</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="bg-light text-center p-3">
                    <p class="text-secondary h6">Belum ada transaksi</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
</x-app-layout>
