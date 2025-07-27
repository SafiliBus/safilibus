<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Login</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <header>
        <div class="back-header">
            <i class="fa-solid fa-arrow-left"></i>
        </div>
    </header>
    <div class="sign-in sign-in-form">
        <div class="form-sign-in sign-in-box">
            <h2>Login</h2>

            @if ($errors->any())
    <div class="error-messages" style="color: red; margin-bottom: 10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="field">
                    <i class="uil uil-at"></i>
                    <input type="email" name="email" placeholder="Email
                     " required>
                </div>
                <div class="field">
                    <i class="uil uil-lock-alt"></i>
                    <input class="password-input" type="password" name="password" placeholder="Password" required>
                    <div class="eye-btn"><i class="uil uil-eye-slash"></i></div>
                </div>
                <div class="forgot-link">
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                </div>
                <input class="submit-btn-sign-in" type="submit" value="Login">
            </form>
            <div class="login-sign-in">
                <p class="text">Or, login with...</p>
                <div class="other-sign-in">
                    <a href=""><img src="assets\img\google.png" alt=""></a>
                </div>
            </div>
        </div>
        <div class="right-box sign-in-rightBox">
            <div class="sliding-link">
                <p>Don't have an account?</p>
                <span class="sign-up-btn">Sign Up</span>
            </div>
            <div class="logo-container">
        <div class="safili-logo">
        </div>
    </div>
</div>

    <div class="sign-up sign-up-form">
        <div class="left-box sign-up-leftBox">
            <div class="sliding-link">
                <p>Already have an account?</p>
                <span class="sign-in-btn">Sign In</span>
            </div>
            <div class="logo-container">
        <div class="safili-logo">
            
        </div>
    </div>
</div>
        <div class="form-sign-up sign-up-box">
            <h2>Sign Up</h2>

            {{-- Tampilkan error register --}}
           @if ($errors->any() && old('name'))
                <div class="error-messages" style="color: red; margin-bottom: 10px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="login-sign-up">
                <div class="other-sign-up">
                    <a href=""><img src="assets\img\google.png" alt=""></a>
                </div>
                <p class="text">Or, sign up with email...</p>
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="field">
                    <i class="uil uil-at"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="field">
                    <i class="uil uil-user"></i>
                    <input type="text" name="name" placeholder="username" required>
                </div>
                <div class="field">
                    <i class="uil uil-lock-alt"></i>
                    <input class="password-re-input" type="password"  name="password" placeholder="Password" required>
                    <div class="eye-btn-reinput"><i class="uil uil-eye-slash"></i></div>
                </div>
                <div class="field">
                    <i class="uil uil-lock-access"></i>
                    <input class="confirm-password" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    <div class="eye-btn-confirm-password"><i class="uil uil-eye-slash"></i></div>
                </div>

                
                <input class="submit-btn-sign-up" type="submit" value="Sign up">
            </form>
        </div>
    </div>
    
    <script>
        //javascript back to beranda//
        const backHeader = document.querySelector(".back-header");

        backHeader.addEventListener("click", () =>{
            if(backHeader){
                window.location.href = "welcome";
            }
        });


        //input fields focus effects
        const textInputs = document.querySelectorAll("input");

        textInputs.forEach(textInput => {
            textInput.addEventListener("focus", () => {
                let parent = textInput.parentNode;
                parent.classList.add("active");
            });

            textInput.addEventListener("blur", () => {
                let parent = textInput.parentNode;
                parent.classList.remove("active");
            });
        });

        //password show/hide button
        const passwordInput = document.querySelector(".password-input");
        const eyeBtn = document.querySelector(".eye-btn");

        eyeBtn.addEventListener("click", () => {
            if(passwordInput.type === "password"){
                passwordInput.type = "text";
                eyeBtn.innerHTML = "<i class='uil uil-eye'></i>";
            }
            else{
                passwordInput.type = "password";
                eyeBtn.innerHTML = "<i class='uil uil-eye-slash'></i>";
            }
        });

        //sliding between sign-in form and sign-up form
        const signUpBtn = document.querySelector(".sign-up-btn");
        const signInBtn = document.querySelector(".sign-in-btn");
        const signUpForm = document.querySelector(".sign-up-form");
        const signInForm = document.querySelector(".sign-in-form");

        signUpBtn.addEventListener("click", () => {
            signInForm.classList.add("hide");
            signUpForm.classList.add("show");
            signInForm.classList.remove("show");
        });

        signInBtn.addEventListener("click", () => {
            signInForm.classList.remove("hide");
            signUpForm.classList.remove("show");
            signInForm.classList.add("show");
        });

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
            function toggleForm() {
            document.getElementById("authWrapper").classList.toggle("show-sign-up");
            }
        });

    </script>
</body>

</html>