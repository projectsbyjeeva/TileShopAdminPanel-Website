@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

<style>

/* ===========================
   RESET & BASE
=========================== */
*{margin:0;padding:0;box-sizing:border-box;}

:root{
    --sidebar-bg:   #0d4f4a;
    --sidebar-dark: #0a3d39;
    --sidebar-w:    260px;
    --accent:       #2dd4bf;
    --accent-hover: #14b8a6;
    --accent-soft:  rgba(45,212,191,0.12);
    --accent-text:  #2dd4bf;
    --bg:           #f0f4f3;
    --card:         #ffffff;
    --border:       #e0e9e7;
    --text:         #1a2e2c;
    --muted:        #6b8784;
    --green:        #059669;
    --red:          #dc2626;
    --orange:       #ea580c;
    --blue:         #0ea5e9;
    --topbar-h:     68px;
}

body{
    font-family:'DM Sans',sans-serif;
    background:var(--bg);
    color:var(--text);
    overflow-x:hidden;
}

a{text-decoration:none;color:inherit;}

/* ===========================
   LAYOUT SHELL
=========================== */
.shell{
    display:flex;
    min-height:100vh;
}

/* ===========================
   SIDEBAR
=========================== */
.sidebar{
    width:var(--sidebar-w);
    min-width:var(--sidebar-w);
    background:var(--sidebar-bg);
    display:flex;
    flex-direction:column;
    position:fixed;
    top:0;left:0;
    height:100vh;
    z-index:200;
    transition:transform 0.3s cubic-bezier(.4,0,.2,1),
               min-width 0.3s,width 0.3s;
    overflow:hidden;
}

.sidebar.closed{
    transform:translateX(-100%);
}

/* LOGO */
.sidebar-logo{
    display:flex;
    align-items:center;
    gap:13px;
    padding:22px 18px 20px;
    border-bottom:1px solid rgba(255,255,255,0.07);
    flex-shrink:0;
}

.logo-gem{
    width:44px;height:44px;
    border-radius:13px;
    background:var(--accent);
    display:flex;align-items:center;justify-content:center;
    flex-shrink:0;
}

.logo-gem i{
    font-size:20px;
    color:var(--sidebar-bg);
}

.logo-words{line-height:1.25;}

.logo-main{
    font-family:'Playfair Display',serif;
    font-size:16px;
    color:#ffffff;
    white-space:nowrap;
}

.logo-sub{
    font-size:10.5px;
    color:var(--accent);
    letter-spacing:0.5px;
    margin-top:1px;
}

/* SECTION LABEL */
.nav-section{
    padding:18px 18px 6px;
    font-size:10px;
    letter-spacing:1.4px;
    color:rgba(255,255,255,0.25);
    text-transform:uppercase;
    font-weight:500;
}

/* NAV ITEMS */
.nav-item{
    display:flex;
    align-items:center;
    gap:11px;
    padding:10px 14px;
    margin:2px 8px;
    border-radius:10px;
    cursor:pointer;
    font-size:13.5px;
    color:rgba(255,255,255,0.55);
    transition:all 0.2s;
    position:relative;
    white-space:nowrap;
}

.nav-item i{
    font-size:16px;
    min-width:20px;
    text-align:center;
}

.nav-item:hover{
    background:var(--accent-soft);
    color:rgba(255,255,255,0.9);
}

.nav-item.active{
    background:var(--accent-soft);
    color:var(--accent-text);
}

.nav-item.active::before{
    content:'';
    position:absolute;
    left:0;top:50%;
    transform:translateY(-50%);
    width:3px;height:22px;
    background:var(--accent);
    border-radius:0 3px 3px 0;
}

.nav-badge{
    margin-left:auto;
    font-size:10px;
    padding:2px 8px;
    border-radius:20px;
    font-weight:600;
    background:rgba(45,212,191,0.15);
    color:var(--accent-text);
}

.nav-badge.red{
    background:rgba(220,38,38,0.15);
    color:#f87171;
}

/* SIDEBAR FOOTER */
.sidebar-footer{
    margin-top:auto;
    padding:14px 10px;
    border-top:1px solid rgba(255,255,255,0.06);
    flex-shrink:0;
}

.sidebar-footer-link{
    display:flex;
    align-items:center;
    gap:11px;
    padding:9px 12px;
    border-radius:10px;
    font-size:13px;
    color:rgba(255,255,255,0.45);
    cursor:pointer;
    transition:all 0.2s;
}

.sidebar-footer-link:hover{
    background:rgba(255,255,255,0.06);
    color:rgba(255,255,255,0.75);
}

.sidebar-footer-link i{font-size:16px;}

/* ===========================
   OVERLAY
=========================== */
.overlay{
    display:none;
    position:fixed;
    inset:0;
    background:rgba(0,0,0,0.4);
    z-index:199;
}

.overlay.show{display:block;}

/* ===========================
   MAIN AREA
=========================== */
.main{
    flex:1;
    margin-left:var(--sidebar-w);
    display:flex;
    flex-direction:column;
    min-height:100vh;
    transition:margin-left 0.3s cubic-bezier(.4,0,.2,1);
}

.main.expanded{
    margin-left:0;
}

/* ===========================
   TOPBAR
=========================== */
.topbar{
    height:var(--topbar-h);
    background:var(--card);
    border-bottom:1px solid var(--border);
    display:flex;
    align-items:center;
    gap:14px;
    padding:0 22px;
    position:sticky;
    top:0;
    z-index:100;
}

.toggle-btn{
    width:38px;height:38px;
    border-radius:9px;
    border:1px solid var(--border);
    background:transparent;
    cursor:pointer;
    display:flex;align-items:center;justify-content:center;
    color:var(--text);
    font-size:17px;
    transition:all 0.2s;
    flex-shrink:0;
}

.toggle-btn:hover{background:var(--bg);}

.topbar-title{
    font-family:'Playfair Display',serif;
    font-size:19px;
    font-weight:600;
    color:var(--text);
}

.topbar-date{
    font-size:12px;
    color:var(--muted);
    margin-left:4px;
}

.topbar-spacer{flex:1;}

.topbar-actions{
    display:flex;
    align-items:center;
    gap:10px;
}

/* ICON BUTTON */
.icon-btn{
    width:38px;height:38px;
    border-radius:9px;
    border:1px solid var(--border);
    background:#fff;
    display:flex;align-items:center;justify-content:center;
    font-size:15px;
    color:var(--muted);
    cursor:pointer;
    transition:all 0.2s;
    position:relative;
}

.icon-btn:hover{border-color:var(--accent);color:var(--accent);}

.notif-dot{
    position:absolute;
    top:7px;right:7px;
    width:8px;height:8px;
    border-radius:50%;
    background:#ef4444;
    border:2px solid #fff;
}

/* NEW QUOTATION BUTTON */
.new-btn{
    height:38px;
    padding:0 16px;
    border-radius:9px;
    background:var(--sidebar-bg);
    color:#fff;
    border:none;
    font-size:13px;
    font-family:'DM Sans',sans-serif;
    font-weight:500;
    cursor:pointer;
    display:flex;align-items:center;gap:7px;
    transition:all 0.2s;
}

.new-btn:hover{
    background:var(--sidebar-dark);
    transform:translateY(-1px);
}

/* ===========================
   PROFILE DROPDOWN (right)
=========================== */
.profile-wrap{
    position:relative;
}

.profile-trigger{
    display:flex;
    align-items:center;
    gap:9px;
    padding:5px 10px 5px 5px;
    border-radius:40px;
    border:1px solid var(--border);
    background:#fff;
    cursor:pointer;
    transition:all 0.2s;
}

.profile-trigger:hover{border-color:var(--accent);}

