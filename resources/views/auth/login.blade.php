<x-app-layout title="Convert Pulsa | Silahkan masuk terlebih dahulu">
    <div class="container-fluid bg-primary">
        <div class="row" style="min-height: 100vh">
            <div class="col-md-6 col-lg-6 py-5">
                <div class="d-flex flex-column justify-content-center align-items-center mt-5">
                    <img src="{{ asset('undraw_welcome_re_h3d9.svg') }}" alt="welcome-image" width="400">
                </div>
            </div>
            <div class="col-md-6 col-lg-6  p-5 bg-white">
                <div class="container mt-5">
                    <h3 class="fw-semibold">Selamat Datang</h3>
                    <p class="text-secondary">Silahkan login terlebih dahulu!</p>
    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
    
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="checkbox">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">Masuk</button>
    
                    </form>
                    <div class="row mt-3 d-none">
                        <div class="col-lg-12">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
