<x-app-layout>
    <section>
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card">
        
                        <div class="card-body">
                          <h3 class="fw-semibold">Halo, <span class="text-primary">{{ Auth::user()->name }}</span></h3>
    
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
        
                            {{ __('You are logged in!') }}
    
                            <div class="row  mt-4 gap-2">
                                <div class="col">
                                    <div class="card bg-white">
                                        <div class="card-body">
                                           <p class="fw-light body-secondary">History Transaksi</p> 
                                           <h3>{{ $transactions }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card bg-white">
                                        <div class="card-body">
                                           <p class="fw-light body-secondary">Akun Bank</p> 
                                           <h3>{{ $bankUsers }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card bg-white">
                                        <div class="card-body">
                                           <p class="fw-light body-secondary">Pending Transaksi</p> 
                                           <h3>{{ $transactionPendings }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card bg-white">
                                        <div class="card-body">
                                           <p class="fw-light body-secondary">Berhasil Transaksi</p> 
                                           <h3>{{ $transactionConfirmeds }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <h3>Menu</h3>
                                <div class="row gap-4 mt-4">
                                    <div class="col">
                                      <div class="card bg-white">
                                        <div class="card-body">
                                            <div class="my-3" style="width: 40px;">
                                                <svg class="text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1v14h16M4 5l3 4 4-4 5 5m0 0h-3.207M16 10V6.793"/>
                                                </svg>
                                            </div>
                                            <a href="{{ route('transaction-web.index') }}" target="__blank" style="text-decoration: none; color:black;">
                                                <p class="h3 fw-semibold ">History Transaksi</p>
                                            </a>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col">
                                        <div class="card bg-white">
                                            <div class="card-body">
                                                <div class="my-3" style="width: 20px;">
                                                    <svg class="text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 11 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1.75 15.363a4.954 4.954 0 0 0 2.638 1.574c2.345.572 4.653-.434 5.155-2.247.502-1.813-1.313-3.79-3.657-4.364-2.344-.574-4.16-2.551-3.658-4.364.502-1.813 2.81-2.818 5.155-2.246A4.97 4.97 0 0 1 10 5.264M6 17.097v1.82m0-17.5v2.138"/>
                                                      </svg>
                                                </div>
                                                <a href="{{ route('bank-user.create') }}" target="__blank" style="text-decoration: none; color:black;">
                                                    <p class="h3 fw-semibold ">Tambah Bank</p>
                                                </a>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col">
                                        <div class="card bg-white">
                                            <div class="card-body">
                                                <div class="my-3" style="width: 30px;">
                                                    <svg class="text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 18">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-2 3h4a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z"/>
                                                      </svg>
                                                </div>
                                                <a href="{{ route('profile.index') }}" target="__blank" style="text-decoration: none; color:black;">
                                                    <p class="h3 fw-semibold ">Profil</p>
                                                </a>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="provider " class="my-4 container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="fw-semibold">Pilih Operator Pulsa</h1>
                <div class="row row-cols-1 row-cols-md-2 g-4 mt-2">
                    @foreach ($providers as $provider)
                        <div class="col">
                            <x-card image="{{ url('uploads/' . $provider->image) }}" title="{{ $provider->name }}"
                                rate="{{ $provider->rate }}" link="{{ route('transaction.create', $provider->id) }}" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    
    </section>
 

     
</x-app-layout>
