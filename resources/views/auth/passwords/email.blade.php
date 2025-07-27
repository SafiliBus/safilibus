<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('forgot.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <header>
        <div class="back-header">
            <i class="fa-solid fa-arrow-left"></i>
            <span class="back-to-beranda"></span>
        </div>
    </header>
    <div class="form-box">
        <h2>Forgot Password</h2>
        <form method="POST" action="{{ route('password.update') }}">
             @csrf
             <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <div class="field email-field">
                <i class="fa-regular fa-envelope"></i>
                <input class="email" type="email" name="email" placeholder="Enter Your Email" requ4ired>
                <button type="button" class="submit-btn" onclick="sendVerificationCode()">Kirim Kode</button>
            </div>
            <div class="field">
                <i class="uil uil-user"></i>
                <input type="text" name="verification_code" placeholder="Enter verification_code" required>
            </div>
            <div class="field">
                <i class="uil uil-lock-alt"></i>
                <input class="password-re-input" type="password" placeholder="Password" required>
                <div class="eye-btn-reinput"><i class="uil uil-eye-slash"></i></div>
            </div>
            <div class="field">
                <i class="uil uil-lock-alt"></i>
                <input class="confirm-password" type="password" placeholder="Konfirmasi Password" required>
                <div class="eye-btn-confirm-password"><i class="uil uil-eye-slash"></i></div>
            </div>
            <input class="submit-btn" type="submit" value="Masuk">
        </form>
    </div>
    <script>
        //javascript back to login
        const backHeader = document.querySelector(".back-header");

        backHeader.addEventListener("click", () =>{
                window.location.href = "{{ route('auth') }}";
            });
        // kirim kode ke email 
        function sendVerificationCode() {
    const email = document.querySelector(".email").value;

    fetch('/kirim-kode-verifikasi', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ email: email })
    })
    .then(response => response.json())
    .then(data => {
        alert("Kode berhasil dikirim ke email!");
    })
    .catch(error => {
        console.error('Error:', error);
        alert("Gagal mengirim kode!");
    });
}

        //password show/hide button sign-up recreate password
        const passwordReInput = document.querySelector(".password-re-input");
        const eyeBtnReInput = document.querySelector(".eye-btn-reinput");

        eyeBtnReInput.addEventListener("click", () => {
            if(passwordReInput.type === "password"){
                passwordReInput.type = "text";
                eyeBtnReInput.innerHTML = "<i class='uil uil-eye'></i>";
            }
            else{
                passwordReInput.type = "password";
                eyeBtnReInput.innerHTML = "<i class='uil uil-eye-slash'></i>";
            }
        });

        //password show/hide button sign-up confirm password
        const passwordConfirmPw = document.querySelector(".confirm-password");
        const eyeBtnConfirmpw = document.querySelector(".eye-btn-confirm-password");

        eyeBtnConfirmpw.addEventListener("click", () => {
            if(passwordConfirmPw.type === "password"){
                passwordConfirmPw.type = "text";
                eyeBtnConfirmpw.innerHTML = "<i class='uil uil-eye'></i>";
            }
            else{
                passwordConfirmPw.type = "password";
                eyeBtnConfirmpw.innerHTML = "<i class='uil uil-eye-slash'></i>";
            }
        });
    </script>
</body>
</html>