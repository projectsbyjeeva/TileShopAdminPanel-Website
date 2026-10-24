<!-- 
<style>

    .navbar{
        width:95%;
        height:70px;

        margin:25px auto;

        border-radius:24px;

        display:flex;
        justify-content:space-between;
        align-items:center;

        padding:0 17px;

        position:relative;
        z-index:100;

        background:
        rgba(255,255,255,0.08);

        border:
        1px solid rgba(255,255,255,0.08);

        backdrop-filter:blur(25px);

        box-shadow:
        0 10px 40px rgba(0,0,0,0.30);
    }

    .logo{
        display:flex;
        align-items:center;
        gap:14px;
    }

    .logo-icon{
        width:50px;
        height:50px;

        border-radius:16px;

        background:
        linear-gradient(
            135deg,
            #2563eb,
            #7c3aed,
            #06b6d4
        );

        display:flex;
        justify-content:center;
        align-items:center;

        color:#ffffff;

        font-size:22px;

        font-weight:bold;
    }

    .logo-text{
        color:#ffffff;
        font-size:22px;
        font-weight:700;
    }

    .logo-text span{
        color:#67e8f9;
    }

    .menu{
        display:flex;
        align-items:center;
        gap:15px;
    }

    .menu a{
        text-decoration:none;

        color:#cbd5e1;

        padding:12px 22px;

        border-radius:14px;

        font-size:15px;

        transition:0.3s;
    }

    .menu a:hover{
        background:
        rgba(255,255,255,0.08);

        color:#ffffff;
    }

    .menu .active{
        background:
        linear-gradient(
            135deg,
            #2563eb,
            #7c3aed
        );

        color:#ffffff;
    }

    /* =========================
       DROPDOWN
    ========================= */

    .dropdown{
        position:relative;
    }

    .dropdown-content{
        position:absolute;

        top:55px;
        left:0;

        width:220px;

        border-radius:18px;

        overflow:hidden;

        display:none;

        background:
        rgba(15,23,42,0.95);

        border:
        1px solid rgba(255,255,255,0.08);

        backdrop-filter:blur(25px);

        box-shadow:
        0 15px 35px rgba(0,0,0,0.35);
    }

    .dropdown-content a{
        display:block;
        padding:15px 20px;
        border-radius:0;
    }

    .dropdown:hover .dropdown-content{
        display:block;
    }

    /* =========================
       PROFILE
    ========================= */

    .profile{
        display:flex;
        align-items:center;
        gap:12px;
    }

    .profile-circle{
        width:50px;
        height:50px;

        border-radius:50%;

        background:
        linear-gradient(
            135deg,
            #06b6d4,
            #7c3aed
        );

        display:flex;
        justify-content:center;
        align-items:center;

        color:#ffffff;

        font-weight:700;

        font-size:18px;
    }

    .profile-name{
        color:#ffffff;
        font-size:15px;
        font-weight:600;
    }

    .profile-role{
        color:#94a3b8;
        font-size:12px;
    }

    .menu-item{
    position:relative;
}

.menu-btn{
    text-decoration:none;

    color:#cbd5e1;

    padding:12px 22px;

    border-radius:14px;

    font-size:15px;

    transition:0.3s;

    cursor:pointer;
}

.menu-btn:hover{
    background:
    rgba(255,255,255,0.08);

    color:#ffffff;
}

/* MODULE PANEL */

.module-panel{
    position:absolute;

    top:58px;
    left:0;

    width:360px;

    padding:18px;

    border-radius:22px;

    background:
    rgba(15,23,42,0.95);

    border:
    1px solid rgba(255,255,255,0.08);

    backdrop-filter:blur(25px);

    box-shadow:
    0 15px 35px rgba(0,0,0,0.35);

    display:none;
}

.menu-item:hover .module-panel{
    display:block;
}

.module-title{
    color:#ffffff;

    font-size:16px;

    font-weight:700;

    margin-bottom:16px;
}

