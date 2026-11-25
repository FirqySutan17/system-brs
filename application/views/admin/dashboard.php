
<?php
$full_name = $this->session->userdata('full_name') ?: 'Administrator';
$first_name = explode(' ', trim($full_name))[0];

$kpis = [
    [
        'label' => 'Active Farms',
        'value' => '24',
        'change' => '+2 this month',
        'icon' => 'bi-house-door',
        'color' => 'blue'
    ],
    [
        'label' => 'Active Flocks',
        'value' => '86',
        'change' => 'Across all farms',
        'icon' => 'bi-collection',
        'color' => 'purple'
    ],
    [
        'label' => 'Total Population',
        'value' => '1.28M',
        'change' => '+8.4% vs last month',
        'icon' => 'bi-feather',
        'color' => 'green'
    ],
    [
        'label' => 'Mortality Rate',
        'value' => '2.14%',
        'change' => '0.18% lower than target',
        'icon' => 'bi-activity',
        'color' => 'orange'
    ]
];

$flock_status = [
    [
        'label' => 'Active',
        'value' => 86,
        'percentage' => 72,
        'color' => '#3976AD'
    ],
    [
        'label' => 'Preparing',
        'value' => 18,
        'percentage' => 15,
        'color' => '#E5A23B'
    ],
    [
        'label' => 'Harvest',
        'value' => 10,
        'percentage' => 8,
        'color' => '#269B70'
    ],
    [
        'label' => 'Completed',
        'value' => 6,
        'percentage' => 5,
        'color' => '#94A3B8'
    ]
];

$flocks = [
    [
        'farm' => 'Farm Cibinong',
        'flock' => 'FLK-2026-001',
        'age' => 28,
        'population' => 24500,
        'mortality' => '1.82%',
        'status' => 'Active'
    ],
    [
        'farm' => 'Farm Sukabumi',
        'flock' => 'FLK-2026-002',
        'age' => 24,
        'population' => 22000,
        'mortality' => '2.10%',
        'status' => 'Active'
    ],
    [
        'farm' => 'Farm Bandung',
        'flock' => 'FLK-2026-003',
        'age' => 32,
        'population' => 18500,
        'mortality' => '2.65%',
        'status' => 'Harvest'
    ],
    [
        'farm' => 'Farm Karawang',
        'flock' => 'FLK-2026-004',
        'age' => 12,
        'population' => 26000,
        'mortality' => '0.95%',
        'status' => 'Active'
    ],
    [
        'farm' => 'Farm Subang',
        'flock' => 'FLK-2026-005',
        'age' => 5,
        'population' => 24000,
        'mortality' => '0.42%',
        'status' => 'Preparing'
    ]
];

$activities = [
    [
        'title' => 'Daily recording submitted',
        'description' => 'Farm Cibinong · FLK-2026-001',
        'time' => '10 minutes ago',
        'icon' => 'bi-clipboard-check',
        'color' => 'green'
    ],
    [
        'title' => 'New flock registered',
        'description' => 'Farm Subang · FLK-2026-005',
        'time' => '35 minutes ago',
        'icon' => 'bi-plus-circle',
        'color' => 'blue'
    ],
    [
        'title' => 'Harvest process updated',
        'description' => 'Farm Bandung · FLK-2026-003',
        'time' => '1 hour ago',
        'icon' => 'bi-truck',
        'color' => 'orange'
    ],
    [
        'title' => 'Chick-in recording completed',
        'description' => 'Farm Karawang · FLK-2026-004',
        'time' => '2 hours ago',
        'icon' => 'bi-check-circle',
        'color' => 'purple'
    ]
];
?>

<style>
/* =========================================
   BROILER SYSTEM - DASHBOARD
========================================= */

.dashboard-page {
    padding: 28px;
    min-height: 100vh;
    background: #F5F8FC;
    color: #334E68;
}

.dashboard-page * {
    box-sizing: border-box;
}

