```php
@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

<style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Poppins',sans-serif;
    }

    body{
        background:
        linear-gradient(135deg,#071028 0%,#0d1635 45%,#1f1b5c 100%);
        overflow-x:hidden;
    }

    .dashboard-wrapper{
        padding:22px;
        min-height:100vh;
    }

    /* ======================
        TOP NAVBAR
    =======================*/

    .top-navbar{
        width:100%;
        background:rgba(255,255,255,0.08);
        border:1px solid rgba(255,255,255,0.08);
        backdrop-filter:blur(14px);
        border-radius:26px;
        padding:18px 24px;
        display:flex;
        align-items:center;
        justify-content:space-between;
        margin-bottom:25px;
    }

    .logo-section{
        display:flex;
        align-items:center;
        gap:14px;
    }

    .logo-box{
        width:58px;
        height:58px;
        border-radius:18px;
        background:linear-gradient(135deg,#7c3aed,#06b6d4);
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        font-size:24px;
    }

    .logo-title{
        color:#fff;
        font-size:30px;
        font-weight:700;
        line-height:1;
    }

    .logo-title span{
        color:#5eead4;
    }

    .admin-box{
        display:flex;
        align-items:center;
        gap:14px;
    }

    .admin-avatar{
        width:55px;
        height:55px;
        border-radius:50%;
        background:linear-gradient(135deg,#3b82f6,#8b5cf6);
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        font-weight:700;
        font-size:20px;
    }

    .admin-text h4{
        color:#fff;
        margin-bottom:2px;
        font-size:16px;
    }

    .admin-text p{
        color:#94a3b8;
        font-size:13px;
    }

    /* ======================
        HERO SECTION
    =======================*/

    .hero-section{
        margin-top:15px;
        display:grid;
        grid-template-columns:2fr 1fr;
        gap:24px;
    }

    .welcome-card{
        background:
        linear-gradient(135deg,#111c44 0%,#1d2a67 45%,#6d28d9 100%);
        border-radius:32px;
        padding:40px;
        position:relative;
        overflow:hidden;
        min-height:300px;
    }

    .welcome-card::before{
        content:'';
        position:absolute;
        width:420px;
        height:420px;
        border-radius:50%;
        background:rgba(255,255,255,0.05);
        top:-150px;
        right:-120px;
    }

    .welcome-card::after{
        content:'';
        position:absolute;
        width:250px;
        height:250px;
        border-radius:50%;
        background:rgba(255,255,255,0.04);
        bottom:-120px;
        left:-100px;
    }

    .welcome-content{
        position:relative;
        z-index:2;
    }

    .welcome-tag{
        display:inline-block;
        background:rgba(255,255,255,0.12);
        color:#fff;
        padding:10px 18px;
        border-radius:50px;
        font-size:13px;
        margin-bottom:20px;
    }

    .welcome-content h1{
        font-size:52px;
        color:#fff;
        font-weight:700;
        line-height:1.1;
        margin-bottom:16px;
    }

    .welcome-content p{
        color:#dbeafe;
        font-size:16px;
        line-height:1.8;
        width:80%;
    }

    .quick-actions{
        margin-top:28px;
        display:flex;
        gap:16px;
        flex-wrap:wrap;
    }

    .action-btn{
        padding:14px 24px;
        border-radius:16px;
        text-decoration:none;
        font-weight:600;
        display:inline-flex;
        align-items:center;
        gap:12px;
        transition:.3s;
    }

    .btn-primary-dashboard{
        background:#fff;
        color:#111827;
    }

    .btn-secondary-dashboard{
        background:rgba(255,255,255,0.12);
        color:#fff;
        border:1px solid rgba(255,255,255,0.15);
    }

    .action-btn:hover{
        transform:translateY(-4px);
    }

    /* ======================
        SIDE INFO
    =======================*/

    .side-summary{
        display:flex;
        flex-direction:column;
        gap:20px;
    }

    .summary-box{
        background:rgba(255,255,255,0.08);
        backdrop-filter:blur(12px);
        border-radius:28px;
        padding:28px;
        border:1px solid rgba(255,255,255,0.08);
        flex:1;
    }

    .summary-box h5{
        color:#94a3b8;
        font-size:14px;
        margin-bottom:10px;
    }

    .summary-box h2{
        color:#fff;
        font-size:36px;
        margin-bottom:10px;
    }

    .summary-box p{
        color:#cbd5e1;
        font-size:14px;
    }

    /* ======================
        STATS
    =======================*/

    .stats-grid{
        margin-top:28px;
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
        gap:22px;
    }

    .stat-card{
        background:#fff;
        border-radius:28px;
        padding:26px;
        position:relative;
        overflow:hidden;
        transition:.3s;
    }

    .stat-card:hover{
        transform:translateY(-6px);
    }

    .stat-top{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
    }

    .stat-icon{
        width:65px;
        height:65px;
        border-radius:22px;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        font-size:24px;
    }

    .bg-purple{
        background:linear-gradient(135deg,#7c3aed,#8b5cf6);
    }

    .bg-blue{
        background:linear-gradient(135deg,#2563eb,#06b6d4);
    }

    .bg-green{
        background:linear-gradient(135deg,#10b981,#22c55e);
    }

    .bg-orange{
        background:linear-gradient(135deg,#f97316,#fb923c);
    }

    .stat-title{
        color:#64748b;
        font-size:14px;
        margin-bottom:8px;
    }

    .stat-value{
        font-size:38px;
        font-weight:700;
        color:#0f172a;
    }

    .stat-growth{
        color:#10b981;
        font-size:14px;
        font-weight:600;
        margin-top:10px;
    }

    /* ======================
        CHART SECTION
    =======================*/

    .chart-grid{
        margin-top:28px;
        display:grid;
        grid-template-columns:2fr 1fr;
        gap:24px;
    }

    .chart-card{
        background:#fff;
        border-radius:32px;
        padding:28px;
    }

    .card-title{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:28px;
    }

    .card-title h3{
        font-size:24px;
        color:#111827;
    }

    .bar-chart{
        height:320px;
        display:flex;
        align-items:flex-end;
        justify-content:space-between;
        gap:18px;
    }

    .bar-box{
        flex:1;
        text-align:center;
    }

    .bar{
        width:100%;
        border-radius:18px 18px 8px 8px;
        background:
        linear-gradient(to top,#7c3aed,#60a5fa);
        transition:.3s;
    }

    .bar:hover{
        transform:scaleY(1.05);
    }

    .bar-label{
        margin-top:14px;
        font-size:13px;
        color:#64748b;
        font-weight:600;
    }

    /* ======================
        PIE CHART
    =======================*/

    .pie-wrapper{
        display:flex;
        flex-direction:column;
        align-items:center;
        justify-content:center;
        height:100%;
    }

    .pie-chart{
        width:240px;
        height:240px;
        border-radius:50%;
        background:
        conic-gradient(
        #7c3aed 0% 40%,
        #3b82f6 40% 65%,
        #10b981 65% 80%,
        #f97316 80% 92%,
        #cbd5e1 92% 100%
        );
        position:relative;
    }

    .pie-chart::before{
        content:'';
        position:absolute;
        width:120px;
        height:120px;
        background:#fff;
        border-radius:50%;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%);
    }

    .pie-center{
        position:absolute;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%);
        z-index:2;
        text-align:center;
    }

    .pie-center h2{
        font-size:28px;
        color:#111827;
    }

    .pie-center p{
        font-size:13px;
        color:#64748b;
    }

    .legend-list{
        margin-top:28px;
        width:100%;
    }

    .legend-item{
        display:flex;
        align-items:center;
        justify-content:space-between;
        margin-bottom:14px;
    }

    .legend-left{
        display:flex;
        align-items:center;
        gap:10px;
    }

    .legend-dot{
        width:14px;
        height:14px;
        border-radius:50%;
    }

    /* ======================
        STOCK SECTION
    =======================*/

    .stock-section{
        margin-top:28px;
    }

    .stock-grid{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
        gap:22px;
    }

    .stock-card{
        background:#fff;
        border-radius:28px;
        padding:24px;
        transition:.3s;
    }

    .stock-card:hover{
        transform:translateY(-5px);
    }

    .stock-top{
        display:flex;
        align-items:center;
        justify-content:space-between;
        margin-bottom:18px;
    }

    .stock-icon{
        width:60px;
        height:60px;
        border-radius:20px;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:24px;
        color:#fff;
    }

    .stock-card h4{
        font-size:22px;
        color:#111827;
        margin-bottom:8px;
    }

    .stock-card p{
        color:#64748b;
        font-size:14px;
        margin-bottom:16px;
    }

    .progress{
        width:100%;
        height:8px;
        background:#e2e8f0;
        border-radius:50px;
        overflow:hidden;
    }

    .progress-bar{
        height:100%;
        border-radius:50px;
    }

    /* ======================
        BOTTOM GRID
    =======================*/

    .bottom-grid{
        margin-top:28px;
        display:grid;
        grid-template-columns:1.5fr 1fr;
        gap:24px;
    }

    .activity-card,
    .top-product-card{
        background:#fff;
        border-radius:30px;
        padding:28px;
    }

    .activity-item{
        display:flex;
        gap:16px;
        padding:18px 0;
        border-bottom:1px solid #edf2f7;
    }

    .activity-item:last-child{
        border-bottom:none;
    }

    .activity-icon{
        width:54px;
        height:54px;
        border-radius:18px;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        font-size:20px;
    }

    .activity-content h5{
        font-size:16px;
        color:#111827;
        margin-bottom:5px;
    }

    .activity-content p{
        color:#64748b;
        font-size:13px;
    }

    .product-item{
        display:flex;
        align-items:center;
        justify-content:space-between;
        margin-bottom:22px;
    }

    .product-left{
        display:flex;
        align-items:center;
        gap:14px;
    }

    .product-img{
        width:58px;
        height:58px;
        border-radius:16px;
        background:linear-gradient(135deg,#dbeafe,#ede9fe);
    }

    .product-text h5{
        font-size:15px;
        margin-bottom:4px;
        color:#111827;
    }

    .product-text p{
        font-size:13px;
        color:#64748b;
    }

    .product-growth{
        color:#10b981;
        font-weight:600;
    }

    /* ======================
        RESPONSIVE
    =======================*/

    @media(max-width:1100px){

        .hero-section,
        .chart-grid,
        .bottom-grid{
            grid-template-columns:1fr;
        }

    }

    @media(max-width:768px){

        .dashboard-wrapper{
            padding:14px;
        }

        .top-navbar{
            flex-direction:column;
            gap:20px;
            align-items:flex-start;
        }

        .welcome-content h1{
            font-size:36px;
        }

        .welcome-content p{
            width:100%;
        }

        .bar-chart{
            height:240px;
            gap:10px;
        }

    }


        .advanced-chart-grid{
        margin-top:32px;
        display:grid;
        grid-template-columns:2fr 1fr;
        gap:24px;
    }

    .glass-card{
        background:rgba(255,255,255,0.08);
        border:1px solid rgba(255,255,255,0.08);
        backdrop-filter:blur(18px);
        border-radius:34px;
        padding:34px;
        position:relative;
        overflow:hidden;
    }

    .glass-card::before{
        content:'';
        position:absolute;
        width:300px;
        height:300px;
        border-radius:50%;
        background:rgba(124,58,237,0.16);
        top:-120px;
        right:-100px;
    }

    .glass-card::after{
        content:'';
        position:absolute;
        width:220px;
        height:220px;
        border-radius:50%;
        background:rgba(6,182,212,0.10);
        bottom:-120px;
        left:-90px;
    }

    .glass-title{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:30px;
        position:relative;
        z-index:2;
    }

    .glass-title h2{
        color:#ffffff;
        font-size:30px;
        font-weight:700;
        margin-bottom:6px;
    }

    .glass-title p{
        color:#94a3b8;
        font-size:14px;
    }

    .graph-badge{
        width:72px;
        height:72px;
        border-radius:24px;
        background:linear-gradient(135deg,#06b6d4,#7c3aed);
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        font-size:30px;
        box-shadow:0 10px 30px rgba(124,58,237,0.35);
    }

    /* =====================
        WAVE GRAPH
    ===================== */

    .wave-chart-wrapper{
        position:relative;
        z-index:2;
    }

    .wave-chart{
        width:100%;
        height:360px;
    }

    .month-points{
        display:flex;
        justify-content:space-between;
        margin-top:5px;
        gap:10px;
    }

    .month-box{
        text-align:center;
        flex:1;
    }

    .month-name{
        color:#cbd5e1;
        font-size:13px;
        margin-bottom:8px;
    }

    .month-value{
        color:#ffffff;
        font-size:14px;
        font-weight:600;
    }

    /* =====================
        RIGHT CARDS
    ===================== */

    .sales-right-grid{
        display:flex;
        flex-direction:column;
        gap:22px;
    }

    .mini-sales-card{
        background:
        linear-gradient(
            135deg,
            rgba(255,255,255,0.10),
            rgba(255,255,255,0.04)
        );

        border:1px solid rgba(255,255,255,0.08);

        border-radius:30px;

        padding:28px;

        position:relative;

        overflow:hidden;

        flex:1;
    }

    .mini-sales-card::before{
        content:'';
        position:absolute;
        width:160px;
        height:160px;
        border-radius:50%;
        background:rgba(255,255,255,0.05);
        right:-50px;
        top:-50px;
    }

    .mini-top{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:22px;
        position:relative;
        z-index:2;
    }

    .mini-icon{
        width:62px;
        height:62px;
        border-radius:22px;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        font-size:25px;
        background:linear-gradient(135deg,#2563eb,#7c3aed);
    }

    .mini-percent{
        color:#22c55e;
        font-size:15px;
        font-weight:700;
    }

    .mini-sales-card h4{
        color:#cbd5e1;
        font-size:15px;
        margin-bottom:10px;
    }

    .mini-sales-card h1{
        color:#ffffff;
        font-size:44px;
        margin-bottom:10px;
        line-height:1;
    }

    .mini-sales-card p{
        color:#94a3b8;
        font-size:14px;
    }

    /* =====================
        ANALYTICS GRID
    ===================== */

    .analytics-grid{
        margin-top:30px;
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
        gap:24px;
    }

    .analytics-card{
        background:
        linear-gradient(
            135deg,
            rgba(255,255,255,0.10),
            rgba(255,255,255,0.04)
        );

        border:1px solid rgba(255,255,255,0.07);

        border-radius:30px;

        padding:28px;

        position:relative;

        overflow:hidden;

        transition:.3s;
    }

    .analytics-card:hover{
        transform:translateY(-8px);
    }

    .analytics-top{
        display:flex;
        justify-content:space-between;
        align-items:flex-start;
        gap:15px;
    }

    .analytics-card h5{
        color:#94a3b8;
        font-size:15px;
        margin-bottom:8px;
    }

    .analytics-card h2{
        color:#fff;
        font-size:42px;
        margin-bottom:10px;
    }

    .analytics-card p{
        color:#cbd5e1;
        font-size:14px;
        line-height:1.6;
    }

    .analytics-icon{
        width:70px;
        height:70px;
        border-radius:24px;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        font-size:26px;
    }

    .wave-bg{
        position:absolute;
        right:-10px;
        bottom:-40px;
        font-size:130px;
        color:rgba(255,255,255,0.03);
        font-weight:700;
    }

    @media(max-width:1100px){

        .advanced-chart-grid{
            grid-template-columns:1fr;
        }

    }

    @media(max-width:768px){

        .month-points{
            flex-wrap:wrap;
        }

        .glass-title{
            flex-direction:column;
            align-items:flex-start;
            gap:18px;
        }

    }


</style>

<div class="dashboard-wrapper">

    <!-- TOP NAVBAR -->

    

    <!-- HERO -->

    <div class="hero-section">

        <div class="welcome-card">

            <div class="welcome-content">


                <h1>
                    Welcome Back,<br>
                    Admin 👋
                </h1>

              

                <div class="quick-actions">

                    <a href="#" class="action-btn btn-primary-dashboard">
                        <i class="fa-solid fa-plus"></i>
                        Create Quotation
                    </a>

                    <a href="#" class="action-btn btn-secondary-dashboard">
                        <i class="fa-solid fa-chart-line"></i>
                        View Reports
                    </a>

                </div>

            </div>

        </div>

        <div class="side-summary">

            <div class="summary-box">
                <h5>Total Revenue</h5>
                <h2>₹24.5L</h2>
                <p>+18.6% growth this month</p>
            </div>

            <div class="summary-box">
                <h5>Total Orders</h5>
                <h2>148</h2>
                <p>38 pending deliveries</p>
            </div>

        </div>

    </div>


    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-top">

                <div>

                    <div class="stat-title">
                        Total Quotations
                    </div>

                    <div class="stat-value">
                        1,284
                    </div>

                </div>

                <div class="stat-icon bg-purple">
                    <i class="fa-solid fa-file-invoice"></i>
                </div>

            </div>

            <div class="stat-growth">
                +12.4% from last month
            </div>

        </div>

        <div class="stat-card">

            <div class="stat-top">

                <div>

                    <div class="stat-title">
                        Total Customers
                    </div>

                    <div class="stat-value">
                        920
                    </div>

                </div>

                <div class="stat-icon bg-blue">
                    <i class="fa-solid fa-users"></i>
                </div>

            </div>

            <div class="stat-growth">
                +15.3% from last month
            </div>

        </div>

        <div class="stat-card">

            <div class="stat-top">

                <div>

                    <div class="stat-title">
                        Total Billing
                    </div>

                    <div class="stat-value">
                        1,540
                    </div>

                </div>

                <div class="stat-icon bg-green">
                    <i class="fa-solid fa-layer-group"></i>
                </div>

            </div>

            <div class="stat-growth">
                +8.7% stock growth
            </div>

        </div>

        <div class="stat-card">

            <div class="stat-top">

                <div>

                    <div class="stat-title">
                        Pending Orders
                    </div>

                    <div class="stat-value">
                        38
                    </div>

                </div>

                <div class="stat-icon bg-orange">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>

            </div>

            <div class="stat-growth">
                +4 new today
            </div>

        </div>

    </div>

    <!-- CHART SECTION -->

    <div class="chart-grid">

        <!-- BAR CHART -->

        <div class="chart-card">

            <div class="card-title">

                <h3>
                    Sales Overview
                </h3>

            </div>

            <div class="bar-chart">

                <div class="bar-box">
                    <div class="bar" style="height:55%;"></div>
                    <div class="bar-label">Jan</div>
                </div>

                <div class="bar-box">
                    <div class="bar" style="height:80%;"></div>
                    <div class="bar-label">Feb</div>
                </div>

                <div class="bar-box">
                    <div class="bar" style="height:65%;"></div>
                    <div class="bar-label">Mar</div>
                </div>

                <div class="bar-box">
                    <div class="bar" style="height:92%;"></div>
                    <div class="bar-label">Apr</div>
                </div>

                <div class="bar-box">
                    <div class="bar" style="height:88%;"></div>
                    <div class="bar-label">May</div>
                </div>

                <div class="bar-box">
                    <div class="bar" style="height:72%;"></div>
                    <div class="bar-label">Jun</div>
                </div>

                <div class="bar-box">
                    <div class="bar" style="height:95%;"></div>
                    <div class="bar-label">Jul</div>
                </div>

                <div class="bar-box">
                    <div class="bar" style="height:78%;"></div>
                    <div class="bar-label">Aug</div>
                </div>

            </div>

        </div>

        <!-- PIE CHART -->

        <div class="chart-card">

            <div class="card-title">

                <h3>
                    Tile Distribution
                </h3>

            </div>

            <div class="pie-wrapper">

                <div class="pie-chart">

                    <div class="pie-center">
                        <h2>24.5L</h2>
                        <p>Total Sales</p>
                    </div>

                </div>

                <div class="legend-list">

                    <div class="legend-item">

                        <div class="legend-left">
                            <div class="legend-dot" style="background:#7c3aed;"></div>
                            <span>Floor Tiles</span>
                        </div>

                        <strong>40%</strong>

                    </div>

                    <div class="legend-item">

                        <div class="legend-left">
                            <div class="legend-dot" style="background:#3b82f6;"></div>
                            <span>Wall Tiles</span>
                        </div>

                        <strong>25%</strong>

                    </div>

                    <div class="legend-item">

                        <div class="legend-left">
                            <div class="legend-dot" style="background:#10b981;"></div>
                            <span>Parking Tiles</span>
                        </div>

                        <strong>15%</strong>

                    </div>

                    <div class="legend-item">

                        <div class="legend-left">
                            <div class="legend-dot" style="background:#f97316;"></div>
                            <span>Bathroom Tiles</span>
                        </div>

                        <strong>12%</strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- STOCK -->

    <div class="stock-section">

        <div class="card-title">

            <h3 style="color:#fff;">
                Tile Stock Overview
            </h3>

        </div>

        <div class="stock-grid">

            <div class="stock-card">

                <div class="stock-top">

                    <div class="stock-icon bg-purple">
                        <i class="fa-solid fa-border-all"></i>
                    </div>

                    <strong>12,540 Sq.Ft</strong>

                </div>

                <h4>Floor Tiles</h4>

                <p>120 Boxes Available</p>

                <div class="progress">
                    <div class="progress-bar"
                    style="width:85%;background:#7c3aed;"></div>
                </div>

            </div>

            <div class="stock-card">

                <div class="stock-top">

                    <div class="stock-icon bg-blue">
                        <i class="fa-solid fa-table-cells-large"></i>
                    </div>

                    <strong>8,760 Sq.Ft</strong>

                </div>

                <h4>Wall Tiles</h4>

                <p>98 Boxes Available</p>

                <div class="progress">
                    <div class="progress-bar"
                    style="width:70%;background:#3b82f6;"></div>
                </div>

            </div>

            <div class="stock-card">

                <div class="stock-top">

                    <div class="stock-icon bg-green">
                        <i class="fa-solid fa-square-parking"></i>
                    </div>

                    <strong>6,320 Sq.Ft</strong>

                </div>

                <h4>Parking Tiles</h4>

                <p>85 Boxes Available</p>

                <div class="progress">
                    <div class="progress-bar"
                    style="width:55%;background:#10b981;"></div>
                </div>

            </div>

            <div class="stock-card">

                <div class="stock-top">

                    <div class="stock-icon bg-orange">
                        <i class="fa-solid fa-bath"></i>
                    </div>

                    <strong>4,890 Sq.Ft</strong>

                </div>

                <h4>Bathroom Tiles</h4>

                <p>65 Boxes Available</p>

                <div class="progress">
                    <div class="progress-bar"
                    style="width:45%;background:#f97316;"></div>
                </div>

            </div>

        </div>

    </div>

    <!-- BOTTOM -->

    <div class="bottom-grid">

        <!-- RECENT ACTIVITY -->

        <div class="activity-card">

            <div class="card-title">

                <h3>
                    Recent Activities
                </h3>

            </div>

            <div class="activity-item">

                <div class="activity-icon bg-purple">
                    <i class="fa-solid fa-file-circle-plus"></i>
                </div>

                <div class="activity-content">
                    <h5>New Quotation Created</h5>
                    <p>Quotation #QT260521006 created successfully.</p>
                </div>

            </div>

            <div class="activity-item">

                <div class="activity-icon bg-blue">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>

                <div class="activity-content">
                    <h5>Order Confirmed</h5>
                    <p>Premium wall tiles order confirmed.</p>
                </div>

            </div>

            <div class="activity-item">

                <div class="activity-icon bg-green">
                    <i class="fa-solid fa-money-bill-wave"></i>
                </div>

                <div class="activity-content">
                    <h5>Payment Received</h5>
                    <p>₹15,680 payment received from customer.</p>
                </div>

            </div>

            <div class="activity-item">

                <div class="activity-icon bg-orange">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>

                <div class="activity-content">
                    <h5>Low Stock Alert</h5>
                    <p>Bathroom tile stock running low.</p>
                </div>

            </div>

        </div>

        <!-- TOP PRODUCTS -->

        <div class="top-product-card">

            <div class="card-title">

                <h3>
                    Top Selling Tiles
                </h3>

            </div>

            <div class="product-item">

                <div class="product-left">

                    <div class="product-img"></div>

                    <div class="product-text">
                        <h5>Premium Marble White</h5>
                        <p>2,450 Sq.Ft</p>
                    </div>

                </div>

                <div class="product-growth">
                    ↑ 18.6%
                </div>

            </div>

            <div class="product-item">

                <div class="product-left">

                    <div class="product-img"></div>

                    <div class="product-text">
                        <h5>Glossy Wall Tile</h5>
                        <p>1,980 Sq.Ft</p>
                    </div>

                </div>

                <div class="product-growth">
                    ↑ 14.3%
                </div>

            </div>

            <div class="product-item">

                <div class="product-left">

                    <div class="product-img"></div>

                    <div class="product-text">
                        <h5>Parking Tile Red Hex</h5>
                        <p>1,560 Sq.Ft</p>
                    </div>

                </div>

                <div class="product-growth">
                    ↑ 12.8%
                </div>

            </div>

        </div>

    </div>

    <div class="advanced-chart-grid">  
           <div class="glass-card">        <div class="glass-title">            <div>                <h2>                    Sales Performance Analytics                </h2>                <p>                    Monthly Revenue Growth • 2026                </p>            </div>            <div class="graph-badge">                <i class="fa-solid fa-chart-line"></i>            </div>        </div>        <div class="wave-chart-wrapper">            <svg class="wave-chart"            viewBox="0 0 1200 360">                <!-- GRID -->                <line x1="0" y1="300"                x2="1200" y2="300"                stroke="rgba(255,255,255,0.08)"                stroke-width="2"/>                <line x1="0" y1="220"                x2="1200" y2="220"                stroke="rgba(255,255,255,0.05)"                stroke-width="1"/>                <line x1="0" y1="140"                x2="1200" y2="140"                stroke="rgba(255,255,255,0.05)"                stroke-width="1"/>                <line x1="0" y1="60"                x2="1200" y2="60"                stroke="rgba(255,255,255,0.05)"                stroke-width="1"/>                <!-- AREA -->                <path                d="                M0 250                C100 170 180 120 260 170                S420 300 520 190                S700 40 820 120                S980 320 1200 130                L1200 360                L0 360 Z"                fill="url(#waveGradient)"                opacity="0.25"/>                <!-- MAIN LINE -->                <path                d="                M0 250                C100 170 180 120 260 170                S420 300 520 190                S700 40 820 120                S980 320 1200 130"                fill="none"                stroke="url(#lineGradient)"                stroke-width="8"                stroke-linecap="round"/>                <!-- POINTS -->                <circle cx="0" cy="250" r="10"                fill="#06b6d4"/>                <circle cx="260" cy="170" r="10"                fill="#8b5cf6"/>                <circle cx="520" cy="190" r="10"                fill="#06b6d4"/>                <circle cx="820" cy="120" r="10"                fill="#8b5cf6"/>                <circle cx="1200" cy="130" r="10"                fill="#06b6d4"/>                <!-- GRADIENT -->                <defs>                    <linearGradient                    id="lineGradient"                    x1="0%"                    y1="0%"                    x2="100%"                    y2="0%">                        <stop offset="0%"                        stop-color="#06b6d4"/>                        <stop offset="50%"                        stop-color="#7c3aed"/>                        <stop offset="100%"                        stop-color="#60a5fa"/>                    </linearGradient>                    <linearGradient                    id="waveGradient"                    x1="0%"                    y1="0%"                    x2="0%"                    y2="100%">                        <stop offset="0%"                        stop-color="#8b5cf6"/>                        <stop offset="100%"                        stop-color="transparent"/>                    </linearGradient>                </defs>            </svg>            <!-- MONTH VALUES -->            <div class="month-points">                <div class="month-box">                    <div class="month-name">Jan</div>                    <div class="month-value">₹1.2L</div>                </div>                <div class="month-box">                    <div class="month-name">Feb</div>                    <div class="month-value">₹1.8L</div>                </div>                <div class="month-box">                    <div class="month-name">Mar</div>                    <div class="month-value">₹2.1L</div>                </div>                <div class="month-box">                    <div class="month-name">Apr</div>                    <div class="month-value">₹1.6L</div>                </div>                <div class="month-box">                    <div class="month-name">May</div>                    <div class="month-value">₹2.7L</div>                </div>                <div class="month-box">                    <div class="month-name">Jun</div>                    <div class="month-value">₹3.2L</div>                </div>                <div class="month-box">                    <div class="month-name">Jul</div>                    <div class="month-value">₹2.5L</div>                </div>                <div class="month-box">                    <div class="month-name">Aug</div>                    <div class="month-value">₹3.8L</div>                </div>            </div>        </div>    </div>    <!-- RIGHT SIDE CARDS -->    <div class="sales-right-grid">        <div class="mini-sales-card">            <div class="mini-top">                <div class="mini-icon">                    <i class="fa-solid fa-wallet"></i>                </div>                <div class="mini-percent">                    +24.8%                </div>            </div>            <h4>                Total Annual Revenue            </h4>            <h1>                ₹24.5L            </h1>            <p>                Compared to last financial year            </p>        </div>        <div class="mini-sales-card">            <div class="mini-top">                <div class="mini-icon">                    <i class="fa-solid fa-boxes-stacked"></i>                </div>                <div class="mini-percent">                    +18.2%                </div>            </div>            <h4>                Total Tile Stock            </h4>            <h1>                32K            </h1>            <p>                Sq.ft tiles available in warehouse            </p>        </div>    </div></div><!-- =========================    EXTRA ANALYTICS========================= --><div class="analytics-grid">    <div class="analytics-card">        <div class="analytics-top">            <div>                <h5>                    Floor Tile Sales                </h5>                <h2>                    ₹8.6L                </h2>                <p>                    Premium vitrified tiles performance                </p>            </div>            <div class="analytics-icon"            style="background:linear-gradient(135deg,#7c3aed,#8b5cf6);">                <i class="fa-solid fa-border-all"></i>            </div>        </div>        <div class="wave-bg">            ≋        </div>    </div>    <div class="analytics-card">        <div class="analytics-top">            <div>                <h5>                    Wall Tile Revenue                </h5>                <h2>                    ₹5.2L                </h2>                <p>                    Luxury glossy wall collections                </p>            </div>            <div class="analytics-icon"            style="background:linear-gradient(135deg,#2563eb,#06b6d4);">                <i class="fa-solid fa-table-cells-large"></i>            </div>        </div>        <div class="wave-bg">            ≋        </div>    </div>    <div class="analytics-card">        <div class="analytics-top">            <div>                <h5>                    Bathroom Tile Sales                </h5>                <h2>                    ₹3.9L                </h2>                <p>                    Anti-skid designer bathroom tiles                </p>            </div>            <div class="analytics-icon"            style="background:linear-gradient(135deg,#f97316,#fb923c);">                <i class="fa-solid fa-bath"></i>            </div>        </div>        <div class="wave-bg">            ≋        </div>    </div>    <div class="analytics-card">        <div class="analytics-top">            <div>                <h5>                    Parking Tile Sales                </h5>                <h2>                    ₹6.8L                </h2>                <p>                    Heavy-duty outdoor parking tiles                </p>            </div>            <div class="analytics-icon"            style="background:linear-gradient(135deg,#10b981,#22c55e);">                <i class="fa-solid fa-square-parking"></i>            </div>        </div>        <div class="wave-bg">            ≋        </div>    </div></div>

</div>

@endsection

