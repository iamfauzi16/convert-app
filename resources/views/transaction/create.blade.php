<x-app-layout>
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="text-center mb-4 text-white">Silahkan Convert Pulsa</h1>
                    <form action="{{ route('transaction-web.store') }}" class="bg-white p-4 rounded-4 shadow-sm"
                        method="POST">
                        @csrf
                        <div class="form-group row p-4 bg-danger rounded-3 mb-4 text-white shadow-sm">
                            <div class="col-md-3 col-sm-3 col-lg-3 mb-3">
                                <label for="operator">Operator</label>
                                <input type="hidden" value="{{ $provider->id }}" name="provider_id">
                                <h3>{{ $provider->name }}</h3>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 mb-3" id="textCopy">
                                <label for="number_transfer">Nomer Transfer</label>
                                <div class="d-flex align-items-center gap-2">
                                    <h3 id="textToCopy">{{ $provider->numberTransfer->number_transfer }}</h3>
                                    {{-- <button id="copyButton" class="btn btn-primary btn-sm">Copy</button> --}}
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-lg-3 mb-3">
                                <label for="number_transfer">Rate Provider</label>
                                <h3>{{ $provider->rate }}</h3>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="phone">Nomer Handphone</label>
                                <input type="text" class="form-control @error('no_handphone') is-invalid @enderror"
                                    id="phone" placeholder="Masukkan Nomer Handphone" name="no_handphone">
                                @error('no_handphone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input type="text" class="form-control @error('amount') is-invalid @enderror"
                                    id="amount" placeholder="Masukkan Nominal Pulsa" name="amount">
                                @error('amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="received">Uang Diterima</label>
                                <input type="text" class="form-control" id="convert" name="convert" disabled>
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <label for="payment_method">Metode Pembayaran</label>
                                <select class="form-select @error('bank_user_id') is-invalid @enderror"
                                    id="payment_method" aria-label="Default select example" name="bank_user_id">
                                    <option selected>Pilih Metode Pembayaran</option>

                                    @forelse ($bankUsers as $item)
                                        <option value="{{ $item->id }}">
                                            <span class="fw-semibold">{{ $item->bank->nama_bank }}</span> -
                                            <span class="fw-semibold">{{ $item->number_bank }}</span> -
                                            <span class="fw-semibold">{{ $item->nama }}</span>
                                        </option>
                                    @empty
                                        <option disabled>Data tidak ditemukan</option>
                                    @endforelse

                                </select>
                                @error('bank_user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Proses Transaksi</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @endpush

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#amount").on('input', function() {
                    var inputAmount = $(this).val();
                    var rate = {{ $provider->rate ?? 0 }};
                    var hasilConvert = inputAmount * rate;

                    $("#convert").val("Rp. " + hasilConvert);
                });
            });
        </script>
        {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                var copyButton = document.getElementById('copyButton');
                var textToCopy = document.getElementById('textToCopy');

                copyButton.addEventListener('click', function() {
                    var range = document.createRange();
                    range.selectNode(textToCopy);
                    window.getSelection().removeAllRanges(); // Clear any previous selections
                    window.getSelection().addRange(range);

                    try {
                        document.execCommand('copy');
                        alert('Text copied to clipboard!');
                    } catch (err) {
                        console.error('Unable to copy:', err);
                    }
                });
            });
        </script> --}}
    @endpush
</x-app-layout>