.dashboard-page .dashboard-welcome {
    position: relative;
    overflow: hidden;
    padding: 28px 32px;
    margin-bottom: 24px;
    border-radius: 18px;
    background: linear-gradient(115deg, #244D75 0%, #3976AD 60%, #5B91C0 100%);
    color: #FFFFFF;
    box-shadow: 0 10px 28px rgba(57, 118, 173, .16);
}

.dashboard-welcome::before,
.dashboard-welcome::after {
    content: "";
    position: absolute;
    border: 1px solid rgba(255,255,255,.12);
    border-radius: 50%;
    pointer-events: none;
}

.dashboard-welcome::before {
    width: 260px;
    height: 260px;
    right: -45px;
    top: -150px;
    box-shadow: 0 0 0 35px rgba(255,255,255,.035);
}

.dashboard-welcome::after {
    width: 180px;
    height: 180px;
    right: 130px;
    bottom: -145px;
}

.dashboard-welcome-content {
    position: relative;
    z-index: 1;
}

.dashboard-welcome-label {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1.7px;
    text-transform: uppercase;
    color: rgba(255,255,255,.7);
    margin-bottom: 10px;
}

.dashboard-welcome h1 {
    font-size: 27px;
    font-weight: 750;
    color: #FFFFFF;
    margin: 0 0 8px;
    letter-spacing: -.5px;
}

.dashboard-welcome p {
    font-size: 13px;
    color: rgba(255,255,255,.78);
    margin: 0;
}

.dashboard-date {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 13px;
    background: rgba(255,255,255,.12);
    border: 1px solid rgba(255,255,255,.17);
    border-radius: 9px;
    color: #FFFFFF;
    font-size: 11px;
    font-weight: 600;
    white-space: nowrap;
}

/* SECTION */

.dashboard-section {
    margin-bottom: 24px;
}

.dashboard-section-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 15px;
}

.dashboard-section-title {
    font-size: 16px;
    font-weight: 750;
    color: #243B53;
    margin: 0;
}

.dashboard-section-subtitle {
    font-size: 11px;
    color: #8796A8;
    margin: 5px 0 0;
}

/* KPI */

.dashboard-kpi {
    position: relative;
    height: 100%;
    min-height: 145px;
    padding: 19px;
    background: #FFFFFF;
    border: 1px solid #E8EEF4;
    border-radius: 14px;
    box-shadow: 0 3px 12px rgba(36,59,83,.025);
    transition: all .22s ease;
}

.dashboard-kpi:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(36,59,83,.07);
    border-color: #D5E5F3;
}

.dashboard-kpi-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 17px;
}

.dashboard-kpi-icon {
    width: 39px;
    height: 39px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 11px;
    font-size: 17px;
}

.dashboard-kpi-icon.blue {
    color: #3976AD;
    background: #EAF2F9;
}

.dashboard-kpi-icon.purple {
    color: #8064B5;
    background: #F1EDFA;
}

.dashboard-kpi-icon.green {
    color: #269B70;
    background: #E9F7F0;
}

.dashboard-kpi-icon.orange {
    color: #D58A27;
    background: #FFF5E7;
}

.dashboard-kpi-label {
    font-size: 11px;
    color: #8493A5;
    font-weight: 600;
    margin-bottom: 7px;
}

.dashboard-kpi-value {
    font-size: 27px;
    line-height: 1.2;
    font-weight: 800;
    color: #243B53;
    letter-spacing: -.6px;
}

.dashboard-kpi-change {
    font-size: 10px;
    color: #8493A5;
    margin-top: 7px;
}

.dashboard-kpi-change i {
    color: #269B70;
    margin-right: 3px;
}

/* CARDS */

.dashboard-card {
    height: 100%;
    padding: 20px;
    background: #FFFFFF;
    border: 1px solid #E8EEF4;
    border-radius: 14px;
    box-shadow: 0 3px 12px rgba(36,59,83,.025);
}

.dashboard-chart {
    min-height: 280px;
}

.dashboard-period {
    display: inline-flex;
    padding: 3px;
    background: #F3F6FA;
    border-radius: 8px;
    gap: 2px;
}

.dashboard-period button {
    border: 0;
    background: transparent;
    padding: 6px 10px;
    border-radius: 6px;
    color: #8493A5;
    font-size: 10px;
    font-weight: 700;
    transition: all .2s ease;
}