.profile-avatar{
    width:34px;height:34px;
    border-radius:50%;
    background:linear-gradient(135deg,#0d9488,#0891b2);
    display:flex;align-items:center;justify-content:center;
    color:#fff;
    font-size:13px;
    font-weight:600;
    flex-shrink:0;
}

.profile-trigger-name{
    font-size:13px;
    font-weight:500;
    color:var(--text);
}

.profile-trigger-role{
    font-size:10.5px;
    color:var(--muted);
}

.profile-trigger i.chevron{
    font-size:12px;
    color:var(--muted);
    margin-left:2px;
    transition:transform 0.2s;
}

.profile-wrap.open .profile-trigger i.chevron{
    transform:rotate(180deg);
}

/* DROPDOWN PANEL */
.profile-dropdown{
    position:absolute;
    top:calc(100% + 10px);
    right:0;
    width:220px;
    background:#fff;
    border:1px solid var(--border);
    border-radius:14px;
    box-shadow:0 10px 30px rgba(0,0,0,0.10);
    overflow:hidden;
    opacity:0;
    visibility:hidden;
    transform:translateY(8px);
    transition:all 0.2s;
    z-index:999;
}

.profile-wrap.open .profile-dropdown{
    opacity:1;
    visibility:visible;
    transform:translateY(0);
}

.pd-header{
    padding:14px 16px;
    border-bottom:1px solid var(--border);
    background:#f8faf9;
}

.pd-name{
    font-size:14px;
    font-weight:600;
    color:var(--text);
    margin-bottom:3px;
}

.pd-email{
    font-size:11.5px;
    color:var(--muted);
}

.pd-role-badge{
    display:inline-block;
    margin-top:6px;
    font-size:10px;
    padding:2px 8px;
    border-radius:20px;
    background:rgba(13,79,74,0.1);
    color:var(--sidebar-bg);
    font-weight:600;
}

.pd-items{padding:6px;}

.pd-item{
    display:flex;
    align-items:center;
    gap:10px;
    padding:9px 12px;
    border-radius:8px;
    font-size:13px;
    color:var(--text);
    cursor:pointer;
    transition:all 0.2s;
}

.pd-item i{font-size:14px;color:var(--muted);min-width:16px;}

.pd-item:hover{background:var(--bg);}

.pd-divider{height:1px;background:var(--border);margin:4px 0;}

.pd-item.logout{color:var(--red);}
.pd-item.logout i{color:var(--red);}
.pd-item.logout:hover{background:#fff5f5;}

/* ===========================
   CONTENT
=========================== */
.content{
    padding:20px 22px 30px;
    flex:1;
}

/* ===========================
   WELCOME BANNER
=========================== */
.welcome-card{
    background:var(--sidebar-bg);
    border-radius:18px;
    padding:26px 28px;
    margin-bottom:18px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:20px;
    position:relative;
    overflow:hidden;
}

.welcome-card::before{
    content:'TILES';
    position:absolute;
    right:-15px;top:50%;
    transform:translateY(-50%);
    font-family:'Playfair Display',serif;
    font-size:90px;font-weight:700;
    color:rgba(255,255,255,0.03);
    letter-spacing:-3px;
    white-space:nowrap;
    pointer-events:none;
}

.welcome-card::after{
    content:'';
    position:absolute;
    width:220px;height:220px;
    border-radius:50%;
    background:rgba(45,212,191,0.06);
    top:-80px;right:40%;
    pointer-events:none;
}

.wc-left h2{
    font-family:'Playfair Display',serif;
    font-size:24px;
    color:#fff;
    margin-bottom:7px;
}

.wc-left p{
    font-size:13px;
    color:rgba(255,255,255,0.45);
    line-height:1.6;
}

.wc-btns{
    display:flex;gap:10px;margin-top:16px;flex-wrap:wrap;
}

.wc-btn{
    height:36px;padding:0 16px;
    border-radius:8px;
    font-size:13px;font-family:'DM Sans',sans-serif;font-weight:500;
    cursor:pointer;
    display:flex;align-items:center;gap:7px;
    transition:all 0.2s;border:none;
}

.wc-btn.teal{
    background:var(--accent);
    color:var(--sidebar-bg);
}

.wc-btn.teal:hover{background:var(--accent-hover);}

.wc-btn.ghost{
    background:rgba(255,255,255,0.08);
    color:rgba(255,255,255,0.8);
    border:1px solid rgba(255,255,255,0.12);
}

.wc-btn.ghost:hover{background:rgba(255,255,255,0.13);}

.wc-right{
    display:flex;gap:22px;flex-shrink:0;
}

.wc-stat{text-align:right;}

.wcs-val{
    font-family:'Playfair Display',serif;
    font-size:30px;
    color:#fff;
    line-height:1;
}

.wcs-lbl{
    font-size:11px;
    color:rgba(255,255,255,0.35);
    margin-top:4px;
}

.wcs-chg{
    font-size:11px;
    color:var(--accent);
    margin-top:4px;
}

/* ===========================
   STATS GRID
=========================== */
.stats-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:14px;
    margin-bottom:18px;
}

.stat-card{
    background:var(--card);
    border:1px solid var(--border);
    border-radius:15px;
    padding:18px;
    transition:all 0.2s;
    cursor:default;
}

.stat-card:hover{
    transform:translateY(-2px);
    box-shadow:0 8px 24px rgba(0,0,0,0.07);
}

.sc-row{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    margin-bottom:14px;
}

.sc-icon{
    width:42px;height:42px;
    border-radius:12px;
    display:flex;align-items:center;justify-content:center;
    font-size:17px;
    color:#fff;
}

.sc-label{
    font-size:11px;
    color:var(--muted);
    margin-bottom:5px;
}

.sc-val{
    font-family:'Playfair Display',serif;
    font-size:26px;
    color:var(--text);
}

.sc-change{
    display:flex;align-items:center;gap:4px;
    font-size:11px;font-weight:500;
}

.sc-change.up{color:var(--green);}
.sc-change.dn{color:var(--red);}

/* ===========================
   CHART ROW
=========================== */
.chart-row{
    display:grid;
    grid-template-columns:1.6fr 1fr;
    gap:14px;
    margin-bottom:18px;
}

.chart-card{
    background:var(--card);
    border:1px solid var(--border);
    border-radius:15px;
    padding:20px;
}

.cc-head{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:18px;
}

.cc-title{
    font-size:15px;
    font-weight:600;
    color:var(--text);
}

.cc-sub{
    font-size:11px;
    color:var(--muted);
    margin-top:2px;
}

/* BAR CHART */
.bar-chart{
    display:flex;
    align-items:flex-end;
    gap:10px;
    height:170px;
}

.bar-col{
    flex:1;
    display:flex;
    flex-direction:column;
    align-items:center;
    gap:5px;
}

.bar-rect{
    width:100%;
    border-radius:6px 6px 3px 3px;
    transition:opacity 0.2s;
    cursor:pointer;
}

.bar-rect:hover{opacity:0.75;}

.bar-lbl{
    font-size:10px;
    color:var(--muted);
}

.bar-amt{
    font-size:9.5px;
    color:var(--muted);
}

/* DONUT */
.donut-wrap{
    display:flex;
    align-items:center;
    gap:18px;
}

.dl-item{
    display:flex;
    align-items:center;
    gap:8px;
    margin-bottom:11px;
}

.dl-dot{
    width:10px;height:10px;
    border-radius:50%;
    flex-shrink:0;
}

.dl-name{font-size:12.5px;color:var(--text);}

.dl-pct{
    margin-left:auto;
    font-size:12px;
    font-weight:600;
    color:var(--text);
}

.dl-legend{flex:1;}

/* ===========================
   STOCK SECTION
=========================== */
.section-title{
    font-size:16px;
    font-weight:600;
    color:var(--text);
    margin-bottom:14px;
    display:flex;align-items:center;gap:8px;
}

.section-title i{
    font-size:15px;
    color:var(--muted);
}

.stock-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:14px;
    margin-bottom:18px;
}

