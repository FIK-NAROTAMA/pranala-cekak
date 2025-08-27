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
               <p class="text-center mb-n1 mt-n3">reset password</p>
               <h4 class="mb-2 text-center mb-n1" style="text-transform:uppercase;font-weight:700;">{{ config('app.name') }}&reg;</h4>

              <form id="formAuthentication" class="mb-3" action="{{ route('reset') }}" method="POST">
                @csrf
                <div class="mb-3 mt-4" style="font-size:0.8rem; line-height: 1.2;text-align: justify;text-justify: inter-word;">
                  Yakinkan anda memasukkan <strong>alamat email</strong> dengan <strong>benar</strong> dan anda <strong>memiliki hak</strong> untuk mengakses alamat email tersebut. Sistem akan mengirimkan <em>link</em> untuk mereset password Anda.
                </div>
                <div class="mb-3 mt-3">
                  <input type="text" class="form-control" id="email" name="email" placeholder="email.anda@nama.domain" autofocus required />
                </div>
                <div class="mb-5">
                  <button class="btn btn-primary d-grid w-100" type="submit">Kirim Link</button>
                  <div class="d-flex justify-content-end">
                      <small>bawa saya ke <em>form</em> <a href="/login">Login</a></small>
                  </div>
                </div>
              </form>
              <p class="text-center mb-n3" style="font-size: 0.7rem;font-weight:500;"><span>{{ Str::of(config('app.footer'))->toHtmlString() }}</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