.dashboard-period button.active {
    background: #FFFFFF;
    color: #3976AD;
    box-shadow: 0 1px 4px rgba(36,59,83,.1);
}

.dashboard-period button:hover {
    color: #3976AD;
}

/* FLOCK STATUS */

.flock-status-total {
    font-size: 27px;
    font-weight: 800;
    color: #243B53;
    margin: 8px 0 2px;
}

.flock-status-caption {
    color: #8493A5;
    font-size: 10px;
}

.flock-progress {
    height: 8px;
    display: flex;
    overflow: hidden;
    background: #EDF2F7;
    border-radius: 20px;
    margin: 20px 0;
}

.flock-progress span {
    height: 100%;
    transition: width .4s ease;
}

.flock-status-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 14px;
    font-size: 11px;
}

.flock-status-name {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #64748B;
}

.flock-status-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
}

.flock-status-value {
    color: #243B53;
    font-weight: 700;
}

/* TABLE */

.dashboard-table-card {
    padding: 0;
    overflow: hidden;
}

.dashboard-table {
    width: 100%;
    margin: 0;
    border-collapse: collapse;
}

.dashboard-table thead th {
    padding: 13px 16px;
    background: #F8FAFC;
    color: #8493A5;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: .6px;
    text-transform: uppercase;
    border-bottom: 1px solid #E8EEF4;
    white-space: nowrap;
}

.dashboard-table tbody td {
    padding: 14px 16px;
    color: #52677D;
    font-size: 11px;
    border-bottom: 1px solid #F0F3F7;
    vertical-align: middle;
    white-space: nowrap;
}

.dashboard-table tbody tr:last-child td {
    border-bottom: 0;
}

.dashboard-table tbody tr:hover {
    background: #FAFCFE;
}

.flock-name {
    color: #243B53;
    font-weight: 700;
    font-size: 11px;
}

.flock-farm {
    color: #91A0B0;
    font-size: 10px;
    margin-top: 4px;
}

.flock-id {
    color: #3976AD;
    font-weight: 700;
}

.status-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 5px 9px;
    border-radius: 20px;
    font-size: 9px;
    font-weight: 700;
}

.status-badge::before {
    content: "";
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: currentColor;
}

.status-badge.active {
    color: #25865E;
    background: #EAF7F0;
}

.status-badge.harvest {
    color: #3976AD;
    background: #EAF2F9;
}

.status-badge.preparing {
    color: #C48A2B;
    background: #FFF6E8;
}

.mortality-value {
    font-weight: 700;
    color: #334E68;
}

/* ACTIVITY */

.dashboard-activity {
    display: flex;
    gap: 12px;
    padding: 13px 0;
    border-bottom: 1px solid #F0F3F7;
}

.dashboard-activity:last-child {
    border-bottom: 0;
}

.activity-icon {
    width: 34px;
    height: 34px;
    min-width: 34px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    font-size: 14px;
}

.activity-icon.green {
    color: #269B70;
    background: #E9F7F0;
}

.activity-icon.blue {
    color: #3976AD;
    background: #EAF2F9;
}

.activity-icon.orange {
    color: #D58A27;
    background: #FFF5E7;
}

.activity-icon.purple {
    color: #8064B5;
    background: #F1EDFA;
}

.activity-title {
    font-size: 11px;
    font-weight: 700;
    color: #334E68;
    margin: 0 0 4px;
}

.activity-description {
    font-size: 10px;
    color: #8493A5;
    margin: 0;
}

.activity-time {
    font-size: 9px;
    color: #A0ADBA;
    margin-top: 5px;
}

/* RESPONSIVE */

@media(max-width: 1199px) {
    .dashboard-page {
        padding: 22px;
    }
}

@media(max-width: 767px) {
    .dashboard-page {
        padding: 16px;
    }

    .dashboard-welcome {
        padding: 22px !important;
    }

    .dashboard-welcome h1 {
        font-size: 22px;
    }

    .dashboard-date {
        margin-top: 18px;
    }

    .dashboard-section-header {
        align-items: flex-start;
    }

    .dashboard-kpi {
        min-height: 135px;
        padding: 15px;
    }

    .dashboard-kpi-value {
        font-size: 23px;
    }

    .dashboard-card {
        padding: 16px;
    }

    .dashboard-table-card {
        padding: 0;
    }
}

