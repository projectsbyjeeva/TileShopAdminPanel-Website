@extends('layouts.app')
@section('title','Dashboard')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }

    .dashboard-wrapper{
        padding:28px;
        min-height:100vh;
        background:
        radial-gradient(circle at top left,#1b2a52 0%,#0a1025 35%,#0a0f1f 100%);
    }

    /* =======================
        TOP WELCOME CARD
    ======================== */

    .welcome-card{
        position:relative;
        overflow:hidden;
        padding:35px;
        border-radius:28px;
        background:linear-gradient(135deg,rgba(255,255,255,0.12),rgba(255,255,255,0.04));
        border:1px solid rgba(255,255,255,0.08);
        backdrop-filter:blur(18px);
        box-shadow:0 10px 40px rgba(0,0,0,0.35);
        margin-bottom:28px;
    }

    .welcome-card::before{
        content:'';
        position:absolute;
        width:350px;
        height:350px;
        background:rgba(99,102,241,0.25);
        border-radius:50%;
        top:-180px;
        right:-100px;
        filter:blur(20px);
    }

    .welcome-flex{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:20px;
        flex-wrap:wrap;
    }

    .welcome-title{
        font-size:38px;
        font-weight:800;
        color:#fff;
        margin-bottom:10px;
    }

    .welcome-title span{
        color:#60a5fa;
    }

    .welcome-text{
        color:#cbd5e1;
        font-size:15px;
        line-height:26px;
        max-width:700px;
    }

    .today-box{
        padding:20px 28px;
        border-radius:20px;
        background:rgba(255,255,255,0.08);
        border:1px solid rgba(255,255,255,0.08);
        min-width:220px;
    }

    .today-box h5{
        color:#94a3b8;
        font-size:14px;
        margin-bottom:6px;
    }

    .today-box h2{
        color:#fff;
        font-size:28px;
        font-weight:700;
    }

    /* =======================
        COUNT CARDS
    ======================== */

    .stats-grid{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(230px,1fr));
        gap:22px;
        margin-bottom:30px;
    }

    .stat-card{
        position:relative;
        overflow:hidden;
        padding:24px;
        border-radius:24px;
        background:linear-gradient(145deg,rgba(255,255,255,0.10),rgba(255,255,255,0.03));
        border:1px solid rgba(255,255,255,0.08);
        backdrop-filter:blur(14px);
        box-shadow:
        0 8px 25px rgba(0,0,0,0.35),
        inset 0 1px 0 rgba(255,255,255,0.06);
        transition:0.4s ease;
    }

    .stat-card:hover{
        transform:translateY(-8px) scale(1.02);
    }

    .stat-card::before{
        content:'';
        position:absolute;
        width:120px;
        height:120px;
        background:rgba(255,255,255,0.06);
        border-radius:50%;
        right:-35px;
        top:-35px;
    }

    .stat-top{
        display:flex;
        align-items:center;
        justify-content:space-between;
        margin-bottom:20px;
    }

    .stat-icon{
        width:62px;
        height:62px;
        border-radius:20px;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:24px;
        color:#fff;
        box-shadow:0 8px 20px rgba(0,0,0,0.25);
    }

    .icon-blue{
        background:linear-gradient(135deg,#2563eb,#60a5fa);
    }

    .icon-green{
        background:linear-gradient(135deg,#059669,#34d399);
    }

    .icon-purple{
        background:linear-gradient(135deg,#7c3aed,#a855f7);
    }

    .icon-orange{
        background:linear-gradient(135deg,#ea580c,#fb923c);
    }

    .icon-pink{
        background:linear-gradient(135deg,#db2777,#f472b6);
    }

    .icon-red{
        background:linear-gradient(135deg,#dc2626,#fb7185);
    }

    .stat-circle{
        width:60px;
        height:60px;
        border-radius:50%;
        border:6px solid rgba(255,255,255,0.12);
        border-top-color:#60a5fa;
    }

    .stat-card h3{
        color:#fff;
        font-size:32px;
        font-weight:800;
        margin-bottom:6px;
    }

    .stat-card p{
        color:#cbd5e1;
        margin:0;
        font-size:14px;
    }

    /* =======================
        CHARTS SECTION
    ======================== */

    .chart-grid{
        display:grid;
        grid-template-columns:2fr 1fr;
        gap:24px;
        margin-bottom:30px;
    }

    .glass-card{
        padding:25px;
        border-radius:26px;
        background:linear-gradient(145deg,rgba(255,255,255,0.10),rgba(255,255,255,0.03));
        border:1px solid rgba(255,255,255,0.08);
        backdrop-filter:blur(16px);
        box-shadow:0 10px 30px rgba(0,0,0,0.30);
    }

    .card-header{
        display:flex;
        align-items:center;
        justify-content:space-between;
        margin-bottom:25px;
    }

    .card-header h4{
        color:#fff;
        font-size:22px;
        font-weight:700;
        margin:0;
    }

    .card-header span{
        color:#94a3b8;
        font-size:13px;
    }

    /* =======================
        BAR CHART
    ======================== */

    .bar-chart{
        display:flex;
        align-items:flex-end;
        justify-content:space-between;
        gap:16px;
        height:300px;
    }

    .bar-box{
        flex:1;
        text-align:center;
    }

    .bar{
        width:100%;
        border-radius:18px 18px 8px 8px;
        background:linear-gradient(180deg,#60a5fa,#7c3aed);
        box-shadow:0 10px 20px rgba(96,165,250,0.35);
        animation:grow 1.4s ease;
    }

    @keyframes grow{
        from{
            height:0;
        }
    }

    .bar-label{
        color:#cbd5e1;
        margin-top:12px;
        font-size:13px;
    }

    /* =======================
        CATEGORY CIRCLE
    ======================== */

    .circle-wrapper{
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top:10px;
    }

    .circle-chart{
        width:240px;
        height:240px;
        border-radius:50%;
        background:
        conic-gradient(
            #3b82f6 0% 18%,
            #8b5cf6 18% 36%,
            #10b981 36% 52%,
            #f97316 52% 68%,
            #ec4899 68% 84%,
            #facc15 84% 100%
        );
        display:flex;
        align-items:center;
        justify-content:center;
        box-shadow:0 15px 30px rgba(0,0,0,0.35);
    }

    .circle-inner{
        width:150px;
        height:150px;
        border-radius:50%;
        background:#111827;
        display:flex;
        align-items:center;
        justify-content:center;
        flex-direction:column;
    }

    .circle-inner h2{
        color:#fff;
        font-size:34px;
        margin:0;
    }

    .circle-inner p{
        color:#94a3b8;
        margin:0;
    }

    /* =======================
        CATEGORY GRID
    ======================== */

    .category-grid{
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(180px,1fr));
        gap:18px;
        margin-top:30px;
    }

    .category-card{
        position:relative;
        overflow:hidden;
        padding:22px;
        border-radius:22px;
        background:linear-gradient(145deg,rgba(255,255,255,0.08),rgba(255,255,255,0.03));
        border:1px solid rgba(255,255,255,0.07);
        transition:0.4s ease;
    }

    .category-card:hover{
        transform:translateY(-6px);
    }

    .category-icon{
        width:55px;
        height:55px;
        border-radius:18px;
        display:flex;
        align-items:center;
        justify-content:center;
        color:#fff;
        font-size:22px;
        margin-bottom:18px;
    }

    .category-card h5{
        color:#fff;
        font-size:18px;
        margin-bottom:6px;
    }

    .category-card p{
        color:#94a3b8;
        margin:0;
        font-size:13px;
    }

    /* =======================
        TABLE SECTION
    ======================== */

    .table-responsive{
        overflow:auto;
    }

    .modern-table{
        width:100%;
        border-collapse:separate;
        border-spacing:0 14px;
    }

    .modern-table thead th{
        color:#cbd5e1;
        font-size:14px;
        font-weight:600;
        padding:0 15px;
    }

    .modern-table tbody tr{
        background:rgba(255,255,255,0.05);
        transition:0.3s ease;
    }

    .modern-table tbody tr:hover{
        background:rgba(255,255,255,0.08);
    }

    .modern-table tbody td{
        padding:18px 15px;
        color:#fff;
    }

    .modern-table tbody tr td:first-child{
        border-radius:14px 0 0 14px;
    }

    .modern-table tbody tr td:last-child{
        border-radius:0 14px 14px 0;
    }

    .status-badge{
        padding:8px 14px;
        border-radius:30px;
        font-size:12px;
        font-weight:600;
    }

    .success{
        background:rgba(16,185,129,0.15);
        color:#34d399;
    }

    .pending{
        background:rgba(249,115,22,0.15);
        color:#fb923c;
    }

    /* =======================
        RESPONSIVE
    ======================== */

    @media(max-width:992px){

        .chart-grid{
            grid-template-columns:1fr;
        }

        .welcome-title{
            font-size:30px;
        }
    }

    @media(max-width:768px){

        .dashboard-wrapper{
            padding:16px;
        }

        .welcome-card{
            padding:24px;
        }

        .welcome-title{
            font-size:24px;
        }

        .stat-card h3{
            font-size:26px;
        }

        .circle-chart{
            width:190px;
            height:190px;
        }

        .circle-inner{
            width:120px;
            height:120px;
        }

    }

</style>

<div class="dashboard-wrapper">

    <!-- =======================
            WELCOME CARD
    ======================== -->

    <div class="welcome-card">

        <div class="welcome-flex">

            <div>

                <h1 class="welcome-title">
                    Welcome Back,
                    <span>Admin</span>
                </h1>

                <p class="welcome-text">
                    Manage quotations, billing, customer records, tile stock,
                    sanitary products, inventory reports, sales analytics and
                    complete tile showroom operations from one premium dashboard.
                </p>

            </div>

            <div class="today-box">

                <h5>Today's Revenue</h5>

                <h2>₹ 2,45,800</h2>

            </div>

        </div>

    </div>

    <!-- =======================
            TOP STATS
    ======================== -->

    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon icon-blue">
                    <i class="fa-solid fa-users"></i>
                </div>

                <div class="stat-circle"></div>

            </div>

            <h3>1,280</h3>

            <p>Total Customers</p>

        </div>

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon icon-green">
                    <i class="fa-solid fa-file-invoice"></i>
                </div>

                <div class="stat-circle"></div>

            </div>

            <h3>860</h3>

            <p>Total Quotations</p>

        </div>

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon icon-purple">
                    <i class="fa-solid fa-money-bill-wave"></i>
                </div>

                <div class="stat-circle"></div>

            </div>

            <h3>₹ 18L</h3>

            <p>Total Sales</p>

        </div>

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon icon-orange">
                    <i class="fa-solid fa-layer-group"></i>
                </div>

                <div class="stat-circle"></div>

            </div>

            <h3>3,450</h3>

            <p>Tile Stocks</p>

        </div>

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon icon-pink">
                    <i class="fa-solid fa-sink"></i>
                </div>

                <div class="stat-circle"></div>

            </div>

            <h3>540</h3>

            <p>Sanitary Items</p>

        </div>

        <div class="stat-card">

            <div class="stat-top">

                <div class="stat-icon icon-red">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>

                <div class="stat-circle"></div>

            </div>

            <h3>28</h3>

            <p>Low Stock Alerts</p>

        </div>

    </div>

    <!-- =======================
            CHARTS SECTION
    ======================== -->

    <div class="chart-grid">

        <!-- SALES CHART -->

        <div class="glass-card">

            <div class="card-header">

                <h4>Monthly Sales Analytics</h4>

                <span>2026 Overview</span>

            </div>

            <div class="bar-chart">

                <div class="bar-box">
                    <div class="bar" style="height:55%;"></div>
                    <div class="bar-label">Jan</div>
                </div>

                <div class="bar-box">
                    <div class="bar" style="height:72%;"></div>
                    <div class="bar-label">Feb</div>
                </div>

                <div class="bar-box">
                    <div class="bar" style="height:85%;"></div>
                    <div class="bar-label">Mar</div>
                </div>

                <div class="bar-box">
                    <div class="bar" style="height:66%;"></div>
                    <div class="bar-label">Apr</div>
                </div>

                <div class="bar-box">
                    <div class="bar" style="height:90%;"></div>
                    <div class="bar-label">May</div>
                </div>

                <div class="bar-box">
                    <div class="bar" style="height:75%;"></div>
                    <div class="bar-label">Jun</div>
                </div>

            </div>

        </div>

        <!-- CATEGORY CHART -->

        <div class="glass-card">

            <div class="card-header">

                <h4>Tile Categories</h4>

                <span>Stock Ratio</span>

            </div>

            <div class="circle-wrapper">

                <div class="circle-chart">

                    <div class="circle-inner">

                        <h2>68%</h2>

                        <p>In Stock</p>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- =======================
            CATEGORY ITEMS
    ======================== -->

    <div class="category-grid">

        <div class="category-card">

            <div class="category-icon icon-blue">
                <i class="fa-solid fa-border-all"></i>
            </div>

            <h5>Floor Tiles</h5>

            <p>850 Available</p>

        </div>

        <div class="category-card">

            <div class="category-icon icon-purple">
                <i class="fa-solid fa-table-cells-large"></i>
            </div>

            <h5>Wall Tiles</h5>

            <p>620 Available</p>

        </div>

        <div class="category-card">

            <div class="category-icon icon-orange">
                <i class="fa-solid fa-kitchen-set"></i>
            </div>

            <h5>Kitchen Tiles</h5>

            <p>310 Available</p>

        </div>

        <div class="category-card">

            <div class="category-icon icon-green">
                <i class="fa-solid fa-car-side"></i>
            </div>

            <h5>Parking Tiles</h5>

            <p>420 Available</p>

        </div>

        <div class="category-card">

            <div class="category-icon icon-pink">
                <i class="fa-solid fa-shower"></i>
            </div>

            <h5>Bathroom Tiles</h5>

            <p>280 Available</p>

        </div>

        <div class="category-card">

            <div class="category-icon icon-red">
                <i class="fa-solid fa-image"></i>
            </div>

            <h5>Picture Tiles</h5>

            <p>95 Available</p>

        </div>

    </div>

    <!-- =======================
            RECENT BILL TABLE
    ======================== -->

    <div class="glass-card mt-4">

        <div class="card-header">

            <h4>Recent Quotations & Bills</h4>

            <span>Latest Transactions</span>

        </div>

        <div class="table-responsive">

            <table class="modern-table">

                <thead>
                    <tr>
                        <th>Quotation No</th>
                        <th>Customer</th>
                        <th>Tile Type</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>QUOT260521001</td>
                        <td>Arun Kumar</td>
                        <td>Floor Tile</td>
                        <td>₹ 48,500</td>
                        <td>
                            <span class="status-badge success">
                                Completed
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td>QUOT260521002</td>
                        <td>Praveen</td>
                        <td>Kitchen Tile</td>
                        <td>₹ 22,300</td>
                        <td>
                            <span class="status-badge pending">
                                Pending
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <td>QUOT260521003</td>
                        <td>Sathish</td>
                        <td>Bathroom Tile</td>
                        <td>₹ 16,700</td>
                        <td>
                            <span class="status-badge success">
                                Completed
                            </span>
                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection