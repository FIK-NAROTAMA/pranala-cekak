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
               <p class="text-center mb-n1 mt-n3">masukkan password yang baru di</p>
               <h4 class="mb-2 text-center mb-n1" style="text-transform:uppercase;font-weight:700;">{{ config('app.name') }}&reg;</h4>

              <form id="formAuthentication" class="mb-3" action="{{ route('newpassword') }}" method="POST">
                @csrf
                <div class="mb-2 mt-4 form-password-toggle">
                  <label class="form-label mb-n1" for="password" style="font-size:0.7rem;">Password minimal 8 karakter, ada huruf besar, kecil, dan angka.</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password_first" class="form-control" name="password" placeholder="P@s5w0rD;" oninput="validatePassword()" onblur="validatePassword()" aria-describedby="password" required />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label mb-n1" for="password">Password check</label>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password_confirmation" class="form-control" name="password" placeholder="P@s5w0rD;" oninput="validatePassword()" aria-describedby="password" required />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-5">
                  <button id="submit_button" class="btn btn-primary d-grid w-100" type="submit" disabled>New Password</button>
                  <div class="d-flex justify-content-center">
                      <small id="errorMessage" class="fw-italic">{{  Str::of($pesanKesalahan)->toHtmlString() }}</small>
                  </div>
                </div>
              </form>
              <p class="text-center mb-n3" style="font-size: 0.7rem;font-weight:500;"><span>{{ Str::of(config('app.footer'))->toHtmlString() }}</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>

<script>
function isStrongPassword(password) {
    // Minimal 8 karakter, ada huruf besar, kecil, dan angka
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    return regex.test(password);
}

function validatePassword() {
    const password = document.getElementById('password_first').value;
    const confirm = document.getElementById('password_confirmation').value;
    const submitButton = document.getElementById('submit_button');
    const help = document.getElementById('errorMessage');

    if (!isStrongPassword(password)) {
        help.textContent = "Password minimal 8 karakter, ada huruf besar, kecil, dan angka";
        help.style.color = "red";
        document.getElementById('password_first').focus();
        submitButton.disabled = true;
        return;
    }
    if (password === confirm) {
        help.textContent = "Password memenuhi syarat dan identik.";
        help.style.color = "green";
        submitButton.disabled = false;
    } else {
        help.textContent = "Password memenuhi syarat namun tidak identik.";
        help.style.color = "red";
        submitButton.disabled = true;
    }
}
</script>
@endsection