@media(max-width: 420px) {
    .dashboard-period button {
        padding: 6px 7px;
        font-size: 9px;
    }
}
</style>


<div class="dashboard-page">

    <!-- WELCOME -->
    <section class="dashboard-welcome">
        <div class="dashboard-welcome-content">
            <div class="row align-items-center">

                <div class="col-lg-8">
                    <div class="dashboard-welcome-label">
                        BROILER OPERATIONS OVERVIEW
                    </div>

                    <h1>
                        Good day, <?= html_escape($first_name); ?>!
                    </h1>

                    <p>
                        Here's what's happening across your broiler operations today.
                    </p>
                </div>

                <div class="col-lg-4 text-lg-end">
                    <div class="dashboard-date">
                        <i class="bi bi-calendar3"></i>
                        <?= date('l, d F Y'); ?>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- KPI OVERVIEW -->
    <section class="dashboard-section">

        <div class="dashboard-section-header">
            <div>
                <h2 class="dashboard-section-title">Operational Overview</h2>
                <p class="dashboard-section-subtitle">
                    Key indicators across your broiler operations
                </p>
            </div>
        </div>

        <div class="row g-3">

            <?php foreach ($kpis as $kpi): ?>
                <div class="col-xl-3 col-md-6 col-6">

                    <div class="dashboard-kpi">

                        <div class="dashboard-kpi-top">
                            <div class="dashboard-kpi-icon <?= $kpi['color']; ?>">
                                <i class="bi <?= $kpi['icon']; ?>"></i>
                            </div>
                            <i class="bi bi-three-dots"
                               style="color:#B2BECA;"></i>
                        </div>

                        <div class="dashboard-kpi-label">
                            <?= html_escape($kpi['label']); ?>
                        </div>

                        <div class="dashboard-kpi-value">
                            <?= html_escape($kpi['value']); ?>
                        </div>

                        <div class="dashboard-kpi-change">
                            <?= html_escape($kpi['change']); ?>
                        </div>

                    </div>

                </div>
            <?php endforeach; ?>

        </div>
    </section>


    <!-- PERFORMANCE -->
    <section class="dashboard-section">

        <div class="dashboard-section-header">
            <div>
                <h2 class="dashboard-section-title">Performance Overview</h2>
                <p class="dashboard-section-subtitle">
                    Population and mortality performance trends
                </p>
            </div>

            <div class="dashboard-period" id="performancePeriod">
                <button type="button" data-period="7" class="active">7D</button>
                <button type="button" data-period="30">30D</button>
                <button type="button" data-period="90">90D</button>
            </div>
        </div>

        <div class="row g-3">

            <div class="col-xl-8">
                <div class="dashboard-card dashboard-chart">

                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="dashboard-section-title"
                                 style="font-size:13px;">
                                Population Trend
                            </div>
                            <p class="dashboard-section-subtitle">
                                Total recorded broiler population
                            </p>
                        </div>

                        <span class="small"
                              style="color:#3976AD;font-size:10px;">
                            <i class="bi bi-circle-fill me-1"
                               style="font-size:7px;"></i>
                            Population
                        </span>
                    </div>

                    <div id="populationChart" style="height:225px;"></div>

                </div>
            </div>

            <div class="col-xl-4">
                <div class="dashboard-card">

                    <div class="dashboard-section-title"
                         style="font-size:13px;">
                        Flock Status
                    </div>

                    <p class="dashboard-section-subtitle">
                        Current flock distribution
                    </p>

                    <div class="flock-status-total">120</div>
                    <div class="flock-status-caption">Total registered flocks</div>

                    <div class="flock-progress">
                        <?php foreach ($flock_status as $status): ?>
                            <span style="
                                width:<?= $status['percentage']; ?>%;
                                background:<?= $status['color']; ?>;
                            "></span>
                        <?php endforeach; ?>
                    </div>

                    <?php foreach ($flock_status as $status): ?>
                        <div class="flock-status-item">

                            <div class="flock-status-name">
                                <span class="flock-status-dot"
                                      style="background:<?= $status['color']; ?>;">
                                </span>

                                <?= html_escape($status['label']); ?>
                            </div>

                            <div class="flock-status-value">
                                <?= number_format($status['value']); ?>
                                <span style="color:#9AA8B7;font-weight:400;">
                                    (<?= $status['percentage']; ?>%)
                                </span>
                            </div>

                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

        </div>
    </section>


    <!-- FLOCK MONITORING -->
    <section class="dashboard-section">

        <div class="dashboard-section-header">
            <div>
                <h2 class="dashboard-section-title">Flock Monitoring</h2>
                <p class="dashboard-section-subtitle">
                    Overview of currently monitored flocks
                </p>
            </div>

            <span style="font-size:10px;color:#8493A5;">
                Showing 5 sample records
            </span>
        </div>

        <div class="dashboard-card dashboard-table-card">

            <div class="table-responsive">

                <table class="dashboard-table">

                    <thead>
                        <tr>
                            <th>Farm / Flock</th>
                            <th>Age</th>
                            <th>Population</th>
                            <th>Mortality</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($flocks as $flock): ?>

                            <tr>

                                <td>
                                    <div class="flock-name">
                                        <?= html_escape($flock['farm']); ?>
                                    </div>

                                    <div class="flock-farm">
                                        <?= html_escape($flock['flock']); ?>
                                    </div>
                                </td>

                                <td>
                                    <strong><?= $flock['age']; ?></strong>
                                    <span style="color:#94A3B8;"> days</span>
                                </td>

                                <td>
                                    <?= number_format($flock['population']); ?>
                                </td>

                                <td>
                                    <span class="mortality-value">
                                        <?= html_escape($flock['mortality']); ?>
                                    </span>
                                </td>

                                <td>
                                    <span class="status-badge <?= strtolower($flock['status']); ?>">
                                        <?= html_escape($flock['status']); ?>
                                    </span>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>
        </div>
    </section>


    <!-- RECENT ACTIVITIES -->
    <section class="dashboard-section">

        <div class="row g-3">

            <div class="col-lg-8">

                <div class="dashboard-card">

                    <div class="dashboard-section-header">
                        <div>
                            <h2 class="dashboard-section-title">
                                Recent Activities
                            </h2>

                            <p class="dashboard-section-subtitle">
                                Latest operational updates
                            </p>
                        </div>

                        <span style="font-size:10px;color:#3976AD;">
                            <i class="bi bi-clock-history me-1"></i>
                            Recent
                        </span>
                    </div>

                    <?php foreach ($activities as $activity): ?>

                        <div class="dashboard-activity">

                            <div class="activity-icon <?= $activity['color']; ?>">
                                <i class="bi <?= $activity['icon']; ?>"></i>
                            </div>

                            <div class="flex-grow-1">
                                <p class="activity-title">
                                    <?= html_escape($activity['title']); ?>
                                </p>

                                <p class="activity-description">
                                    <?= html_escape($activity['description']); ?>
                                </p>

                                <div class="activity-time">
                                    <?= html_escape($activity['time']); ?>
                                </div>
                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>


            <div class="col-lg-4">

                <div class="dashboard-card h-100">

                    <div class="dashboard-section-title"
                         style="font-size:14px;">
                        Operational Snapshot
                    </div>

                    <p class="dashboard-section-subtitle">
                        Sample daily performance indicators
                    </p>

                    <div class="mt-4">

                        <div class="d-flex justify-content-between mb-2">
                            <span style="font-size:11px;color:#8493A5;">
                                Daily Recording
                            </span>
                            <strong style="font-size:11px;color:#243B53;">
                                92%
                            </strong>
                        </div>

                        <div class="progress"
                             style="height:7px;background:#EDF2F7;">
                            <div class="progress-bar"
                                 style="width:92%;background:#3976AD;">
                            </div>
                        </div>

                    </div>

                    <div class="mt-4">

                        <div class="d-flex justify-content-between mb-2">
                            <span style="font-size:11px;color:#8493A5;">
                                Chick-in Completion
                            </span>
                            <strong style="font-size:11px;color:#243B53;">
                                85%
                            </strong>
                        </div>

                        <div class="progress"
                             style="height:7px;background:#EDF2F7;">
                            <div class="progress-bar"
                                 style="width:85%;background:#269B70;">
                            </div>
                        </div>

                    </div>

                    <div class="mt-4">

                        <div class="d-flex justify-content-between mb-2">
                            <span style="font-size:11px;color:#8493A5;">
                                Harvest Progress
                            </span>
                            <strong style="font-size:11px;color:#243B53;">
                                68%
                            </strong>
                        </div>

                        <div class="progress"
                             style="height:7px;background:#EDF2F7;">
                            <div class="progress-bar"
                                 style="width:68%;background:#E5A23B;">
                            </div>
                        </div>

                    </div>

                    <div class="mt-4 p-3 rounded-3"
                         style="background:#F3F8FD;">

                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="bi bi-info-circle-fill"
                               style="color:#3976AD;"></i>

                            <strong style="font-size:11px;color:#3976AD;">
                                Dashboard Preview
                            </strong>
                        </div>

                        <p class="mb-0"
                           style="font-size:10px;line-height:1.7;color:#71869C;">
                            All figures currently use sample data.
                            Database integration will be implemented
                            after the dashboard design is approved.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    if (typeof ApexCharts === 'undefined') {
        console.warn('ApexCharts is not loaded.');
        return;
    }

    const chartElement = document.querySelector('#populationChart');

    if (!chartElement) return;

    const chartData = {
        7: {
            categories: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            population: [1180000, 1192000, 1205000, 1210000, 1228000, 1260000, 1280000]
        },
        30: {
            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            population: [1100000, 1160000, 1210000, 1280000]
        },
        90: {
            categories: ['Month 1', 'Month 2', 'Month 3'],
            population: [980000, 1120000, 1280000]
        }
    };

    const options = {
        chart: {
            type: 'area',
            height: 225,
            toolbar: {
                show: false
            },
            zoom: {
                enabled: false
            },
            fontFamily: 'inherit',
            animations: {
                enabled: true,
                speed: 500
            }
        },

        series: [{
            name: 'Population',
            data: chartData[7].population
        }],

        colors: ['#3976AD'],

        stroke: {
            curve: 'smooth',
            width: 3
        },

        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: .22,
                opacityTo: .02,
                stops: [0, 100]
            }
        },

        dataLabels: {
            enabled: false
        },

        markers: {
            size: 4,
            strokeWidth: 2,
            strokeColors: '#FFFFFF',
            hover: {
                size: 6
            }
        },

        xaxis: {
            categories: chartData[7].categories,
            labels: {
                style: {
                    colors: '#94A3B8',
                    fontSize: '10px'
                }
            },
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            }
        },

        yaxis: {
            labels: {
                formatter: function (value) {
                    return (value / 1000000).toFixed(2) + 'M';
                },
                style: {
                    colors: '#94A3B8',
                    fontSize: '10px'
                }
            }
        },

        grid: {
            borderColor: '#EDF2F7',
            strokeDashArray: 4,
            padding: {
                left: 5,
                right: 10
            }
        },

        tooltip: {
            y: {
                formatter: function (value) {
                    return new Intl.NumberFormat('en-US').format(value) + ' birds';
                }
            }
        }
    };

    const populationChart = new ApexCharts(chartElement, options);

    populationChart.render();

    const periodButtons = document.querySelectorAll(
        '#performancePeriod button'
    );

    periodButtons.forEach(function (button) {

        button.addEventListener('click', function () {

            const period = this.dataset.period;
            const selectedData = chartData[period];

            periodButtons.forEach(function (item) {
                item.classList.remove('active');
            });

            this.classList.add('active');

            populationChart.updateOptions({
                xaxis: {
                    categories: selectedData.categories
                }
            });

            populationChart.updateSeries([{
                name: 'Population',
                data: selectedData.population
            }]);

        });

    });

});
</script>
