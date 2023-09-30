<x-app-layout title="Tambah Rekening">
    <section id="bank" class="container my-5">
        <h1>Tambah Rekening</h1>
        <div class="card bg-white mt-3">
            <div class="card-body">
                <form action="{{ route('bank-user.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="bank" class="form-label">Pilih Bank</label>
                        <select name="bank_id" id="bank_id" class="form-control">
                            <option selected>Pilih Bank</option>
                            @foreach ($banks as $bank)
                                <option value="{{ $bank->id }}">{{ $bank->sandi_bank }} - {{ $bank->nama_bank }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Pemilik">
                    </div>
                    <div class="mb-3">
                        <label for="number_bank" class="form-label">Nomor Rekening</label>
                        <input type="text" name="number_bank" id="number_bank" class="form-control" placeholder="1234 567 789">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Tambah Rekening</button>
                </form>
            </div>

        </div>
    </section>

</x-app-layout>