.stock-card{
    background:var(--card);
    border:1px solid var(--border);
    border-radius:15px;
    padding:16px;
    transition:all 0.2s;
}

.stock-card:hover{
    transform:translateY(-2px);
    box-shadow:0 6px 20px rgba(0,0,0,0.06);
}

.stock-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:12px;
}

.stock-icon{
    width:38px;height:38px;
    border-radius:10px;
    display:flex;align-items:center;justify-content:center;
    font-size:16px;
    color:#fff;
}

.stock-qty{
    font-size:11px;
    color:var(--muted);
    text-align:right;
}

.stock-sqft{
    font-size:14px;
    font-weight:600;
    color:var(--text);
}

.stock-name{
    font-size:14px;
    font-weight:600;
    color:var(--text);
    margin-bottom:3px;
}

.stock-boxes{
    font-size:11.5px;
    color:var(--muted);
    margin-bottom:11px;
}

.progress{
    height:5px;
    background:#e8f0ef;
    border-radius:20px;
    overflow:hidden;
}

.progress-fill{
    height:100%;
    border-radius:20px;
}

/* ===========================
   BOTTOM GRID
=========================== */
.bottom-grid{
    display:grid;
    grid-template-columns:1.5fr 1fr;
    gap:14px;
    margin-bottom:18px;
}

/* ACTIVITY */
.activity-card{
    background:var(--card);
    border:1px solid var(--border);
    border-radius:15px;
    padding:20px;
}

.activity-item{
    display:flex;
    align-items:flex-start;
    gap:12px;
    padding:13px 0;
    border-bottom:1px solid #f0f4f3;
}

.activity-item:last-child{border:none;padding-bottom:0;}

.activity-icon{
    width:40px;height:40px;
    border-radius:11px;
    display:flex;align-items:center;justify-content:center;
    font-size:15px;
    color:#fff;
    flex-shrink:0;
}

.activity-content h5{
    font-size:13.5px;
    font-weight:500;
    color:var(--text);
    margin-bottom:3px;
}

.activity-content p{
    font-size:12px;
    color:var(--muted);
}

/* TOP PRODUCTS */
.products-card{
    background:var(--card);
    border:1px solid var(--border);
    border-radius:15px;
    padding:20px;
}

.product-item{
    display:flex;
    align-items:center;
    gap:12px;
    margin-bottom:16px;
}

.product-item:last-child{margin-bottom:0;}

.product-thumb{
    width:44px;height:44px;
    border-radius:11px;
    background:linear-gradient(135deg,#d1fae5,#a7f3d0);
    display:flex;align-items:center;justify-content:center;
    font-size:18px;
    flex-shrink:0;
}

.product-name{
    font-size:13.5px;
    font-weight:500;
    color:var(--text);
}

.product-sqft{
    font-size:11px;
    color:var(--muted);
}

.product-grow{
    margin-left:auto;
    font-size:12px;
    font-weight:600;
    color:var(--green);
    background:#f0fdf4;
    padding:3px 8px;
    border-radius:20px;
    white-space:nowrap;
}

/* ===========================
   ANALYTICS ROW
=========================== */
.analytics-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:14px;
}

.analytics-card{
    background:var(--card);
    border:1px solid var(--border);
    border-radius:15px;
    padding:18px;
    position:relative;
    overflow:hidden;
}

.ac-icon{
    width:42px;height:42px;
    border-radius:11px;
    display:flex;align-items:center;justify-content:center;
    font-size:17px;
    color:#fff;
    margin-bottom:14px;
}

.ac-label{
    font-size:11px;
    color:var(--muted);
    margin-bottom:5px;
}

.ac-val{
    font-family:'Playfair Display',serif;
    font-size:24px;
    color:var(--text);
    margin-bottom:5px;
}

.ac-desc{
    font-size:11.5px;
    color:var(--muted);
    line-height:1.5;
}

.ac-wave{
    position:absolute;
    right:10px;bottom:-5px;
    font-size:64px;
    color:#f0f7f6;
    line-height:1;
    pointer-events:none;
}

/* ===========================
   RESPONSIVE
=========================== */
@media(max-width:1200px){
    .stats-grid,
    .stock-grid,
    .analytics-grid{
        grid-template-columns:repeat(2,1fr);
    }
}

@media(max-width:900px){
    .chart-row,
    .bottom-grid{
        grid-template-columns:1fr;
    }

    .welcome-card{
        flex-direction:column;
        align-items:flex-start;
        gap:18px;
    }

    .wc-right{justify-content:flex-start;}
}

@media(max-width:640px){
    .main{margin-left:0 !important;}
    .stats-grid,
    .stock-grid,
    .analytics-grid{grid-template-columns:1fr;}
    .content{padding:14px;}
}

</style>

