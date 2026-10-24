@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

<style>

 /* ===================================
    GOOGLE FONT
=================================== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

/* ===================================
    GLOBAL
=================================== */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Poppins',sans-serif;
    background:#f4f7fb;
    color:#1e293b;
    overflow-x:hidden;
}

a{
    text-decoration:none;
}

.dashboard-wrapper{
    padding:18px;
    min-height:100vh;
}

/* ===================================
    HERO SECTION
=================================== */

.hero-section{
    display:grid;
    grid-template-columns:2fr 1fr;
    gap:18px;
    margin-bottom:20px;
}

.welcome-card{
    background:linear-gradient(135deg,#2563eb,#4f46e5);
    border-radius:20px;
    padding:28px;
    position:relative;
    overflow:hidden;
    min-height:220px;
}

.welcome-card::before{
    content:'';
    position:absolute;
    width:260px;
    height:260px;
    border-radius:50%;
    background:rgba(255,255,255,0.08);
    top:-90px;
    right:-90px;
}

.welcome-card::after{
    content:'';
    position:absolute;
    width:180px;
    height:180px;
    border-radius:50%;
    background:rgba(255,255,255,0.05);
    bottom:-80px;
    left:-80px;
}

.welcome-content{
    position:relative;
    z-index:2;
}

.welcome-content h1{
    font-size:28px;
    font-weight:600;
    color:#fff;
    line-height:1.4;
    margin-bottom:12px;
}

.welcome-content p{
    font-size:13px;
    color:#dbeafe;
    line-height:1.7;
    width:75%;
}

.quick-actions{
    display:flex;
    gap:12px;
    margin-top:20px;
    flex-wrap:wrap;
}

.action-btn{
    padding:10px 18px;
    border-radius:10px;
    display:flex;
    align-items:center;
    gap:8px;
    font-size:13px;
    font-weight:500;
    transition:0.3s;
}

.action-btn:hover{
    transform:translateY(-2px);
}

.btn-primary-dashboard{
    background:#fff;
    color:#2563eb;
}

.btn-secondary-dashboard{
    background:rgba(255,255,255,0.12);
    border:1px solid rgba(255,255,255,0.15);
    color:#fff;
}

/* ===================================
    SUMMARY BOX
=================================== */

.side-summary{
    display:flex;
    flex-direction:column;
    gap:18px;
}

.summary-box{
    background:#fff;
    border-radius:18px;
    padding:22px;
    border:1px solid #e2e8f0;
    box-shadow:0 2px 10px rgba(0,0,0,0.04);
}

.summary-box h5{
    font-size:12px;
    color:#64748b;
    margin-bottom:8px;
    font-weight:500;
}

.summary-box h2{
    font-size:24px;
    color:#111827;
    margin-bottom:6px;
    font-weight:600;
}

.summary-box p{
    font-size:12px;
    color:#94a3b8;
}

/* ===================================
    STATS GRID
=================================== */

.stats-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:18px;
    margin-bottom:20px;
}

.stat-card{
    background:#fff;
    border-radius:18px;
    padding:20px;
    border:1px solid #e5e7eb;
    box-shadow:0 2px 10px rgba(0,0,0,0.04);
    transition:0.3s;
}

.stat-card:hover{
    transform:translateY(-3px);
}

.stat-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:16px;
}

.stat-title{
    font-size:12px;
    color:#64748b;
    margin-bottom:6px;
}

.stat-value{
    font-size:26px;
    font-weight:600;
    color:#111827;
}

.stat-growth{
    font-size:12px;
    color:#16a34a;
    font-weight:500;
}

.stat-icon{
    width:52px;
    height:52px;
    border-radius:14px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:18px;
}

.bg-purple{
    background:#8b5cf6;
}

.bg-blue{
    background:#3b82f6;
}

.bg-green{
    background:#10b981;
}

.bg-orange{
    background:#f97316;
}

/* ===================================
    COMMON CARD STYLE
=================================== */

.chart-card,
.stock-card,
.activity-card,
.top-product-card,
.glass-card,
.analytics-card,
.mini-sales-card{
    background:#fff;
    border-radius:18px;
    border:1px solid #e5e7eb;
    box-shadow:0 2px 10px rgba(0,0,0,0.04);
}

/* ===================================
    CHART GRID
=================================== */

.chart-grid{
    display:grid;
    grid-template-columns:2fr 1fr;
    gap:18px;
    margin-bottom:20px;
}

.chart-card{
    padding:22px;
}