.module-grid{
    display:grid;

    grid-template-columns:repeat(2,1fr);

    gap:14px;
}

.module-card{
    text-decoration:none;

    padding:18px;

    border-radius:18px;

    background:
    rgba(255,255,255,0.05);

    border:
    1px solid rgba(255,255,255,0.06);

    transition:0.3s;
}

.module-card:hover{
    transform:translateY(-3px);

    background:
    rgba(255,255,255,0.08);
}

.module-icon{
    width:46px;
    height:46px;

    border-radius:14px;

    display:flex;
    justify-content:center;
    align-items:center;

    margin-bottom:12px;

    color:#ffffff;

    font-size:22px;

    background:
    linear-gradient(
        135deg,
        #2563eb,
        #7c3aed,
        #06b6d4
    );
}

.module-name{
    color:#ffffff;

    font-size:15px;

    font-weight:600;

    margin-bottom:5px;
}

.module-desc{
    color:#94a3b8;

    font-size:12px;

    line-height:1.5;
}

</style>

<div class="navbar">

    {{-- LOGO --}}
    <div class="logo">

        <div class="logo-icon">
            ✦
        </div>

        <div class="logo-text">
            OHM MURUGA <span>TILES</span>
        </div>

    </div>

    {{-- MENU --}}
    <div class="menu">

        <a href="{{ url('/dashboard') }}" class="active">
            Dashboard
        </a>

        {{-- SETTINGS --}}
             <div class="menu-item">

            <div class="menu-btn">
                ⚙ Settings
            </div>

            <div class="module-panel">

                <div class="module-title">
                    Settings Panel
                </div>

                <div class="module-grid">

                    <a href="#" class="module-card">

                        <div class="module-icon">
                            ⚙
                        </div>

                        <div class="module-name">
                            General
                        </div>

                        <div class="module-desc">
                            Manage application settings
                        </div>

                    </a>

                    <a href="#" class="module-card">

                        <div class="module-icon">
                            👤
                        </div>

                        <div class="module-name">
                            Users
                        </div>

                        <div class="module-desc">
                            User permissions & roles
                        </div>

                    </a>

                </div>

            </div>

        </div>

        {{-- MODULES --}}
       <div class="menu-item">

    <div class="menu-btn">
        📦 Modules
    </div>

    <div class="module-panel">

        <div class="module-title">
            Business Modules
        </div>

        <div class="module-grid">

            <a href="{{url('/quotation')}}" class="module-card">

                <div class="module-icon">
                    📄
                </div>

                <div class="module-name">
                    Quotation
                </div>

                <div class="module-desc">
                    Create customer quotations
                </div>

            </a>

            <a href="#" class="module-card">

                <div class="module-icon">
                    🧾
                </div>

                <div class="module-name">
                    Invoice
                </div>

                <div class="module-desc">
                    Billing management
                </div>

            </a>

            <a href="#" class="module-card">

                <div class="module-icon">
                    📦
                </div>

                <div class="module-name">
                    Stock
                </div>

                <div class="module-desc">
                    Manage tile stock
                </div>

            </a>

            <a href="#" class="module-card">

                <div class="module-icon">
                    👥
                </div>

                <div class="module-name">
                    Customers
                </div>

                <div class="module-desc">
                    Customer management
                </div>

            </a>

        </div>

    </div>

</div>

    </div>

    {{-- PROFILE --}}
    <div class="profile">

        <div class="profile-circle">
            A
        </div>

        <div>

            <div class="profile-name">
                Admin
            </div>

            <div class="profile-role">
                Super Admin
            </div>

        </div>

    </div>

</div> -->


<style>

    /* =========================
    NAVBAR
========================= */

.navbar{
    width:95%;
    height:78px;

    margin:18px auto;

    padding:0 22px;

    border-radius:22px;

    display:flex;
    align-items:center;
    justify-content:space-between;

    position:relative;
    z-index:999;

    background:#ffffff;

    border:1px solid #e2e8f0;

    box-shadow:
    0 4px 18px rgba(15,23,42,0.06);
}