<div class="shell">

    <!-- ========== SIDEBAR ========== -->
    <div class="sidebar" id="sidebar">

        <div class="sidebar-logo">
            <div class="logo-gem">
                <i class="fa-solid fa-gem"></i>
            </div>
            <div class="logo-words">
                <div class="logo-main">Ohm Muruga</div>
                <div class="logo-sub">TILES ADMIN</div>
            </div>
        </div>

        <!-- MAIN NAV -->
        <div class="nav-section">Main</div>

        <a href="{{ url('/dashboard') }}" class="nav-item active">
            <i class="fa-solid fa-chart-pie"></i>
            Dashboard
        </a>

        <!-- INVENTORY -->
        <div class="nav-section">Inventory</div>

        <a href="{{ url('/quotation') }}" class="nav-item">
            <i class="fa-solid fa-file-invoice"></i>
            Quotations
            <span class="nav-badge">12</span>
        </a>

        <a href="#" class="nav-item">
            <i class="fa-solid fa-receipt"></i>
            Invoices
        </a>

        <a href="#" class="nav-item">
            <i class="fa-solid fa-boxes-stacked"></i>
            Stock Management
        </a>

        <a href="#" class="nav-item">
            <i class="fa-solid fa-truck"></i>
            Orders
            <span class="nav-badge red">4</span>
        </a>

        <!-- CRM -->
        <div class="nav-section">CRM</div>

        <a href="#" class="nav-item">
            <i class="fa-solid fa-users"></i>
            Customers
        </a>

        <a href="#" class="nav-item">
            <i class="fa-solid fa-chart-line"></i>
            Reports
        </a>

        <!-- SYSTEM -->
        <div class="nav-section">System</div>

        <a href="#" class="nav-item">
            <i class="fa-solid fa-gear"></i>
            Settings
        </a>

        <a href="#" class="nav-item">
            <i class="fa-solid fa-shield-halved"></i>
            User Roles
        </a>

        <!-- FOOTER -->
        <div class="sidebar-footer">
            <a href="#"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();"
               class="sidebar-footer-link">
                <i class="fa-solid fa-right-from-bracket"></i>
                Logout
            </a>
        </div>

    </div><!-- /sidebar -->

    <!-- LOGOUT FORM -->
    <form id="logout-form" action="#" method="POST" style="display:none;">
        @csrf
    </form>

    <!-- OVERLAY -->
    <div class="overlay" id="overlay" onclick="closeSidebar()"></div>

    <!-- ========== MAIN ========== -->
    <div class="main" id="main">

        <!-- TOPBAR -->
        <div class="topbar">

            <button class="toggle-btn" id="toggleBtn" onclick="toggleSidebar()" aria-label="Toggle sidebar">
                <i class="fa-solid fa-bars"></i>
            </button>

            <div>
                <div class="topbar-title">Dashboard</div>
                <div class="topbar-date" id="topDate"></div>
            </div>

            <div class="topbar-spacer"></div>

            <div class="topbar-actions">

                <!-- Notification -->
                <button class="icon-btn" aria-label="Notifications">
                    <i class="fa-regular fa-bell"></i>
                    <div class="notif-dot"></div>
                </button>

                <!-- New Quotation -->
                <button class="new-btn">
                    <i class="fa-solid fa-plus"></i>
                    New Quotation
                </button>

                <!-- PROFILE DROPDOWN -->
                <div class="profile-wrap" id="profileWrap">

                    <div class="profile-trigger" onclick="toggleProfile()">
                        <div class="profile-avatar">A</div>
                        <div>
                            <div class="profile-trigger-name">Admin</div>
                            <div class="profile-trigger-role">Super Admin</div>
                        </div>
                        <i class="fa-solid fa-chevron-down chevron"></i>
                    </div>

                    <div class="profile-dropdown" id="profileDropdown">

                        <div class="pd-header">
                            <div class="pd-name">Admin User</div>
                            <div class="pd-email">admin@ohmmuruga.com</div>
                            <span class="pd-role-badge">Super Admin</span>
                        </div>

                        <div class="pd-items">

                            <div class="pd-item">
                                <i class="fa-regular fa-user"></i>
                                My Profile
                            </div>

                            <div class="pd-item">
                                <i class="fa-solid fa-gear"></i>
                                Account Settings
                            </div>

                            <div class="pd-item">
                                <i class="fa-regular fa-bell"></i>
                                Notifications
                            </div>

                            <div class="pd-divider"></div>

                            <a href="#"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                               class="pd-item logout">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Logout
                            </a>

                        </div>

                    </div>

                </div><!-- /profile-wrap -->

            </div>

        </div><!-- /topbar -->

        <!-- ========== CONTENT ========== -->
        <div class="content">

            <!-- WELCOME BANNER -->
            <div class="welcome-card">
                <div class="wc-left">
                    <h2>Welcome Back, Admin 👋</h2>
                    <p>Here's what's happening at Ohm Muruga Tiles today.</p>
                    <div class="wc-btns">
                        <a href="{{ url('/quotation') }}" class="wc-btn teal">
                            <i class="fa-solid fa-file-circle-plus"></i>
                            Create Quotation
                        </a>
                        <a href="#" class="wc-btn ghost">
                            <i class="fa-solid fa-chart-line"></i>
                            View Reports
                        </a>
                    </div>
                </div>
                <div class="wc-right">
                    <div class="wc-stat">
                        <div class="wcs-val">₹24.5L</div>
                        <div class="wcs-lbl">Total Revenue</div>
                        <div class="wcs-chg">↑ +18.6% this month</div>
                    </div>
                    <div class="wc-stat">
                        <div class="wcs-val">148</div>
                        <div class="wcs-lbl">Total Orders</div>
                        <div class="wcs-chg">38 pending</div>
                    </div>
                </div>
            </div>

            <!-- STATS -->
            <div class="stats-grid">

                <div class="stat-card">
                    <div class="sc-row">
                        <div>
                            <div class="sc-label">Total Quotations</div>
                            <div class="sc-val">1,284</div>
                        </div>
                        <div class="sc-icon" style="background:#0d9488;">
                            <i class="fa-solid fa-file-invoice"></i>
                        </div>
                    </div>
                    <div class="sc-change up">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        +12.4% from last month
                    </div>
                </div>

                <div class="stat-card">
                    <div class="sc-row">
                        <div>
                            <div class="sc-label">Total Customers</div>
                            <div class="sc-val">920</div>
                        </div>
                        <div class="sc-icon" style="background:#0891b2;">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>
                    <div class="sc-change up">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        +15.3% from last month
                    </div>
                </div>

                <div class="stat-card">
                    <div class="sc-row">
                        <div>
                            <div class="sc-label">Total Billing</div>
                            <div class="sc-val">1,540</div>
                        </div>
                        <div class="sc-icon" style="background:#059669;">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>
                    </div>
                    <div class="sc-change up">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        +8.7% stock growth
                    </div>
                </div>

                <div class="stat-card">
                    <div class="sc-row">
                        <div>
                            <div class="sc-label">Pending Orders</div>
                            <div class="sc-val">38</div>
                        </div>
                        <div class="sc-icon" style="background:#ea580c;">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                    </div>
                    <div class="sc-change dn">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        +4 new today
                    </div>
                </div>

            </div>

            <!-- CHARTS -->
            <div class="chart-row">

                <!-- BAR CHART -->
                <div class="chart-card">
                    <div class="cc-head">
                        <div>
                            <div class="cc-title">Sales Overview</div>
                            <div class="cc-sub">Monthly revenue · Jan – Aug 2026</div>
                        </div>
                    </div>
                    <div class="bar-chart">
                        <div class="bar-col">
                            <div class="bar-amt">₹1.2L</div>
                            <div class="bar-rect" style="height:55%;background:#2dd4bf;"></div>
                            <div class="bar-lbl">Jan</div>
                        </div>
                        <div class="bar-col">
                            <div class="bar-amt">₹1.8L</div>
                            <div class="bar-rect" style="height:80%;background:#2dd4bf;"></div>
                            <div class="bar-lbl">Feb</div>
                        </div>
                        <div class="bar-col">
                            <div class="bar-amt">₹2.1L</div>
                            <div class="bar-rect" style="height:65%;background:#2dd4bf;"></div>
                            <div class="bar-lbl">Mar</div>
                        </div>
                        <div class="bar-col">
                            <div class="bar-amt">₹1.6L</div>
                            <div class="bar-rect" style="height:72%;background:#2dd4bf;"></div>
                            <div class="bar-lbl">Apr</div>
                        </div>
                        <div class="bar-col">
                            <div class="bar-amt">₹2.7L</div>
                            <div class="bar-rect" style="height:92%;background:#0d9488;"></div>
                            <div class="bar-lbl">May</div>
                        </div>
                        <div class="bar-col">
                            <div class="bar-amt">₹3.2L</div>
                            <div class="bar-rect" style="height:100%;background:#0d9488;"></div>
                            <div class="bar-lbl">Jun</div>
                        </div>
                        <div class="bar-col">
                            <div class="bar-amt">₹2.5L</div>
                            <div class="bar-rect" style="height:85%;background:#2dd4bf;"></div>
                            <div class="bar-lbl">Jul</div>
                        </div>
                        <div class="bar-col">
                            <div class="bar-amt">₹3.8L</div>
                            <div class="bar-rect" style="height:95%;background:#0d9488;"></div>
                            <div class="bar-lbl">Aug</div>
                        </div>
                    </div>
                </div>

                <!-- DONUT CHART -->
                <div class="chart-card">
                    <div class="cc-head">
                        <div>
                            <div class="cc-title">Tile Distribution</div>
                            <div class="cc-sub">By square footage</div>
                        </div>
                    </div>
                    <div class="donut-wrap">
                        <svg width="120" height="120" viewBox="0 0 120 120" style="flex-shrink:0;">
                            <circle cx="60" cy="60" r="44" fill="none" stroke="#e8f0ef" stroke-width="18"/>
                            <circle cx="60" cy="60" r="44" fill="none" stroke="#0d9488" stroke-width="18"
                                stroke-dasharray="110.3 165.5" stroke-dashoffset="0" transform="rotate(-90 60 60)"/>
                            <circle cx="60" cy="60" r="44" fill="none" stroke="#0891b2" stroke-width="18"
                                stroke-dasharray="69.1 206.7" stroke-dashoffset="-110.3" transform="rotate(-90 60 60)"/>
                            <circle cx="60" cy="60" r="44" fill="none" stroke="#059669" stroke-width="18"
                                stroke-dasharray="41.4 234.5" stroke-dashoffset="-179.5" transform="rotate(-90 60 60)"/>
                            <circle cx="60" cy="60" r="44" fill="none" stroke="#ea580c" stroke-width="18"
                                stroke-dasharray="55.2 220.7" stroke-dashoffset="-220.8" transform="rotate(-90 60 60)"/>
                            <text x="60" y="56" text-anchor="middle" font-size="13" font-weight="600" fill="#1a2e2c">24.5L</text>
                            <text x="60" y="70" text-anchor="middle" font-size="9.5" fill="#6b8784">Total</text>
                        </svg>
                        <div class="dl-legend">
                            <div class="dl-item">
                                <div class="dl-dot" style="background:#0d9488;"></div>
                                <span class="dl-name">Floor Tiles</span>
                                <span class="dl-pct">40%</span>
                            </div>
                            <div class="dl-item">
                                <div class="dl-dot" style="background:#0891b2;"></div>
                                <span class="dl-name">Wall Tiles</span>
                                <span class="dl-pct">25%</span>
                            </div>
                            <div class="dl-item">
                                <div class="dl-dot" style="background:#059669;"></div>
                                <span class="dl-name">Parking Tiles</span>
                                <span class="dl-pct">15%</span>
                            </div>
                            <div class="dl-item">
                                <div class="dl-dot" style="background:#ea580c;"></div>
                                <span class="dl-name">Bathroom Tiles</span>
                                <span class="dl-pct">20%</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- STOCK -->
            <div class="section-title">
                <i class="fa-solid fa-boxes-stacked"></i>
                Tile Stock Overview
            </div>

            <div class="stock-grid">

                <div class="stock-card">
                    <div class="stock-top">
                        <div class="stock-icon" style="background:#0d9488;">
                            <i class="fa-solid fa-border-all"></i>
                        </div>
                        <div class="stock-qty">
                            <div class="stock-sqft">12,540</div>
                            <div>Sq.Ft</div>
                        </div>
                    </div>
                    <div class="stock-name">Floor Tiles</div>
                    <div class="stock-boxes">120 Boxes Available</div>
                    <div class="progress">
                        <div class="progress-fill" style="width:85%;background:#0d9488;"></div>
                    </div>
                </div>

                <div class="stock-card">
                    <div class="stock-top">
                        <div class="stock-icon" style="background:#0891b2;">
                            <i class="fa-solid fa-table-cells-large"></i>
                        </div>
                        <div class="stock-qty">
                            <div class="stock-sqft">8,760</div>
                            <div>Sq.Ft</div>
                        </div>
                    </div>
                    <div class="stock-name">Wall Tiles</div>
                    <div class="stock-boxes">98 Boxes Available</div>
                    <div class="progress">
                        <div class="progress-fill" style="width:70%;background:#0891b2;"></div>
                    </div>
                </div>

                <div class="stock-card">
                    <div class="stock-top">
                        <div class="stock-icon" style="background:#059669;">
                            <i class="fa-solid fa-square-parking"></i>
                        </div>
                        <div class="stock-qty">
                            <div class="stock-sqft">6,320</div>
                            <div>Sq.Ft</div>
                        </div>
                    </div>
                    <div class="stock-name">Parking Tiles</div>
                    <div class="stock-boxes">85 Boxes Available</div>
                    <div class="progress">
                        <div class="progress-fill" style="width:55%;background:#059669;"></div>
                    </div>
                </div>

                <div class="stock-card">
                    <div class="stock-top">
                        <div class="stock-icon" style="background:#ea580c;">
                            <i class="fa-solid fa-bath"></i>
                        </div>
                        <div class="stock-qty">
                            <div class="stock-sqft">4,890</div>
                            <div>Sq.Ft</div>
                        </div>
                    </div>
                    <div class="stock-name">Bathroom Tiles</div>
                    <div class="stock-boxes" style="color:#dc2626;">⚠ Low Stock · 65 Boxes</div>
                    <div class="progress">
                        <div class="progress-fill" style="width:35%;background:#ea580c;"></div>
                    </div>
                </div>

            </div>

            <!-- BOTTOM -->
            <div class="bottom-grid">

                <!-- RECENT ACTIVITY -->
                <div class="activity-card">
                    <div class="section-title" style="margin-bottom:6px;">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        Recent Activities
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon" style="background:#0d9488;">
                            <i class="fa-solid fa-file-circle-plus"></i>
                        </div>
                        <div class="activity-content">
                            <h5>New Quotation Created</h5>
                            <p>Quotation #QT260521006 created successfully.</p>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon" style="background:#0891b2;">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </div>
                        <div class="activity-content">
                            <h5>Order Confirmed</h5>
                            <p>Premium wall tiles order confirmed.</p>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon" style="background:#059669;">
                            <i class="fa-solid fa-money-bill-wave"></i>
                        </div>
                        <div class="activity-content">
                            <h5>Payment Received</h5>
                            <p>₹15,680 payment received from customer.</p>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon" style="background:#ea580c;">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                        <div class="activity-content">
                            <h5>Low Stock Alert</h5>
                            <p>Bathroom tile stock running low.</p>
                        </div>
                    </div>
                </div>

                <!-- TOP PRODUCTS -->
                <div class="products-card">
                    <div class="section-title" style="margin-bottom:14px;">
                        <i class="fa-solid fa-trophy"></i>
                        Top Selling Tiles
                    </div>
                    <div class="product-item">
                        <div class="product-thumb">🪨</div>
                        <div>
                            <div class="product-name">Premium Marble White</div>
                            <div class="product-sqft">2,450 Sq.Ft sold</div>
                        </div>
                        <div class="product-grow">↑ 18.6%</div>
                    </div>
                    <div class="product-item">
                        <div class="product-thumb">🟦</div>
                        <div>
                            <div class="product-name">Glossy Wall Tile</div>
                            <div class="product-sqft">1,980 Sq.Ft sold</div>
                        </div>
                        <div class="product-grow">↑ 14.3%</div>
                    </div>
                    <div class="product-item">
                        <div class="product-thumb">🟫</div>
                        <div>
                            <div class="product-name">Parking Tile Red Hex</div>
                            <div class="product-sqft">1,560 Sq.Ft sold</div>
                        </div>
                        <div class="product-grow">↑ 12.8%</div>
                    </div>
                </div>

            </div>

            <!-- ANALYTICS CARDS -->
            <div class="section-title">
                <i class="fa-solid fa-chart-simple"></i>
                Category Analytics
            </div>

            <div class="analytics-grid">

                <div class="analytics-card">
                    <div class="ac-icon" style="background:#0d9488;">
                        <i class="fa-solid fa-border-all"></i>
                    </div>
                    <div class="ac-label">Floor Tile Sales</div>
                    <div class="ac-val">₹8.6L</div>
                    <div class="ac-desc">Premium vitrified tiles performance</div>
                    <div class="ac-wave">≋</div>
                </div>

                <div class="analytics-card">
                    <div class="ac-icon" style="background:#0891b2;">
                        <i class="fa-solid fa-table-cells-large"></i>
                    </div>
                    <div class="ac-label">Wall Tile Revenue</div>
                    <div class="ac-val">₹5.2L</div>
                    <div class="ac-desc">Luxury glossy wall collections</div>
                    <div class="ac-wave">≋</div>
                </div>

                <div class="analytics-card">
                    <div class="ac-icon" style="background:#ea580c;">
                        <i class="fa-solid fa-bath"></i>
                    </div>
                    <div class="ac-label">Bathroom Tile Sales</div>
                    <div class="ac-val">₹3.9L</div>
                    <div class="ac-desc">Anti-skid designer bathroom tiles</div>
                    <div class="ac-wave">≋</div>
                </div>

                <div class="analytics-card">
                    <div class="ac-icon" style="background:#059669;">
                        <i class="fa-solid fa-square-parking"></i>
                    </div>
                    <div class="ac-label">Parking Tile Sales</div>
                    <div class="ac-val">₹6.8L</div>
                    <div class="ac-desc">Heavy-duty outdoor parking tiles</div>
                    <div class="ac-wave">≋</div>
                </div>

            </div>

        </div><!-- /content -->

    </div><!-- /main -->