.card-title{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.card-title h3{
    font-size:18px;
    font-weight:600;
    color:#111827;
}

/* ===================================
    BAR CHART
=================================== */

.bar-chart{
    height:240px;
    display:flex;
    align-items:flex-end;
    gap:12px;
}

.bar-box{
    flex:1;
    text-align:center;
}

.bar{
    width:100%;
    border-radius:8px 8px 4px 4px;
    background:linear-gradient(to top,#2563eb,#60a5fa);
    transition:0.3s;
}

.bar:hover{
    opacity:0.9;
}

.bar-label{
    margin-top:8px;
    font-size:11px;
    color:#64748b;
}

/* ===================================
    PIE CHART
=================================== */

.pie-wrapper{
    display:flex;
    flex-direction:column;
    align-items:center;
}

.pie-chart{
    width:180px;
    height:180px;
    border-radius:50%;
    background:
    conic-gradient(
        #8b5cf6 0% 40%,
        #3b82f6 40% 65%,
        #10b981 65% 80%,
        #f97316 80% 100%
    );
    position:relative;
}

.pie-chart::before{
    content:'';
    position:absolute;
    width:90px;
    height:90px;
    border-radius:50%;
    background:#fff;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
}

.pie-center{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    text-align:center;
    z-index:2;
}

.pie-center h2{
    font-size:18px;
    color:#111827;
}

.pie-center p{
    font-size:11px;
    color:#64748b;
}

.legend-list{
    width:100%;
    margin-top:18px;
}

.legend-item{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:10px;
    font-size:12px;
}

.legend-left{
    display:flex;
    align-items:center;
    gap:8px;
}

.legend-dot{
    width:10px;
    height:10px;
    border-radius:50%;
}

/* ===================================
    STOCK SECTION
=================================== */

.stock-section{
    margin-bottom:20px;
}

.stock-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:18px;
}

.stock-card{
    padding:20px;
}

.stock-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:14px;
}

.stock-icon{
    width:50px;
    height:50px;
    border-radius:14px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:18px;
}

.stock-card h4{
    font-size:16px;
    margin-bottom:5px;
}

.stock-card p{
    font-size:12px;
    color:#64748b;
    margin-bottom:12px;
}

.progress{
    width:100%;
    height:7px;
    background:#e2e8f0;
    border-radius:30px;
    overflow:hidden;
}

.progress-bar{
    height:100%;
    border-radius:30px;
}

/* ===================================
    BOTTOM GRID
=================================== */

.bottom-grid{
    display:grid;
    grid-template-columns:1.5fr 1fr;
    gap:18px;
    margin-bottom:20px;
}

.activity-card,
.top-product-card{
    padding:22px;
}

/* ===================================
    ACTIVITY
=================================== */

.activity-item{
    display:flex;
    gap:12px;
    padding:14px 0;
    border-bottom:1px solid #f1f5f9;
}

.activity-item:last-child{
    border:none;
}

.activity-icon{
    width:46px;
    height:46px;
    border-radius:12px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:16px;
}

.activity-content h5{
    font-size:14px;
    color:#111827;
    margin-bottom:4px;
}

.activity-content p{
    font-size:12px;
    color:#64748b;
}

/* ===================================
    PRODUCT SECTION
=================================== */

.product-item{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:18px;
}

.product-left{
    display:flex;
    align-items:center;
    gap:12px;
}

.product-img{
    width:48px;
    height:48px;
    border-radius:12px;
    background:#dbeafe;
}

.product-text h5{
    font-size:13px;
    margin-bottom:4px;
}

.product-text p{
    font-size:11px;
    color:#64748b;
}

.product-growth{
    font-size:12px;
    color:#16a34a;
    font-weight:600;
}

/* ===================================
    ADVANCED CHART
=================================== */

.advanced-chart-grid{
    display:grid;
    grid-template-columns:2fr 1fr;
    gap:18px;
    margin-bottom:20px;
}

.glass-card{
    padding:24px;
}

.glass-title{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.glass-title h2{
    font-size:20px;
    color:#111827;
    margin-bottom:4px;
}

.glass-title p{
    font-size:12px;
    color:#64748b;
}

.graph-badge{
    width:52px;
    height:52px;
    border-radius:14px;
    background:#2563eb;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
}

.wave-chart{
    width:100%;
    height:300px;
}

.month-points{
    display:flex;
    justify-content:space-between;
    gap:10px;
    margin-top:10px;
}

.month-box{
    flex:1;
    text-align:center;
}

.month-name{
    font-size:11px;
    color:#64748b;
    margin-bottom:5px;
}

.month-value{
    font-size:12px;
    color:#111827;
    font-weight:600;
}

/* ===================================
    MINI SALES CARD
=================================== */

.sales-right-grid{
    display:flex;
    flex-direction:column;
    gap:18px;
}

.mini-sales-card{
    padding:22px;
}

.mini-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:14px;
}

