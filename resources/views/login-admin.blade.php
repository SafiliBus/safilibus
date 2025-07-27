<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Admin.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <section>
        <header>
            <div class="back-header">
                <i class="fa-solid fa-arrow-left"></i>
            </div>
        </header>
        <div class="form-box">
            <h2>Login Admin</h2>
            <form action="">
                <div class="field">
                    <i class="fa-regular fa-envelope"></i>
                    <input class="email" type="email" name="email" placeholder="Enter Your Email" requ4ired>
                </div>
                <div class="field-key">
                    <i class="uil uil-lock-alt"></i>
                    <input class="password-input" type="password" placeholder="Password" required>
                    <div class="eye-btn"><i class="uil uil-eye-slash"></i></div>
                </div>
                <input class="submit-btn" type="submit" value="Masuk">
            </form>
        </div>
    </section>

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


        //password ahow/hide button sign-in
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

        //add login button after click go to Beranda/Dashboard
        const loginForm = document.querySelector(".form-box form");

        loginForm.addEventListener("submit", function(event) {
            event.preventDefault();
    
            const email = this.querySelector('input[type="email"]').value;
            const password = this.querySelector('.password-input').value;

            if (email && password) {
                window.location.href = "welcome";
            } else {
                alert("Mohon isi email dan password!");
            }
        });
    </script>
</body>
</html>