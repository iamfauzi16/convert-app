<x-app-layout>
    <section id="bank" class="my-4">
        <h1>Tambah Rekening</h1>
        <div class="card bg-white">
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
                        <input type="text" name="name" id="nama" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="number_bank" class="form-label">Nomor Rekening</label>
                        <input type="text" name="number_bank" id="number_bank" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>

        </div>
    </section>

</x-app-layout>