.mini-icon{
    width:50px;
    height:50px;
    border-radius:14px;
    background:#2563eb;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
}

.mini-percent{
    font-size:12px;
    color:#16a34a;
    font-weight:600;
}

.mini-sales-card h4{
    font-size:12px;
    color:#64748b;
    margin-bottom:6px;
}

.mini-sales-card h1{
    font-size:26px;
    color:#111827;
    margin-bottom:6px;
}

.mini-sales-card p{
    font-size:12px;
    color:#94a3b8;
}

/* ===================================
    ANALYTICS GRID
=================================== */

.analytics-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:18px;
}

.analytics-card{
    padding:20px;
    position:relative;
    overflow:hidden;
}

.analytics-top{
    display:flex;
    justify-content:space-between;
    gap:12px;
}

.analytics-card h5{
    font-size:12px;
    color:#64748b;
    margin-bottom:6px;
}

.analytics-card h2{
    font-size:24px;
    color:#111827;
    margin-bottom:6px;
}

.analytics-card p{
    font-size:12px;
    color:#94a3b8;
    line-height:1.6;
}

.analytics-icon{
    width:50px;
    height:50px;
    border-radius:14px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:18px;
}

.wave-bg{
    position:absolute;
    right:12px;
    bottom:-10px;
    font-size:70px;
    color:#f1f5f9;
}

/* ===================================
    RESPONSIVE
=================================== */

@media(max-width:1100px){

    .hero-section,
    .chart-grid,
    .bottom-grid,
    .advanced-chart-grid{
        grid-template-columns:1fr;
    }

}

