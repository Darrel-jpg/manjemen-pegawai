<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Register</title>
    <link rel="stylesheet" href="<?= ASSET; ?>/css/login_register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body>
    <div class="container" id="container">
        <!-- Form Login -->
        <div class="form-box login">
            <form method="POST" action="<?= BASEURL; ?>/auth/login">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" autocomplete="off" required>
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" id="login-password" required>
                    <i class="fa-solid fa-eye-slash toggle-password" data-target="login-password"></i>
                </div>
                <div class="remember-box" style="display: flex; align-items: center; justify-content: space-between; margin-top: -10px; margin-bottom: 15px;">
                    <label style="font-size: 14px; color: #333;">
                        <input type="checkbox" name="remember" style="margin-right: 6px;">
                        Remember Me
                    </label>
                </div>
                <button type="submit" name="login" class="btn">Login</button>
            </form>
        </div>

        <!-- Form Register -->
        <div class="form-box register">
            <form method="POST" action="<?= BASEURL; ?>/auth/register">
                <h1>Registration</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" autocomplete="off" required>
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" id="register-password" required>
                    <i class="fa-solid fa-eye-slash toggle-password" data-target="register-password"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm-password" required>
                    <i class="fa-solid fa-eye-slash toggle-password" data-target="confirm-password"></i>
                </div>
                <button type="submit" name="register" class="btn">Register</button>
            </form>
        </div>

        <!-- Panel toggle -->
        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Hello, Welcome</h1>
                <p>Don't have an account?</p>
                <button class="btn register-btn" type="button" id="showRegister">Sign Up</button>
            </div>
            <div class="toggle-panel toggle-right">
                <h1>Welcome Back</h1>
                <p>Already have an account?</p>
                <button class="btn login-btn" type="button" id="showLogin">Sign In</button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php Alert::alert(); ?>
    <script src="<?= ASSET; ?>/js/login_register.js"></script>
</body>
</html>