/* =========================
    LOGO
========================= */

.logo{
    display:flex;
    align-items:center;
    gap:14px;
}

.logo-icon{
    width:52px;
    height:52px;

    border-radius:16px;

    background:linear-gradient(
        135deg,
        #2563eb,
        #7c3aed
    );

    display:flex;
    justify-content:center;
    align-items:center;

    color:#ffffff;

    font-size:20px;

    box-shadow:
    0 8px 18px rgba(37,99,235,0.18);
}

.logo-text{
    font-size:24px;
    font-weight:700;
    color:#111827;
}

.logo-text span{
    color:#2563eb;
}

/* =========================
    MENU
========================= */

.menu{
    display:flex;
    align-items:center;
    gap:10px;

    background:#f8fafc;

    padding:6px;

    border-radius:16px;

    border:1px solid #e2e8f0;
}

.menu-link,
.menu-btn{

    height:46px;

    padding:0 18px;

    border-radius:12px;

    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;

    text-decoration:none;

    color:#475569;

    font-size:14px;
    font-weight:500;

    transition:0.3s;

    cursor:pointer;

    position:relative;
}

.menu-link:hover,
.menu-btn:hover{

    color:#2563eb;

    background:#eff6ff;
}

.menu-link.active{

    background:linear-gradient(
        135deg,
        #2563eb,
        #4f46e5
    );

    color:#ffffff;

    box-shadow:
    0 8px 18px rgba(79,70,229,0.22);
}

.menu-link i,
.menu-btn i{
    font-size:14px;
}

/* =========================
    MENU ITEM
========================= */

.menu-item{
    position:relative;
}

/* =========================
    DROPDOWN PANEL
========================= */

.module-panel{

    position:absolute;

    top:62px;
    left:0;

    width:370px;

    padding:18px;

    border-radius:20px;

    background:#ffffff;

    border:1px solid #e2e8f0;

    box-shadow:
    0 10px 35px rgba(15,23,42,0.10);

    opacity:0;
    visibility:hidden;

    transform:translateY(10px);

    transition:0.3s;
}

.menu-item:hover .module-panel{

    opacity:1;
    visibility:visible;

    transform:translateY(0);
}

.module-title{

    color:#111827;

    font-size:16px;
    font-weight:600;

    margin-bottom:16px;

    display:flex;
    align-items:center;
    gap:10px;
}

.module-grid{

    display:grid;

    grid-template-columns:repeat(2,1fr);

    gap:14px;
}

/* =========================
    MODULE CARD
========================= */

.module-card{

    text-decoration:none;

    padding:16px;

    border-radius:18px;

    background:#f8fafc;

    border:1px solid #e2e8f0;

    transition:0.3s;
}

.module-card:hover{

    transform:translateY(-3px);

    background:#eff6ff;

    border:1px solid #bfdbfe;
}

.module-icon{

    width:46px;
    height:46px;

    border-radius:14px;

    display:flex;
    align-items:center;
    justify-content:center;

    color:#ffffff;

    font-size:18px;

    margin-bottom:12px;

    background:linear-gradient(
        135deg,
        #2563eb,
        #7c3aed
    );
}

.module-name{

    color:#111827;

    font-size:14px;
    font-weight:600;

    margin-bottom:5px;
}

.module-desc{

    color:#64748b;

    font-size:11px;

    line-height:1.5;
}

/* =========================
    PROFILE
========================= */

.profile{

    display:flex;
    align-items:center;
    gap:12px;

    padding:7px 12px;

    border-radius:18px;

    background:#f8fafc;

    border:1px solid #e2e8f0;
}

.profile-circle{

    width:48px;
    height:48px;

    border-radius:50%;

    background:linear-gradient(
        135deg,
        #06b6d4,
        #7c3aed
    );

    display:flex;
    align-items:center;
    justify-content:center;

    color:#ffffff;

    font-size:16px;
    font-weight:700;
}

.profile-name{

    color:#111827;

    font-size:14px;
    font-weight:600;

    margin-bottom:2px;
}

