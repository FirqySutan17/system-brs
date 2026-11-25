
<?php
$current_page = $this->uri->segment(1);

$full_name = $this->session->userdata('full_name') ?: 'Administrator';
$user_nm   = $this->session->userdata('user_nm') ?: 'ADMIN';

$initials = '';
$name_parts = preg_split('/\s+/', trim($full_name));

foreach (array_slice($name_parts, 0, 2) as $part) {
    $initials .= strtoupper(substr($part, 0, 1));
}

$menu_items = [
    [
        'title' => 'Dashboard',
        'icon'  => 'bi-grid-1x2',
        'url'   => 'dashboard',
        'key'   => 'dashboard',
        'desc'  => 'Overview'
    ],
    [
        'title' => 'Code',
        'icon'  => 'bi-code-square',
        'url'   => 'code',
        'key'   => 'code',
        'desc'  => 'General code management'
    ],
    [
        'title' => 'Material Code',
        'icon'  => 'bi-box-seam',
        'url'   => 'material',
        'key'   => 'material',
        'desc'  => 'Material master'
    ],
    [
        'title' => 'Goods Item',
        'icon'  => 'bi-boxes',
        'url'   => 'goods_item',
        'key'   => 'goods_item',
        'desc'  => 'Item management'
    ],
    [
        'title' => 'Customer Code',
        'icon'  => 'bi-people',
        'url'   => 'customer_code',
        'key'   => 'customer_code',
        'desc'  => 'Customer master'
    ]
];
?>

<style>
/* =====================================================
   BROILER SYSTEM - SIDEBAR
===================================================== */

:root {
    --bs-sidebar-width: 270px;
    --bs-sidebar-collapsed: 82px;

    --bs-primary: #3976AD;
    --bs-primary-dark: #2F6596;
    --bs-primary-light: #EAF2F9;
    --bs-primary-soft: #F4F8FC;

    --bs-heading: #243B53;
    --bs-text: #334E68;
    --bs-muted: #8493A5;
    --bs-border: #E8EEF4;
    --bs-background: #F5F8FC;
}

.app-sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: var(--bs-sidebar-width);
    height: 100vh;
    height: 100dvh;
    z-index: 1050;

    display: flex;
    flex-direction: column;

    background: #FFFFFF;
    border-right: 1px solid var(--bs-border);

    transition:
        width .28s ease,
        transform .28s ease,
        box-shadow .28s ease;

    overflow: hidden;
}

/* BRAND */

.sidebar-brand {
    min-height: 91px;
    padding: 20px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid var(--bs-border);
    flex-shrink: 0;
}

.sidebar-brand-content {
    display: flex;
    align-items: center;
    gap: 12px;
    min-width: 0;
}

