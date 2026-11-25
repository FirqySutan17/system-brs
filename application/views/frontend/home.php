
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Broiler System | Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --primary: #3976AD;
            --primary-hover: #2F6596;

            --red: #D62828;
            --red-light: #FFF1F1;

            --text: #334E68;
            --muted: #64748B;

            --border: #E2E8F0;
            --background: #F5F8FC;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--text);
            background: #FFFFFF;
        }

        /* =====================================
           HOME PAGE
        ===================================== */

        .home-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            position: relative;
            overflow: hidden;
            isolation: isolate;

            background:
                radial-gradient(
                    ellipse at 50% 45%,
                    rgba(16, 42, 67, 0.035) 0%,
                    transparent 65%
                ),
                #FFFFFF;
        }

        /* Decorative elements */

        .home-page::before,
        .home-page::after {
            content: "";
            position: absolute;
            z-index: -1;
            pointer-events: none;
            border-radius: 50%;
        }

        .home-page::before {
            width: 520px;
            height: 520px;
            top: -390px;
            right: -150px;

            border: 1px solid rgba(16, 42, 67, 0.10);

            box-shadow:
                0 0 0 45px rgba(16, 42, 67, 0.025),
                0 0 0 90px rgba(16, 42, 67, 0.018);
        }

        .home-page::after {
            width: 450px;
            height: 450px;
            bottom: -360px;
            left: -150px;

            border: 1px solid rgba(214, 40, 40, 0.12);

            box-shadow:
                0 0 0 40px rgba(214, 40, 40, 0.025),
                0 0 0 80px rgba(214, 40, 40, 0.018);
        }

        /* =====================================
           CONTENT CARD
        ===================================== */

        .home-content {
            width: 100%;
            max-width: 680px;

            text-align: center;
            padding: 55px 55px 40px;

            background: #FFFFFF;

            border: 1px solid var(--border);
            border-radius: 20px;

            box-shadow:
                0 20px 60px rgba(16, 42, 67, 0.07),
                0 2px 8px rgba(16, 42, 67, 0.025);

            animation: fadeIn 0.7s ease both;
        }

        /* =====================================
           LOGO
        ===================================== */

        .logo-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 35px;
        }

        .logo-placeholder {
            width: 190px;
            height: 110px;

            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 8px;

            background: #F8FAFC;
            border: 1px dashed #CBD5E1;
            border-radius: 12px;

            color: #94A3B8;
        }

        .logo-placeholder svg {
            width: 34px;
            height: 34px;
        }

        .logo-placeholder span {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
        }

        /* =====================================
           TEXT CONTENT
        ===================================== */

        .company-label {
            color: var(--red);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 13px;
        }

        .company-name {
            color: var(--primary);
            font-size: clamp(25px, 4vw, 34px);
            font-weight: 800;
            line-height: 1.3;
            letter-spacing: 0.5px;
            margin-bottom: 18px;
        }

        .red-divider {
            width: 58px;
            height: 3px;
            margin: 0 auto 27px;
            border-radius: 10px;
            background: var(--red);
        }

        .company-description {
            max-width: 430px;
            margin: 0 auto 35px;

            color: var(--muted);
            font-size: 14px;
            line-height: 1.8;
        }

        /* =====================================
           LOGIN BUTTON
        ===================================== */

        .btn-login {
            width: 100%;
            max-width: 340px;
            min-height: 56px;

            margin: 0 auto;
            padding: 15px 24px;

            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;

            color: #FFFFFF;
            background: var(--primary);

            border: 1px solid var(--primary);
            border-radius: 9px;

            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1px;
            text-decoration: none;

            box-shadow: 0 7px 18px rgba(16, 42, 67, 0.13);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease,
                background 0.25s ease;
        }

        .btn-login:hover {
            color: #FFFFFF;
            background: var(--primary-hover);
            border-color: var(--primary-hover);

            transform: translateY(-3px);

            box-shadow: 0 11px 25px rgba(16, 42, 67, 0.20);
        }

        .btn-login:focus-visible {
            outline: 3px solid var(--red);
            outline-offset: 4px;
        }

        .login-icon {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        /* =====================================
           FOOTER
        ===================================== */

        .home-footer {
            margin-top: 40px;
            padding-top: 22px;

            border-top: 1px solid #EDF1F5;

            color: #94A3B8;
            font-size: 11px;
            letter-spacing: 0.4px;
        }

        .home-footer span {
            color: var(--primary);
            font-weight: 700;
        }

        /* =====================================
           ANIMATION
        ===================================== */

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(14px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =====================================
           RESPONSIVE
        ===================================== */

        @media (max-width: 576px) {

            .home-page {
                padding: 20px 16px;
            }

            .home-content {
                padding: 42px 24px 28px;
                border-radius: 16px;
            }

            .logo-placeholder {
                width: 160px;
                height: 95px;
            }

            .logo-wrapper {
                margin-bottom: 30px;
            }

            .company-label {
                font-size: 9px;
                letter-spacing: 3px;
            }

            .company-name {
                font-size: 25px;
            }

            .company-description {
                font-size: 13px;
            }

            .home-footer {
                margin-top: 30px;
                line-height: 1.8;
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

<main class="home-page">

    <section class="home-content">

        <!-- LOGO PLACEHOLDER -->
        <div class="logo-wrapper">

            <div class="logo-placeholder">

                <svg viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="1.5"
                     stroke-linecap="round"
                     stroke-linejoin="round">

                    <rect x="3" y="3" width="18" height="18" rx="3"/>
                    <circle cx="12" cy="10" r="3"/>
                    <path d="M7 18c1-2.5 3-3.5 5-3.5s4 1 5 3.5"/>

                </svg>

                <span>YOUR LOGO HERE</span>

            </div>

        </div>

        <!-- COMPANY INFORMATION -->

        <div class="company-label">
            Welcome to
        </div>

        <h1 class="company-name">
            BROILER SYSTEM
        </h1>

        <div class="red-divider"></div>

        <p class="company-description">
            Welcome to the Broiler Management System.

            Manage and monitor your broiler farming
            operations through one integrated platform.
        </p>

        <!-- LOGIN BUTTON -->

        <a href="<?= site_url('login'); ?>" class="btn-login">

            <svg class="login-icon"
                 viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2"
                 stroke-linecap="round"
                 stroke-linejoin="round"
                 aria-hidden="true">

                <path d="M10 17l5-5-5-5"/>
                <path d="M15 12H3"/>
                <path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7"/>

            </svg>

            <span>LOGIN TO SYSTEM</span>

        </a>

        <!-- FOOTER -->

        <footer class="home-footer">

            &copy; <?= date('Y'); ?>

            <span>BROILER SYSTEM</span>.

            All rights reserved.

        </footer>

    </section>

</main>

</body>
</html>
