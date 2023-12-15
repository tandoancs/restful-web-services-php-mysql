<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title>PHP API Tutorials | Signup</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
            <form name="signup" action="api/users/signup.php" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" name="fullname" placeholder="Enter your name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="phone_number" placeholder="Enter your number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <div class="pwd">
                            <input type="password" id="password" name="password" placeholder="Enter your password" required style="padding-right: 25px;">
                            <i id="pass-toggle-btn" class="fa-solid fa-eye"></i>
                        </div>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <div class="pwd">
                            <input type="password" id="password-conf" name="password_conf" placeholder="Confirm your password" required style="padding-right: 25px;">
                            <i id="pass-toggle-btn-conf" class="fa-solid fa-eye"></i>
                        </div>
                    </div>

                    <!-- <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" id="password-conf" name="password_conf" placeholder="Confirm your password" required>
                        <i id="pass-toggle-btn-conf" class="fa-solid fa-eye"></i>

                    </div> -->
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" value="1" id="dot-1">
                    <input type="radio" name="gender" value="2" id="dot-2">
                    <input type="radio" name="gender" value="3" id="dot-3">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Prefer not to say</span>
                        </label>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" id="submit" value="Register">
                </div>
                <div>The submit button will display when all required data is filled in</div>
            </form>
        </div>
    </div>

    <!-- js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // $(':input[type="submit"]').prop('disabled', true);
            $("#submit").prop('disabled', true);
        });

        const passwordInput = document.getElementById("password");
        const passwordInputConf = document.getElementById("password-conf");

        const passToggleBtn = document.getElementById("pass-toggle-btn");
        const passToggleBtnConf = document.getElementById("pass-toggle-btn-conf");

        // Toggling password visibility
        passToggleBtn.addEventListener('click', () => {
            passToggleBtn.className = passwordInput.type === "password" ? "fa-solid fa-eye-slash" : "fa-solid fa-eye";
            passwordInput.type = passwordInput.type === "password" ? "text" : "password";
        });

        // Toggling password visibility
        passToggleBtnConf.addEventListener('click', () => {
            passToggleBtnConf.className = passwordInputConf.type === "password" ? "fa-solid fa-eye-slash" : "fa-solid fa-eye";
            passwordInputConf.type = passwordInputConf.type === "password" ? "text" : "password";
        });

        
        

        $("#password").on("change", function() {
            console.log("Hehehee");

            $("#password-conf").on("change", function() {
                console.log("Hahhaahha");

                if ($("#password").val() !== $("#password-conf").val()) {
                    alert("Password Confirm does not match password");
                    $("#submit").prop('disabled', true);
                    return false;
                } else {
                    $("#submit").prop('disabled', false);
                }
            });
        });
    </script>

</body>

</html>