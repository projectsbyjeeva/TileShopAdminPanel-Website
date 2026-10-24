<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.css') }}">

    {{-- GOOGLE FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins',sans-serif;
            min-height:100vh;
            overflow-x:hidden;
            position:relative;

            background:
            linear-gradient(
                135deg,
                #020617,
                #0f172a,
                #172554,
                #312e81,
                #581c87
            );
        }

        /* =================================
            GLOW EFFECT
        ================================= */

        .glow1,
        .glow2,
        .glow3{
            position:fixed;
            border-radius:50%;
            filter:blur(150px);
            z-index:0;
        }

        .glow1{
            width:500px;
            height:500px;
            background:#2563eb;
            top:-200px;
            left:-100px;
            opacity:0.35;
        }

        .glow2{
            width:500px;
            height:500px;
            background:#7c3aed;
            bottom:-200px;
            right:-100px;
            opacity:0.35;
        }

        .glow3{
            width:300px;
            height:300px;
            background:#06b6d4;
            top:35%;
            left:40%;
            opacity:0.18;
        }

        /* =================================
            FLOATING BUBBLES
        ================================= */

        .bubble{
            position:fixed;
            border-radius:50%;
            background:rgba(255,255,255,0.06);
            border:1px solid rgba(255,255,255,0.08);
            animation:floatBubble linear infinite;
        }

        .b1{width:20px;height:20px;left:5%;bottom:-20px;animation-duration:12s;}
        .b2{width:35px;height:35px;left:20%;bottom:-40px;animation-duration:15s;}
        .b3{width:18px;height:18px;left:35%;bottom:-20px;animation-duration:10s;}
        .b4{width:40px;height:40px;left:50%;bottom:-40px;animation-duration:17s;}
        .b5{width:25px;height:25px;left:65%;bottom:-20px;animation-duration:13s;}
        .b6{width:30px;height:30px;left:80%;bottom:-30px;animation-duration:15s;}

        @keyframes floatBubble{

            0%{
                transform:translateY(0px);
                opacity:0;
            }

            20%{
                opacity:1;
            }

            100%{
                transform:translateY(-1200px);
                opacity:0;
            }
        }

        /* =================================
            SIDEBAR
        ================================= */

        .sidebar{
            width:280px;
            height:100vh;

            position:fixed;
            left:0;
            top:0;

            padding:22px 18px;

            background:
            rgba(255,255,255,0.08);

            backdrop-filter:blur(25px);

            border-right:
            1px solid rgba(255,255,255,0.08);

            box-shadow:
            0 10px 40px rgba(0,0,0,0.30);

            z-index:999;

            overflow-y:auto;
        }

        .logo{
            display:flex;
            align-items:center;
            gap:14px;

            margin-bottom:40px;
        }

        .logo-icon{
            width:52px;
            height:52px;

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
            font-weight:700;
        }

        .logo-text{
            color:#ffffff;
            font-size:22px;
            font-weight:700;
        }

        .logo-text span{
            color:#67e8f9;
        }

        .sidebar-title{
            color:#94a3b8;
            font-size:12px;
            letter-spacing:1px;
            margin-bottom:18px;
            padding-left:10px;
        }

        .sidebar-menu{
            list-style:none;
            padding:0;
            margin:0;
        }

        .sidebar-menu li{
            margin-bottom:12px;
        }

        .sidebar-menu li a{
            text-decoration:none;

            display:flex;
            align-items:center;
            gap:14px;

            padding:15px 18px;

            border-radius:18px;

            color:#cbd5e1;

            transition:0.3s;

            font-size:15px;
            font-weight:500;
        }

        .sidebar-menu li a:hover{
            background:
            rgba(255,255,255,0.08);

            color:#ffffff;

            transform:translateX(4px);
        }

        .sidebar-menu .active{
            background:
            linear-gradient(
                135deg,
                #2563eb,
                #7c3aed
            );

            color:#ffffff;
        }

        /* =================================
            RIGHT CONTENT
        ================================= */

        .right-content{
            margin-left:280px;
        }

        /* =================================
            TOP NAVBAR
        ================================= */

        .navbar-custom{
            width:95%;
            height:75px;

            margin:25px auto;

            border-radius:24px;

            display:flex;
            justify-content:space-between;
            align-items:center;

            padding:0 22px;

            background:
            rgba(255,255,255,0.08);

            border:
            1px solid rgba(255,255,255,0.08);

            backdrop-filter:blur(25px);

            box-shadow:
            0 10px 40px rgba(0,0,0,0.30);

            position:relative;
            z-index:100;
        }

        .nav-left{
            display:flex;
            align-items:center;
            gap:18px;
        }

        .search-box{
            position:relative;
            width:320px;
        }

        .search-box input{
            width:100%;
            height:48px;

            border:none;

            border-radius:16px;

            padding-left:48px;

            background:
            rgba(255,255,255,0.08);

            color:#ffffff;

            outline:none;
        }

        .search-box input::placeholder{
            color:#cbd5e1;
        }

        .search-box i{
            position:absolute;
            left:18px;
            top:16px;
            color:#cbd5e1;
        }

        .nav-right{
            display:flex;
            align-items:center;
            gap:15px;
        }

        .nav-icon{
            width:48px;
            height:48px;

            border-radius:16px;

            background:
            rgba(255,255,255,0.08);

            display:flex;
            justify-content:center;
            align-items:center;

            color:#ffffff;

            cursor:pointer;

            transition:0.3s;
        }

        .nav-icon:hover{
            background:
            linear-gradient(
                135deg,
                #2563eb,
                #7c3aed
            );
        }

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

        /* =================================
            MAIN CONTENT
        ================================= */

        .main-content{
            width:95%;
            margin:25px auto;
            position:relative;
            z-index:10;
        }

        .page-card{
            padding:35px;
            border-radius:28px;

            background:
            rgba(255,255,255,0.08);

            border:
            1px solid rgba(255,255,255,0.08);

            backdrop-filter:blur(25px);

            box-shadow:
            0 15px 40px rgba(0,0,0,0.30);
        }

        /* =================================
            FOOTER
        ================================= */

        .footer{
            width:95%;
            margin:0 auto 25px;

            padding:18px 25px;

            border-radius:22px;

            background:
            rgba(255,255,255,0.08);

            border:
            1px solid rgba(255,255,255,0.08);

            backdrop-filter:blur(25px);

            box-shadow:
            0 10px 40px rgba(0,0,0,0.30);

            display:flex;
            justify-content:space-between;
            align-items:center;

            color:#cbd5e1;

            font-size:14px;
        }

        /* =================================
            MOBILE
        ================================= */

        @media(max-width:992px){

            .sidebar{
                left:-100%;
                transition:0.4s;
            }

            .sidebar.active{
                left:0;
            }

            .right-content{
                margin-left:0;
            }

            .search-box{
                display:none;
            }

            .footer{
                flex-direction:column;
                gap:10px;
                text-align:center;
            }
        }

    </style> -->

</head>

<body>

    {{-- GLOW --}}
    <div class="glow1"></div>
    <div class="glow2"></div>
    <div class="glow3"></div>

    {{-- BUBBLES --}}
    <div class="bubble b1"></div>
    <div class="bubble b2"></div>
    <div class="bubble b3"></div>
    <div class="bubble b4"></div>
    <div class="bubble b5"></div>
    <div class="bubble b6"></div>



   
<!-- @include('layouts.sidebar') -->


<div class="right-content">

@include('layouts.menubar')

 <div class="main-content">

            @yield('content')

        </div>

            @include('layouts.footer')

</div>



    {{-- JS --}}
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.min.js') }}"></script>


    <script>

$('#toggleSidebar').click(function(){

    $('.sidebar').toggleClass('collapsed');
    $('.right-content').toggleClass('expanded');
});



</script>

</body>
</html>