.sidebar-brand-logo {
    width: 43px;
    height: 43px;
    min-width: 43px;
    display: flex;
    align-items: center;
    justify-content: center;

    color: #FFFFFF;
    font-size: 21px;
    border-radius: 13px;

    background: linear-gradient(145deg, #4D8CC5, #2F6596);
    box-shadow: 0 5px 12px rgba(57, 118, 173, .22);
}

.sidebar-brand-title {
    color: var(--bs-heading);
    font-size: 15px;
    font-weight: 800;
    letter-spacing: -.3px;
    margin: 0;
    white-space: nowrap;
}

.sidebar-brand-subtitle {
    color: var(--bs-muted);
    font-size: 9px;
    font-weight: 600;
    letter-spacing: 1.1px;
    margin-top: 5px;
    white-space: nowrap;
}

.sidebar-collapse-btn,
.sidebar-close {
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;

    border: 0;
    border-radius: 8px;
    background: transparent;
    color: var(--bs-muted);
    font-size: 17px;

    transition: all .2s ease;
}

.sidebar-collapse-btn:hover,
.sidebar-close:hover {
    background: var(--bs-primary-light);
    color: var(--bs-primary);
}

.sidebar-close {
    display: none;
}

/* PROFILE */

.sidebar-profile {
    margin: 20px 15px 25px;
    padding: 13px;

    display: flex;
    align-items: center;
    gap: 11px;

    background: linear-gradient(120deg, #F4F8FC, #F8FAFD);
    border: 1px solid #EDF2F7;
    border-radius: 13px;

    transition: all .2s ease;
}

.sidebar-profile:hover {
    border-color: #D5E5F3;
    background: #F0F6FC;
}

.sidebar-avatar {
    position: relative;
    width: 42px;
    height: 42px;
    min-width: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #FFFFFF;
    font-size: 13px;
    font-weight: 700;

    background: linear-gradient(145deg, #70A4D2, #3976AD);
    border-radius: 12px;
}

.sidebar-avatar-status {
    position: absolute;
    width: 10px;
    height: 10px;
    right: -2px;
    bottom: -2px;

    background: #22C55E;
    border: 2px solid #FFFFFF;
    border-radius: 50%;
}

.sidebar-profile-info {
    min-width: 0;
    flex: 1;
}

.sidebar-profile-name {
    color: var(--bs-heading);
    font-size: 12px;
    font-weight: 700;
    margin: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.sidebar-profile-user {
    color: var(--bs-muted);
    font-size: 11px;
    margin: 4px 0 0;
}

/* NAVIGATION */

.sidebar-menu {
    flex: 1;
    padding: 0 15px 20px;
    overflow-y: auto;
    overflow-x: hidden;
}

.sidebar-menu::-webkit-scrollbar {
    width: 4px;
}

.sidebar-menu::-webkit-scrollbar-thumb {
    background: #DCE5EE;
    border-radius: 10px;
}

.sidebar-section-title {
    padding: 0 11px;
    margin-bottom: 12px;

    color: #98A6B6;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 1.3px;
    white-space: nowrap;
}

.sidebar-link {
    position: relative;
    display: flex;
    align-items: center;
    gap: 12px;

    min-height: 47px;
    padding: 8px 11px;
    margin-bottom: 5px;

    color: var(--bs-text);
    text-decoration: none;

    border-radius: 11px;
    transition: all .2s ease;
}

.sidebar-link-icon {
    width: 34px;
    height: 34px;
    min-width: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 17px;
    color: #71869C;

    background: transparent;
    border-radius: 9px;

    transition: all .2s ease;
}

.sidebar-link-content {
    min-width: 0;
    flex: 1;
}

.sidebar-link-title {
    display: block;
    color: inherit;
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
}

.sidebar-link-desc {
    display: block;
    margin-top: 3px;
    color: var(--bs-muted);
    font-size: 10px;
    white-space: nowrap;
}

.sidebar-link:hover {
    color: var(--bs-primary);
    background: var(--bs-primary-soft);
    transform: translateX(3px);
}

.sidebar-link:hover .sidebar-link-icon {
    color: var(--bs-primary);
    background: #E5F0FA;
}

.sidebar-link.active {
    color: var(--bs-primary);
    background: linear-gradient(100deg, #EAF3FB, #F3F8FD);
}

.sidebar-link.active::before {
    content: "";
    position: absolute;
    left: 0;
    top: 10px;
    bottom: 10px;
    width: 3px;
    border-radius: 0 5px 5px 0;
    background: var(--bs-primary);
}

.sidebar-link.active .sidebar-link-icon {
    color: #FFFFFF;
    background: linear-gradient(145deg, #4D8CC5, #3976AD);
    box-shadow: 0 3px 7px rgba(57, 118, 173, .2);
}

.sidebar-link.active .sidebar-link-title {
    font-weight: 700;
}

/* FOOTER */

.sidebar-footer {
    padding: 14px 15px 18px;
    border-top: 1px solid var(--bs-border);
    flex-shrink: 0;
}

.sidebar-footer-label {
    color: #A0ADBA;
    font-size: 9px;
    text-align: center;
    margin-top: 12px;
}

.sidebar-logout {
    display: flex;
    align-items: center;
    gap: 12px;

    min-height: 44px;
    padding: 8px 11px;

    color: #D65B5B;
    text-decoration: none;
    border-radius: 10px;

    transition: all .2s ease;
}

.sidebar-logout i {
    width: 34px;
    min-width: 34px;
    text-align: center;
    font-size: 17px;
}

.sidebar-logout span {
    font-size: 12px;
    font-weight: 600;
    white-space: nowrap;
}

.sidebar-logout:hover {
    color: #C62828;
    background: #FFF2F2;
}

/* COLLAPSED DESKTOP */

body.sidebar-collapsed .app-sidebar {
    width: var(--bs-sidebar-collapsed);
}

body.sidebar-collapsed .sidebar-brand {
    justify-content: center;
    padding: 20px 10px;
}

body.sidebar-collapsed .sidebar-brand-content {
    justify-content: center;
}

body.sidebar-collapsed .sidebar-brand-text,
body.sidebar-collapsed .sidebar-profile-info,
body.sidebar-collapsed .sidebar-section-title,
body.sidebar-collapsed .sidebar-link-content,
body.sidebar-collapsed .sidebar-logout span,
body.sidebar-collapsed .sidebar-footer-label {
    display: none;
}

.sidebar-collapse-btn i {
    transition: transform .25s ease;
}

body.sidebar-collapsed .sidebar-collapse-btn i {
    transform: rotate(180deg);
}

body.sidebar-collapsed .sidebar-profile {
    justify-content: center;
    padding: 10px 0;
    margin: 18px 10px 25px;
    border-color: transparent;
    background: transparent;
}

body.sidebar-collapsed .sidebar-menu {
    padding: 0 10px 20px;
}

body.sidebar-collapsed .sidebar-link {
    justify-content: center;
    padding: 6px;
}

body.sidebar-collapsed .sidebar-link:hover {
    transform: none;
}

body.sidebar-collapsed .sidebar-link-icon {
    width: 42px;
    height: 42px;
}

body.sidebar-collapsed .sidebar-link.active::before {
    left: -10px;
}

body.sidebar-collapsed .sidebar-logout {
    justify-content: center;
    padding: 8px 0;
}

body.sidebar-collapsed .sidebar-logout i {
    width: 42px;
}

/* MAIN CONTENT ADJUSTMENT */
.body-wrapper {
    position: relative;
    box-sizing: border-box;

    width: auto !important;
    min-height: 100vh;

    margin-left: var(--bs-sidebar-width) !important;

    transition: margin-left .28s ease;
}

/* Sidebar collapsed */
body.sidebar-collapsed .body-wrapper {
    margin-left: var(--bs-sidebar-collapsed) !important;
}

/* TOOLTIP FOR COLLAPSED MENU */

.sidebar-link[data-tooltip] {
    position: relative;
}

body.sidebar-collapsed .sidebar-link:hover::after {
    content: attr(data-tooltip);
    position: absolute;
    left: calc(100% + 12px);
    top: 50%;
    transform: translateY(-50%);

    padding: 8px 12px;
    color: #FFFFFF;
    background: #243B53;

    font-size: 11px;
    font-weight: 600;
    white-space: nowrap;
    border-radius: 7px;

    z-index: 1100;
    box-shadow: 0 5px 15px rgba(0,0,0,.12);
    pointer-events: none;
}

/* MOBILE */

.sidebar-overlay {
    display: none;
}

@media (max-width: 1199px) {

    .app-sidebar {
        width: var(--bs-sidebar-width);
        transform: translateX(-100%);
        box-shadow: none;
    }

    .app-sidebar.show {
        transform: translateX(0);
        box-shadow: 10px 0 35px rgba(15, 23, 42, .12);
    }

    .sidebar-collapse-btn {
        display: none;
    }

    .sidebar-close {
        display: flex;
    }

    .sidebar-overlay {
        position: fixed;
        inset: 0;
        z-index: 1040;
        background: rgba(25, 42, 62, .38);
        backdrop-filter: blur(2px);
    }

    .sidebar-overlay.show {
        display: block;
    }

    .body-wrapper,
    body.sidebar-collapsed .body-wrapper {
        width: 100% !important;
        margin-left: 0 !important;
    }

    body.sidebar-collapsed .app-sidebar {
        width: var(--bs-sidebar-width);
    }

    body.sidebar-collapsed .sidebar-brand {
        justify-content: space-between;
        padding: 20px;
    }

    body.sidebar-collapsed .sidebar-brand-text,
    body.sidebar-collapsed .sidebar-profile-info,
    body.sidebar-collapsed .sidebar-section-title,
    body.sidebar-collapsed .sidebar-link-content,
    body.sidebar-collapsed .sidebar-logout span {
        display: block;
    }

    body.sidebar-collapsed .sidebar-profile {
        justify-content: flex-start;
        padding: 13px;
        margin: 20px 15px 25px;
        background: linear-gradient(120deg, #F4F8FC, #F8FAFD);
        border-color: #EDF2F7;
    }

    body.sidebar-collapsed .sidebar-menu {
        padding: 0 15px 20px;
    }

    body.sidebar-collapsed .sidebar-link {
        justify-content: flex-start;
        padding: 8px 11px;
    }

    body.sidebar-collapsed .sidebar-link-icon {
        width: 34px;
        height: 34px;
    }

    body.sidebar-collapsed .sidebar-logout {
        justify-content: flex-start;
        padding: 8px 11px;
    }

    body.sidebar-collapsed .sidebar-logout i {
        width: 34px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .app-sidebar,
    .sidebar-link,
    .sidebar-link-icon,
    .sidebar-profile {
        transition: none !important;
    }
}
</style>


<aside class="app-sidebar" id="appSidebar">

    <!-- BRAND -->
    <div class="sidebar-brand">

        <div class="sidebar-brand-content">
            <div class="sidebar-brand-logo">
                <i class="bi bi-grid-1x2-fill"></i>
            </div>

            <div class="sidebar-brand-text">
                <h5 class="sidebar-brand-title">BROILER SYSTEM</h5>
                <div class="sidebar-brand-subtitle">
                    MANAGEMENT PLATFORM
                </div>
            </div>
        </div>

        <button type="button"
                class="sidebar-collapse-btn"
                id="sidebarCollapseToggle"
                title="Collapse sidebar">
            <i class="bi bi-layout-sidebar-inset"></i>
        </button>

        <button type="button"
                class="sidebar-close"
                id="sidebarClose"
                title="Close sidebar">
            <i class="bi bi-x-lg"></i>
        </button>

    </div>


    <!-- USER PROFILE -->
    <div class="sidebar-profile">

        <div class="sidebar-avatar">
            <?= html_escape($initials); ?>
            <span class="sidebar-avatar-status"></span>
        </div>

        <div class="sidebar-profile-info">
            <p class="sidebar-profile-name">
                <?= html_escape($full_name); ?>
            </p>

            <p class="sidebar-profile-user">
                <?= html_escape($user_nm); ?>
            </p>
        </div>

    </div>


    <!-- NAVIGATION -->
    <div class="sidebar-menu">

        <div class="sidebar-section-title">
            WORKSPACE
        </div>

        <?php foreach ($menu_items as $item): ?>

            <?php
                $is_active = ($current_page === $item['key']);
            ?>

            <a href="<?= base_url($item['url']); ?>"
               class="sidebar-link <?= $is_active ? 'active' : ''; ?>"
               data-tooltip="<?= html_escape($item['title']); ?>"
               title="<?= html_escape($item['title']); ?>">

                <div class="sidebar-link-icon">
                    <i class="bi <?= $item['icon']; ?>"></i>
                </div>

                <div class="sidebar-link-content">
                    <span class="sidebar-link-title">
                        <?= html_escape($item['title']); ?>
                    </span>

                    <span class="sidebar-link-desc">
                        <?= html_escape($item['desc']); ?>
                    </span>
                </div>

                <?php if ($is_active): ?>
                    <i class="bi bi-chevron-right"
                       style="font-size: 11px; opacity: .65;"></i>
                <?php endif; ?>

            </a>

        <?php endforeach; ?>

    </div>


    <!-- FOOTER -->
    <div class="sidebar-footer">

        <a href="<?= base_url('auth/logout'); ?>"
           class="sidebar-logout"
           onclick="return confirm('Are you sure you want to logout?');">

            <i class="bi bi-box-arrow-left"></i>
            <span>Sign Out</span>

        </a>

        <div class="sidebar-footer-label">
            Broiler System &copy; <?= date('Y'); ?>
        </div>

    </div>

</aside>

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="body-wrapper">


<script>
document.addEventListener('DOMContentLoaded', function () {

    const sidebar = document.getElementById('appSidebar');
    const overlay = document.getElementById('sidebarOverlay');

    const openButton = document.getElementById('sidebarToggle');
    const closeButton = document.getElementById('sidebarClose');
    const collapseButton = document.getElementById('sidebarCollapseToggle');

    if (!sidebar || !overlay) return;

    const mobileQuery = window.matchMedia('(max-width: 1199px)');

    // MOBILE SIDEBAR
    function openSidebar() {
        sidebar.classList.add('show');
        overlay.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    function closeSidebar() {
        sidebar.classList.remove('show');
        overlay.classList.remove('show');
        document.body.style.overflow = '';
    }

    // DESKTOP COLLAPSE
    function toggleCollapse() {
        if (mobileQuery.matches) return;

        const isCollapsed = document.body.classList.toggle('sidebar-collapsed');

        try {
            localStorage.setItem(
                'broiler_sidebar_collapsed',
                isCollapsed ? '1' : '0'
            );
        } catch (e) {}

    }

    // RESTORE SIDEBAR STATE
    if (!mobileQuery.matches) {
        try {
            if (localStorage.getItem('broiler_sidebar_collapsed') === '1') {
                document.body.classList.add('sidebar-collapsed');
            }
        } catch (e) {}
    }

    // EVENT LISTENERS
    if (openButton) {
        openButton.addEventListener('click', openSidebar);
    }

    if (closeButton) {
        closeButton.addEventListener('click', closeSidebar);
    }

    if (collapseButton) {
        collapseButton.addEventListener('click', toggleCollapse);
    }

    overlay.addEventListener('click', closeSidebar);

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeSidebar();
        }
    });

    // RESET MOBILE STATE WHEN RESIZING TO DESKTOP
    mobileQuery.addEventListener('change', function (event) {
        closeSidebar();

        if (event.matches) {
            document.body.classList.remove('sidebar-collapsed');
        } else {
            try {
                if (localStorage.getItem('broiler_sidebar_collapsed') === '1') {
                    document.body.classList.add('sidebar-collapsed');
                }
            } catch (e) {}
        }
    });

});
</script>