.profile-role{

    color:#64748b;

    font-size:11px;
}

/* =========================
    MOBILE
========================= */

@media(max-width:1100px){

    .navbar{
        flex-direction:column;
        height:auto;
        gap:18px;
        padding:20px;
    }

    .menu{
        width:100%;
        justify-content:center;
        flex-wrap:wrap;
    }

    .profile{
        width:100%;
        justify-content:center;
    }

}

@media(max-width:768px){

    .logo-text{
        font-size:20px;
    }

    .menu{
        gap:6px;
        padding:5px;
    }

    .menu-link,
    .menu-btn{
        padding:0 14px;
        font-size:13px;
        height:42px;
    }

    .module-panel{
        width:300px;
    }

    .module-grid{
        grid-template-columns:1fr;
    }

}

</style>

<div class="navbar">

    <!-- LOGO -->
    <div class="logo">

        <div class="logo-icon">
            <i class="fa-solid fa-gem"></i>
        </div>

        <div class="logo-text">
            OHM MURUGA <span>TILES</span>
        </div>

    </div>

    <!-- MENU -->
    <div class="menu">

        <a href="{{ url('/dashboard') }}" class="menu-link active">
            <i class="fa-solid fa-chart-pie"></i>
            Dashboard
        </a>

        <!-- SETTINGS -->
        <div class="menu-item">

            <div class="menu-btn">

                <i class="fa-solid fa-gear"></i>
                Settings

            </div>

            <div class="module-panel">

                <div class="module-title">

                    <i class="fa-solid fa-sliders"></i>
                    Settings Panel

                </div>

                <div class="module-grid">

                    <a href="#" class="module-card">

                        <div class="module-icon">
                            <i class="fa-solid fa-gear"></i>
                        </div>

                        <div class="module-name">
                            General
                        </div>

                        <div class="module-desc">
                            Manage application settings
                        </div>

                    </a>

                    <a href="#" class="module-card">

                        <div class="module-icon">
                            <i class="fa-solid fa-user"></i>
                        </div>

                        <div class="module-name">
                            Users
                        </div>

                        <div class="module-desc">
                            User permissions & roles
                        </div>

                    </a>

                </div>

            </div>

        </div>

        <!-- MODULES -->
        <div class="menu-item">

            <div class="menu-btn">

                <i class="fa-solid fa-cubes"></i>
                Modules

            </div>

            <div class="module-panel">

                <div class="module-title">

                    <i class="fa-solid fa-layer-group"></i>
                    Business Modules

                </div>

                <div class="module-grid">

                    <a href="{{url('/quotation')}}"
                    class="module-card">

                        <div class="module-icon">
                            <i class="fa-solid fa-file-lines"></i>
                        </div>

                        <div class="module-name">
                            Quotation
                        </div>

                        <div class="module-desc">
                            Create customer quotations
                        </div>

                    </a>

                    <a href="#" class="module-card">

                        <div class="module-icon">
                            <i class="fa-solid fa-receipt"></i>
                        </div>

                        <div class="module-name">
                            Invoice
                        </div>

                        <div class="module-desc">
                            Billing management
                        </div>

                    </a>

                    <a href="#" class="module-card">

                        <div class="module-icon">
                            <i class="fa-solid fa-boxes-stacked"></i>
                        </div>

                        <div class="module-name">
                            Stock
                        </div>

                        <div class="module-desc">
                            Manage tile stock
                        </div>

                    </a>

                    <a href="#" class="module-card">

                        <div class="module-icon">
                            <i class="fa-solid fa-users"></i>
                        </div>

                        <div class="module-name">
                            Customers
                        </div>

                        <div class="module-desc">
                            Customer management
                        </div>

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- PROFILE -->
    <div class="profile">

        <div class="profile-circle">
            A
        </div>

        <div>

            <div class="profile-name">
                Admin
            </div>

            <div class="profile-role">
                Super Admin
            </div>

        </div>

    </div>

</div>