@media(max-width:768px){

    .dashboard-wrapper{
        padding:12px;
    }

    .welcome-content h1{
        font-size:22px;
    }

    .welcome-content p{
        width:100%;
    }

    .quick-actions{
        flex-direction:column;
    }

    .action-btn{
        width:100%;
        justify-content:center;
    }

    .bar-chart{
        height:180px;
    }

    .month-points{
        flex-wrap:wrap;
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
           <div class="glass-card">     
               <div class="glass-title">  
                          <div>          
                                  <h2>    Sales Performance Analytics                </h2>                <p>                    Monthly Revenue Growth • 2026                </p>            </div>            <div class="graph-badge">                <i class="fa-solid fa-chart-line"></i>            </div>        </div>        <div class="wave-chart-wrapper">            <svg class="wave-chart"            viewBox="0 0 1200 360">                <!-- GRID -->                <line x1="0" y1="300"                x2="1200" y2="300"                stroke="rgba(255,255,255,0.08)"                stroke-width="2"/>                <line x1="0" y1="220"                x2="1200" y2="220"                stroke="rgba(255,255,255,0.05)"                stroke-width="1"/>                <line x1="0" y1="140"                x2="1200" y2="140"                stroke="rgba(255,255,255,0.05)"                stroke-width="1"/>                <line x1="0" y1="60"                x2="1200" y2="60"                stroke="rgba(255,255,255,0.05)"                stroke-width="1"/>                <!-- AREA -->                <path                d="                M0 250                C100 170 180 120 260 170                S420 300 520 190                S700 40 820 120                S980 320 1200 130                L1200 360                L0 360 Z"                fill="url(#waveGradient)"                opacity="0.25"/>                <!-- MAIN LINE -->                <path                d="                M0 250                C100 170 180 120 260 170                S420 300 520 190                S700 40 820 120                S980 320 1200 130"                fill="none"                stroke="url(#lineGradient)"                stroke-width="8"                stroke-linecap="round"/>                <!-- POINTS -->                <circle cx="0" cy="250" r="10"                fill="#06b6d4"/>                <circle cx="260" cy="170" r="10"                fill="#8b5cf6"/>                <circle cx="520" cy="190" r="10"                fill="#06b6d4"/>                <circle cx="820" cy="120" r="10"                fill="#8b5cf6"/>                <circle cx="1200" cy="130" r="10"                fill="#06b6d4"/>                <!-- GRADIENT -->                <defs>                    <linearGradient                    id="lineGradient"                    x1="0%"                    y1="0%"                    x2="100%"                    y2="0%">                        <stop offset="0%"                        stop-color="#06b6d4"/>                        <stop offset="50%"                        stop-color="#7c3aed"/>                        <stop offset="100%"                        stop-color="#60a5fa"/>                    </linearGradient>                    <linearGradient                    id="waveGradient"                    x1="0%"                    y1="0%"                    x2="0%"                    y2="100%">                        <stop offset="0%"                        stop-color="#8b5cf6"/>                        <stop offset="100%"                        stop-color="transparent"/>                    </linearGradient>                </defs>            </svg>            <!-- MONTH VALUES -->            <div class="month-points">                <div class="month-box">                    <div class="month-name">Jan</div>                    <div class="month-value">₹1.2L</div>                </div>                <div class="month-box">                    <div class="month-name">Feb</div>                    <div class="month-value">₹1.8L</div>                </div>                <div class="month-box">                    <div class="month-name">Mar</div>                    <div class="month-value">₹2.1L</div>                </div>                <div class="month-box">                    <div class="month-name">Apr</div>                    <div class="month-value">₹1.6L</div>                </div>                <div class="month-box">                    <div class="month-name">May</div>                    <div class="month-value">₹2.7L</div>                </div>                <div class="month-box">                    <div class="month-name">Jun</div>                    <div class="month-value">₹3.2L</div>                </div>                <div class="month-box">                    <div class="month-name">Jul</div>                    <div class="month-value">₹2.5L</div>                </div>                <div class="month-box">                    <div class="month-name">Aug</div>                    <div class="month-value">₹3.8L</div>                </div>            </div>        </div>    </div>    <!-- RIGHT SIDE CARDS -->    <div class="sales-right-grid">        <div class="mini-sales-card">            <div class="mini-top">                <div class="mini-icon">                    <i class="fa-solid fa-wallet"></i>                </div>                <div class="mini-percent">                    +24.8%                </div>            </div>            <h4>                Total Annual Revenue            </h4>            <h1>                ₹24.5L            </h1>            <p>                Compared to last financial year            </p>        </div>        <div class="mini-sales-card">            <div class="mini-top">                <div class="mini-icon">                    <i class="fa-solid fa-boxes-stacked"></i>                </div>                <div class="mini-percent">                    +18.2%                </div>            </div>            <h4>                Total Tile Stock            </h4>            <h1>                32K            </h1>            <p>                Sq.ft tiles available in warehouse            </p>        </div>    </div></div><!-- =========================    EXTRA ANALYTICS========================= --><div class="analytics-grid">    <div class="analytics-card">        <div class="analytics-top">            <div>                <h5>                    Floor Tile Sales                </h5>                <h2>                    ₹8.6L                </h2>                <p>                    Premium vitrified tiles performance                </p>            </div>            <div class="analytics-icon"            style="background:linear-gradient(135deg,#7c3aed,#8b5cf6);">                <i class="fa-solid fa-border-all"></i>            </div>        </div>        <div class="wave-bg">            ≋        </div>    </div>    <div class="analytics-card">        <div class="analytics-top">            <div>                <h5>                    Wall Tile Revenue                </h5>                <h2>                    ₹5.2L                </h2>                <p>                    Luxury glossy wall collections                </p>            </div>            <div class="analytics-icon"            style="background:linear-gradient(135deg,#2563eb,#06b6d4);">                <i class="fa-solid fa-table-cells-large"></i>            </div>        </div>        <div class="wave-bg">            ≋        </div>    </div>    <div class="analytics-card">        <div class="analytics-top">            <div>                <h5>                    Bathroom Tile Sales                </h5>                <h2>                    ₹3.9L                </h2>                <p>                    Anti-skid designer bathroom tiles                </p>            </div>            <div class="analytics-icon"            style="background:linear-gradient(135deg,#f97316,#fb923c);">                <i class="fa-solid fa-bath"></i>            </div>        </div>        <div class="wave-bg">            ≋        </div>    </div>    <div class="analytics-card">        <div class="analytics-top">            <div>                <h5>                    Parking Tile Sales                </h5>                <h2>                    ₹6.8L                </h2>                <p>                    Heavy-duty outdoor parking tiles                </p>            </div>            <div class="analytics-icon"            style="background:linear-gradient(135deg,#10b981,#22c55e);">                <i class="fa-solid fa-square-parking"></i>            </div>        </div>        <div class="wave-bg">            ≋        </div>    </div></div>

</div>

@endsection

