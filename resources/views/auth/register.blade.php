<x-app-layout title="Convert Pulsa | Silahkan buatkan akun terlebih dahulu">
    <div class="container-fluid bg-primary">
        <div class="row" style="min-height: 100vh">
            <div class="col-md-6 col-lg-6 py-5">
                <div class="d-flex flex-column justify-content-center align-items-center mt-5">
                    <img src="{{ asset('undraw_authentication_re_svpt.svg') }}" alt="welcome-image" width="400">
                </div>
            </div>
            <div class="col-md-6 col-lg-6  p-5 bg-white">
                <div class="container mt-5">
                    <h3 class="fw-semibold">Selamat Datang</h3>
                    <p class="text-secondary">Silahkan login terlebih dahulu!</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                 required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                              required autocomplete="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="mb-3">

                            <label class="form-label" for="confirm">Confirm password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">

                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Buat akun</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
