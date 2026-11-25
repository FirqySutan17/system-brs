
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | Broiler System</title>

    <!-- Bootstrap -->
    <link rel="stylesheet"
          href="<?= base_url('assets/libs/bootstrap/dist/css/bootstrap.min.css'); ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>
        :root {
            --primary: #3976AD;
            --primary-dark: #2F6596;
            --primary-light: #EAF2F9;

            --red: #D62828;
            --red-light: #FFF1F1;

            --text: #334E68;
            --heading: #243B53;
            --muted: #64748B;

            --border: #E2E8F0;
            --white: #FFFFFF;
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
            font-family: 'Manrope', sans-serif;
        }

        body {
            min-height: 100vh;
            min-height: 100dvh;
            color: var(--text);
            background: #F5F8FC;
        }

        /* =====================================
           LOGIN PAGE
        ===================================== */

        .login-page {
            min-height: 100vh;
            min-height: 100dvh;
            display: flex;
        }

        /* =====================================
           LEFT BRAND PANEL
        ===================================== */

        .login-brand {
            position: relative;
            isolation: isolate;

            width: 55%;
            min-height: 100vh;

            overflow: hidden;

            display: flex;
            align-items: center;

            padding: clamp(40px, 7vw, 100px);

            color: #FFFFFF;

            background:
                radial-gradient(
                    circle at 85% 20%,
                    rgba(255, 255, 255, .13),
                    transparent 30%
                ),
                radial-gradient(
                    circle at 15% 85%,
                    rgba(214, 40, 40, .10),
                    transparent 32%
                ),
                linear-gradient(
                    135deg,
                    #3976AD 0%,
                    #4384BA 55%,
                    #5593C6 100%
                );
        }

        .login-brand::before,
        .login-brand::after {
            content: '';
            position: absolute;
            z-index: -1;
            pointer-events: none;
            border-radius: 50%;
        }

        .login-brand::before {
            width: 520px;
            height: 520px;

            right: -180px;
            top: -180px;

            border: 1px solid rgba(255, 255, 255, .20);

            box-shadow:
                0 0 0 65px rgba(255, 255, 255, .035),
                0 0 0 130px rgba(255, 255, 255, .025);
        }

        .login-brand::after {
            width: 420px;
            height: 420px;

            left: -220px;
            bottom: -220px;

            border: 1px solid rgba(255, 255, 255, .18);
            background: rgba(255, 255, 255, .025);
        }

        .login-brand__content {
            position: relative;
            z-index: 2;

            width: 100%;
            max-width: 650px;

            animation: fadeIn .8s ease both;
        }

        /* =====================================
           LOGO PLACEHOLDER
        ===================================== */

        .login-brand__logo {
            display: block;
            margin-bottom: 55px;
        }

        .logo-placeholder {
            width: 190px;
            height: 110px;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 9px;

            border: 1px dashed rgba(255, 255, 255, .65);
            border-radius: 12px;

            background: rgba(255, 255, 255, .10);
            color: #FFFFFF;
        }

        .logo-placeholder i {
            font-size: 30px;
        }

        .logo-placeholder span {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
        }

        /* Mobile Logo */

        .login-mobile-logo {
            display: none;
            text-align: center;
            margin-bottom: 35px;
        }

        .login-mobile-logo .logo-placeholder {
            margin: 0 auto;

            background: var(--primary-light);
            border: 1px dashed #B7CCE0;

            color: var(--primary);
        }

        /* =====================================
           BRAND CONTENT
        ===================================== */

        .login-eyebrow {
            display: flex;
            align-items: center;
            gap: 12px;

            margin-bottom: 20px;

            color: #FFFFFF;

            font-size: 11px;
            font-weight: 800;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .login-eyebrow::before {
            content: '';

            width: 34px;
            height: 2px;

            background: var(--red);
        }

        .login-brand h1 {
            max-width: 650px;

            margin: 0 0 25px;

            color: #FFFFFF;

            font-size: clamp(38px, 4.5vw, 64px);
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -2px;
        }

        .login-brand h1 span {
            color: #EAF2F9;
        }

        .login-brand__description {
            max-width: 500px;

            margin: 0;

            color: rgba(255, 255, 255, .85);

            font-size: 14px;
            line-height: 1.9;
        }

        /* Features */

        .login-features {
            display: flex;
            flex-wrap: wrap;
            gap: 14px 22px;

            margin-top: 35px;
        }

        .login-feature {
            display: flex;
            align-items: center;
            gap: 9px;

            color: rgba(255, 255, 255, .92);

            font-size: 11px;
            font-weight: 600;
        }

        .login-feature i {
            color: #FFFFFF;
            font-size: 12px;
        }

        .login-brand__footer {
            position: absolute;

            left: clamp(40px, 7vw, 100px);
            bottom: 30px;

            color: rgba(255, 255, 255, .65);
            font-size: 10px;
        }

        /* =====================================
           RIGHT LOGIN PANEL
        ===================================== */

        .login-form-panel {
            width: 45%;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 45px;

            background: #FFFFFF;
        }

        .login-box {
            width: 100%;
            max-width: 400px;

            animation: fadeIn .8s ease both;
        }

        /* =====================================
           LOGIN HEADING
        ===================================== */

        .login-heading {
            margin-bottom: 32px;
        }

        .login-heading__eyebrow {
            display: block;

            margin-bottom: 10px;

            color: var(--red);

            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2.5px;
            text-transform: uppercase;
        }

        .login-heading h2 {
            margin: 0 0 10px;

            color: var(--heading);

            font-size: clamp(28px, 3vw, 36px);
            font-weight: 800;
            letter-spacing: -1px;
        }

        .login-heading p {
            margin: 0;

            color: var(--muted);

            font-size: 13px;
            line-height: 1.8;
        }

        /* =====================================
           ERROR MESSAGE
        ===================================== */

        .login-error {
            display: flex;
            align-items: flex-start;
            gap: 12px;

            margin-bottom: 24px;
            padding: 14px 16px;

            border: 1px solid #FECACA;
            border-radius: 10px;

            background: var(--red-light);
            color: #BE123C;

            font-size: 12px;
            line-height: 1.6;
        }

        .login-error i {
            margin-top: 3px;
        }

        /* =====================================
           FORM
        ===================================== */

        .login-form-group {
            margin-bottom: 22px;
        }

        .login-form-label {
            display: block;

            margin-bottom: 9px;

            color: var(--heading);

            font-size: 12px;
            font-weight: 700;
        }

        .login-input-wrapper {
            position: relative;
        }

        .login-input-icon {
            position: absolute;

            top: 50%;
            left: 17px;
            z-index: 2;

            transform: translateY(-50%);

            color: #94A3B8;
            font-size: 14px;
        }

        .login-input {
            width: 100%;
            height: 54px;

            padding: 0 48px;

            border: 1px solid var(--border);
            border-radius: 10px;

            outline: none;

            background: #FFFFFF;
            color: var(--text);

            font-family: inherit;
            font-size: 13px;

            transition: border-color .2s, box-shadow .2s;
        }

        .login-input::placeholder {
            color: #A5B1BE;
        }

        .login-input:hover {
            border-color: #A9C3DC;
        }

        .login-input:focus {
            border-color: var(--primary);

            box-shadow: 0 0 0 4px rgba(57, 118, 173, .12);
        }

        /* =====================================
           PASSWORD TOGGLE
        ===================================== */

        .password-toggle {
            position: absolute;

            top: 50%;
            right: 15px;

            transform: translateY(-50%);

            padding: 5px;

            border: none;
            background: transparent;

            color: #94A3B8;
            cursor: pointer;
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        /* =====================================
           LOGIN BUTTON
        ===================================== */

        .btn-login {
            width: 100%;
            min-height: 54px;

            margin-top: 5px;
            padding: 12px 20px;

            border: 1px solid var(--primary);
            border-radius: 10px;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            background: var(--primary);
            color: #FFFFFF;

            font-family: inherit;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 1px;

            cursor: pointer;

            transition: .25s ease;
        }

        .btn-login:hover {
            background: var(--primary-dark);
            border-color: var(--primary-dark);

            color: #FFFFFF;

            transform: translateY(-2px);

            box-shadow: 0 10px 24px rgba(57, 118, 173, .20);
        }

        .btn-login:focus-visible {
            outline: 3px solid rgba(57, 118, 173, .3);
            outline-offset: 3px;
        }

        .btn-login:disabled {
            opacity: .7;
            cursor: wait;
            transform: none;
        }

        /* =====================================
           SECURITY
        ===================================== */

        .login-security {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;

            margin-top: 22px;

            color: #94A3B8;

            font-size: 10px;
            text-align: center;
        }

        .login-security i {
            color: var(--primary);
        }

        /* Footer mobile */

        .login-footer-mobile {
            display: none;
        }

        /* =====================================
           ANIMATION
        ===================================== */

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =====================================
           TABLET
        ===================================== */

        @media (max-width: 991px) {

            .login-brand {
                width: 50%;
                padding: 40px;
            }

            .login-form-panel {
                width: 50%;
                padding: 30px;
            }

            .login-brand h1 {
                font-size: 40px;
                letter-spacing: -1px;
            }

            .login-brand__logo {
                margin-bottom: 40px;
            }
        }

        /* =====================================
           MOBILE
        ===================================== */

        @media (max-width: 767px) {

            .login-page {
                background: #FFFFFF;
            }

            .login-brand {
                display: none;
            }

            .login-form-panel {
                width: 100%;

                min-height: 100vh;
                min-height: 100dvh;

                padding: 35px 24px;
            }

            .login-box {
                max-width: 420px;
            }

            .login-mobile-logo {
                display: block;
            }

            .login-heading {
                text-align: center;
                margin-bottom: 28px;
            }

            .login-heading h2 {
                font-size: 28px;
            }

            .login-heading p {
                max-width: 300px;
                margin: 0 auto;
            }

            .login-footer-mobile {
                display: block;

                margin-top: 30px;

                color: #94A3B8;
                font-size: 10px;
                text-align: center;
            }
        }

        @media (max-width: 380px) {

            .login-form-panel {
                padding: 28px 20px;
            }

            .login-input,
            .btn-login {
                min-height: 52px;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation: none !important;
                transition: none !important;
            }
        }

    </style>
</head>

<body>

<div class="login-page">

    <!-- =====================================
         LEFT BRAND PANEL
    ====================================== -->

    <section class="login-brand">

        <div class="login-brand__content">

            <!-- Logo Placeholder -->

            <div class="login-brand__logo">

                <div class="logo-placeholder">

                    <i class="fa-regular fa-image"></i>

                    <span>YOUR LOGO HERE</span>

                </div>

            </div>

            <!-- Brand Content -->

            <div class="login-eyebrow">
                Broiler Management Platform
            </div>

            <h1>
                BROILER<br>
                <span>SYSTEM</span>
            </h1>

            <p class="login-brand__description">
                Welcome to Broiler System, an integrated platform
                designed to manage and monitor your broiler farming
                operations efficiently.
            </p>

            <!-- Features -->

            <div class="login-features">

                <div class="login-feature">
                    <i class="fa-solid fa-circle-check"></i>
                    Integrated Management
                </div>

                <div class="login-feature">
                    <i class="fa-solid fa-circle-check"></i>
                    Operational Monitoring
                </div>

                <div class="login-feature">
                    <i class="fa-solid fa-circle-check"></i>
                    Secure Access
                </div>

            </div>

        </div>

        <!-- Footer -->

        <div class="login-brand__footer">

            &copy; <?= date('Y'); ?>
            Broiler System. All Rights Reserved.

        </div>

    </section>


    <!-- =====================================
         RIGHT LOGIN PANEL
    ====================================== -->

    <section class="login-form-panel">

        <div class="login-box">

            <!-- Mobile Logo -->

            <div class="login-mobile-logo">

                <div class="logo-placeholder">

                    <i class="fa-regular fa-image"></i>

                    <span>YOUR LOGO HERE</span>

                </div>

            </div>

            <!-- Heading -->

            <div class="login-heading">

                <span class="login-heading__eyebrow">
                    Account Access
                </span>

                <h2>Welcome back</h2>

                <p>
                    Sign in with your username and password
                    to access the Broiler System.
                </p>

            </div>


            <!-- Error Message -->

            <?php if ($this->session->flashdata('error')): ?>

                <div class="login-error" role="alert">

                    <i class="fa-solid fa-circle-exclamation"></i>

                    <div>
                        <?= html_escape($this->session->flashdata('error')); ?>
                    </div>

                </div>

            <?php endif; ?>


            <!-- Login Form -->

            <form
                action="<?= site_url('auth/process_login'); ?>"
                method="post"
                id="loginForm">

                <!-- Username -->

                <div class="login-form-group">

                    <label for="username" class="login-form-label">
                        Username
                    </label>

                    <div class="login-input-wrapper">

                        <i class="fa-regular fa-user login-input-icon"></i>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            class="login-input"
                            placeholder="Enter your username"
                            autocomplete="username"
                            required
                            autofocus>

                    </div>

                </div>


                <!-- Password -->

                <div class="login-form-group">

                    <label for="password" class="login-form-label">
                        Password
                    </label>

                    <div class="login-input-wrapper">

                        <i class="fa-solid fa-lock login-input-icon"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="login-input"
                            placeholder="Enter your password"
                            autocomplete="current-password"
                            required>

                        <button
                            type="button"
                            class="password-toggle"
                            id="togglePassword"
                            aria-label="Show password"
                            aria-pressed="false">

                            <i class="fa-regular fa-eye"
                               id="passwordIcon"></i>

                        </button>

                    </div>

                </div>


                <!-- Submit -->

                <button
                    type="submit"
                    class="btn-login"
                    id="loginButton">

                    <span id="loginButtonText">SIGN IN</span>

                    <i class="fa-solid fa-arrow-right"
                       id="loginButtonIcon"></i>

                </button>


                <!-- Security -->

                <div class="login-security">

                    <i class="fa-solid fa-shield-halved"></i>

                    Secure access to Broiler System

                </div>

            </form>


            <!-- Mobile Footer -->

            <div class="login-footer-mobile">

                &copy; <?= date('Y'); ?> Broiler System.
                All Rights Reserved.

            </div>

        </div>

    </section>

</div>


<!-- =====================================
     JAVASCRIPT
====================================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    /* Show / Hide Password */

    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const passwordIcon = document.getElementById('passwordIcon');

    if (togglePassword && password && passwordIcon) {

        togglePassword.addEventListener('click', function () {

            const showPassword = password.type === 'password';

            password.type = showPassword ? 'text' : 'password';

            passwordIcon.classList.toggle('fa-eye', !showPassword);
            passwordIcon.classList.toggle('fa-eye-slash', showPassword);

            togglePassword.setAttribute(
                'aria-label',
                showPassword ? 'Hide password' : 'Show password'
            );

            togglePassword.setAttribute(
                'aria-pressed',
                showPassword ? 'true' : 'false'
            );

        });

    }


    /* Hide Error Message When Input Changes */

    const inputs = document.querySelectorAll('.login-input');
    const errorBox = document.querySelector('.login-error');

    if (errorBox) {

        inputs.forEach(function (input) {

            input.addEventListener('input', function () {
                errorBox.style.display = 'none';
            });

        });

    }


    /* Submit Loading State */

    const loginForm = document.getElementById('loginForm');
    const loginButton = document.getElementById('loginButton');

    const loginButtonText = document.getElementById('loginButtonText');
    const loginButtonIcon = document.getElementById('loginButtonIcon');

    if (loginForm && loginButton) {

        loginForm.addEventListener('submit', function () {

            if (!loginForm.checkValidity()) {
                return;
            }

            loginButton.disabled = true;

            loginButtonText.textContent = 'SIGNING IN...';

            loginButtonIcon.classList.remove('fa-arrow-right');

            loginButtonIcon.classList.add('fa-spinner', 'fa-spin');

        });

    }

});

</script>

</body>
</html>
