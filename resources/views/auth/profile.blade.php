<x-app-layout title="My Account">
  <section class="my-4">
    <h1>My Account</h1>
    <div class="my-3">
      <div class="row ">
        <div class="col-md-6 col-lg-6">
          <div class="card bg-white">
            <div class="card-body">
              <form action="#" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" id="name" class="form-control" value="{{ auth()->user()->name }}">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" id="email" class="form-control" value="{{ auth()->user()->email }}">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="password_confirmation" class="form-label">Password Confirmation</label>
                  <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-6 col">
          <div class="card bg-white">
            <div class="card-body">
              @forelse ( $bankUsers as $bankPribadi )
                <div class="card">
                  <div class="card-body">
                    <h4>Rekening Saya</h4>
                    <p>{{ $bankPribadi->bank->nama_bank }}</p>

                    <p class="h5">{{ $bankPribadi->nama }}</p>
                    <p class="h4">{{ $bankPribadi->number_bank }}</p>

                  </div>
                </div>
                
              @empty
                <div class="card">
                  <div class="card-body">
                    <h1>Belum ada data</h1>
                    <a href="{{ route('bank-user.create') }}" class="btn btn-primary">Tambah Rekening</a> 
                  </div>
                </div>
              @endforelse
            <a href="{{ route('bank-user.create') }}" class="btn btn-primary mt-3">Tambah Rekening</a> 

            </div>
            <div>

            </div>
            
          </div>
          
        </div>
      </div>
     
    </div>
  </section>
  
</x-app-layout>