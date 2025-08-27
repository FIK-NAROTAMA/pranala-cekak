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
              <p class="text-center mb-n1">terima kasih telah menggunakan</p>
              <h4 class="mb-2 text-center mb-3" style="text-transform:uppercase;font-weight:700;">{{ config('app.name') }}&reg;</h4>
              <div class="mb-2" style="font-size:0.8rem; line-height: 1.2;text-align: justify;text-justify: inter-word;">
                <p>Mohon maaf, <b>tautan</b> yang digunakan ini <b>tidak ditemukan</b>, sudah <b>pernah digunakan</b>, atau telah <b>kadaluwarsa</b>. Silakan menggunakan fasilitas <a href="{{ route('resetform') }}"><b>Lupa Password</b></a> kembali dan memasukkan email address yang digunakan pada sistem Pranala Cekak ini.</p>
                <p>Jangan lupa untuk segera periksa kotak masuk email Anda -termasuk folder spam atau junk mail, karena umur token hanya 60 menit.</p>
              </div>
              <a href="{{ route('resetform') }}" type="button" class="mb-4 btn btn-primary d-grid w-100">Kembali ke Lupa Password</a>
              <p class="text-center mb-n3" style="font-size: 0.7rem;font-weight:500;"><span>{{ Str::of(config('app.footer'))->toHtmlString() }}</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
