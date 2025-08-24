@extends('auth/layouts.app')

@section('content')
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card" style="font-family:'Barlow Condensed';">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid" style="max-width:30%;" />
              </div>
              <!-- /Logo -->
               <p class="text-center mb-n1">selamat datang di</p>
               <h4 class="mb-2 text-center mb-n1" style="text-transform:uppercase;font-weight:700;">{{ config('app.name') }}</h4>

              <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label mb-n1">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email anda" autofocus />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label mb-n1" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Lupa Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password" placeholder="**********" aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-5">
                  <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                </div>
              </form>
              <p class="text-center">
                <span>{{ Str::of(config('app.footer'))->toHtmlString() }}</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
