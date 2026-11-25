<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= isset($title) ? $title : 'Dashboard'; ?></title>
  
  <link rel="icon" type="image/png" href="<?= base_url('assets/frontend/img/favicon-192.png'); ?>" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="<?= base_url('assets/frontend/img/logo.png'); ?>" />
    <link rel="shortcut icon" href="<?= base_url('assets/frontend/img/logo.png'); ?>" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/frontend/img/logo.png'); ?>" />
    <link rel="manifest" href="<?= base_url('assets/img/site.webmanifest'); ?>" />
  
  <link rel="stylesheet" href="<?= base_url('assets/css/styles.min.css'); ?>" />
  <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js'); ?>"></script>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

  <style>
    .sidebar-mobile-toggle {
        display: none;
    }

    @media (max-width: 1199px) {
        .sidebar-mobile-toggle {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1030;

            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border: 1px solid #E2E8F0;
            border-radius: 10px;
            background: #FFFFFF;
            color: #3976AD;

            font-size: 22px;
            box-shadow: 0 3px 12px rgba(36, 59, 83, .08);
        }
    }
  </style>

</head>

<body>
  <div class="page-wrapper" id="main-wrapper"
       data-layout="vertical"
       data-navbarbg="skin6"
       data-sidebartype="full"
       data-sidebar-position="fixed"
       data-header-position="fixed">

    <!-- Mobile Sidebar Toggle -->
    <button type="button"
            id="sidebarToggle"
            class="sidebar-mobile-toggle d-xl-none"
            aria-label="Open navigation">
        <i class="bi bi-list"></i>
    </button>