</div><!-- /shell -->

<script>
/* ---- DATE ---- */
(function(){
    var d = new Date();
    var el = document.getElementById('topDate');
    if(el) el.textContent = d.toLocaleDateString('en-IN',{
        weekday:'short', day:'numeric', month:'long', year:'numeric'
    });
})();

/* ---- SIDEBAR TOGGLE ---- */
var sidebarOpen = true;

function toggleSidebar(){
    sidebarOpen = !sidebarOpen;
    var sb = document.getElementById('sidebar');
    var mn = document.getElementById('main');
    var ov = document.getElementById('overlay');

    if(sidebarOpen){
        sb.classList.remove('closed');
        mn.classList.remove('expanded');
        ov.classList.remove('show');
    } else {
        sb.classList.add('closed');
        mn.classList.add('expanded');
        if(window.innerWidth < 900){
            ov.classList.add('show');
        }
    }
}

function closeSidebar(){
    sidebarOpen = false;
    document.getElementById('sidebar').classList.add('closed');
    document.getElementById('main').classList.add('expanded');
    document.getElementById('overlay').classList.remove('show');
}

/* ---- PROFILE DROPDOWN ---- */
function toggleProfile(){
    document.getElementById('profileWrap').classList.toggle('open');
}

document.addEventListener('click', function(e){
    var wrap = document.getElementById('profileWrap');
    if(wrap && !wrap.contains(e.target)){
        wrap.classList.remove('open');
    }
});

/* ---- NAV ACTIVE ---- */
document.querySelectorAll('.nav-item').forEach(function(item){
    item.addEventListener('click', function(){
        document.querySelectorAll('.nav-item').forEach(function(n){
            n.classList.remove('active');
        });
        item.classList.add('active');
    });
});
</script>

<script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection