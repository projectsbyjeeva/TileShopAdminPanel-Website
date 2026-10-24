{{-- resources/views/content/login/login.blade.php --}}

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>OHM MURUGA TILES</title>

    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            height:100vh;
            overflow:hidden;
            display:flex;
            justify-content:center;
            align-items:center;
            position:relative;
            font-family:'Sora',sans-serif;

            background:
            linear-gradient(
                135deg,
                #020617 0%,
                #0f172a 25%,
                #172554 50%,
                #312e81 75%,
                #581c87 100%
            );
        }

        /* =========================================
           BIG BACKGROUND GLOW
        ========================================= */

        .bg-glow1{
            position:absolute;
            width:700px;
            height:700px;
            background:#2563eb;
            border-radius:50%;
            filter:blur(180px);
            opacity:0.25;
            top:-250px;
            left:-200px;
            animation:moveGlow1 12s infinite alternate;
        }

        .bg-glow2{
            position:absolute;
            width:650px;
            height:650px;
            background:#7c3aed;
            border-radius:50%;
            filter:blur(180px);
            opacity:0.22;
            bottom:-250px;
            right:-180px;
            animation:moveGlow2 14s infinite alternate;
        }

        .bg-glow3{
            position:absolute;
            width:450px;
            height:450px;
            background:#06b6d4;
            border-radius:50%;
            filter:blur(150px);
            opacity:0.18;
            top:35%;
            left:40%;
        }

        @keyframes moveGlow1{

            from{
                transform:translateY(0px);
            }

            to{
                transform:translateY(80px);
            }

        }

        @keyframes moveGlow2{

            from{
                transform:translateX(0px);
            }

            to{
                transform:translateX(-90px);
            }

        }

        /* =========================================
           BACKGROUND FLOATING BUBBLES
        ========================================= */

        .bubble{
            position:absolute;
            border-radius:50%;

            background:
            rgba(255,255,255,0.08);

            border:
            1px solid rgba(255,255,255,0.10);

            backdrop-filter:blur(18px);

            animation:floatBubble linear infinite;
        }

        .b1{ width:20px; height:20px; left:5%; top:90%; animation-duration:12s; }
        .b2{ width:35px; height:35px; left:15%; top:95%; animation-duration:15s; }
        .b3{ width:18px; height:18px; left:25%; top:92%; animation-duration:11s; }
        .b4{ width:45px; height:45px; left:35%; top:94%; animation-duration:18s; }
        .b5{ width:28px; height:28px; left:45%; top:93%; animation-duration:13s; }
        .b6{ width:16px; height:16px; left:55%; top:96%; animation-duration:10s; }
        .b7{ width:38px; height:38px; left:65%; top:92%; animation-duration:17s; }
        .b8{ width:22px; height:22px; left:75%; top:95%; animation-duration:12s; }
        .b9{ width:30px; height:30px; left:85%; top:94%; animation-duration:16s; }
        .b10{ width:50px; height:50px; left:92%; top:90%; animation-duration:20s; }

        @keyframes floatBubble{

            0%{
                transform:translateY(0px) scale(1);
                opacity:0;
            }

            20%{
                opacity:1;
            }

            100%{
                transform:translateY(-1100px) scale(1.5);
                opacity:0;
            }

        }

        /* =========================================
           FLOATING GLASS CUBES
        ========================================= */

        .cube{
            position:absolute;

            background:
            rgba(255,255,255,0.05);

            border:
            1px solid rgba(255,255,255,0.08);

            backdrop-filter:blur(20px);

            border-radius:24px;

            animation:rotateCube 18s linear infinite;
        }

        .cube1{
            width:120px;
            height:120px;
            top:10%;
            left:28%;
        }

        .cube2{
            width:90px;
            height:90px;
            bottom:15%;
            right:25%;
            animation-duration:12s;
        }

        .cube3{
            width:70px;
            height:70px;
            top:68%;
            left:8%;
            animation-duration:15s;
        }

        .cube4{
            width:140px;
            height:140px;
            top:18%;
            right:6%;
            animation-duration:20s;
        }

        @keyframes rotateCube{

            from{
                transform:rotate(0deg);
            }

            to{
                transform:rotate(360deg);
            }

        }

        /* =========================================
           LOGIN CARD
        ========================================= */

        .login-container{
            width:1020px;
            height:600px;

            position:relative;

            display:flex;

            border-radius:35px;

            overflow:hidden;

            z-index:100;

            background:
            rgba(255,255,255,0.07);

            border:
            1px solid rgba(255,255,255,0.08);

            backdrop-filter:blur(35px);

            box-shadow:
            0 25px 80px rgba(0,0,0,0.45);
        }

        /* =========================================
           CARD BUBBLES
        ========================================= */

        .card-bubble{
            position:absolute;

            border-radius:50%;

            background:
            rgba(255,255,255,0.10);

            border:
            1px solid rgba(255,255,255,0.10);

            backdrop-filter:blur(12px);

            z-index:1;

            animation:cardFloat linear infinite;
        }

        .cb1{
            width:18px;
            height:18px;
            left:10%;
            bottom:-20px;
            animation-duration:10s;
        }

        .cb2{
            width:28px;
            height:28px;
            left:22%;
            bottom:-30px;
            animation-duration:13s;
        }

        .cb3{
            width:15px;
            height:15px;
            left:35%;
            bottom:-20px;
            animation-duration:8s;
        }

        .cb4{
            width:40px;
            height:40px;
            left:48%;
            bottom:-40px;
            animation-duration:16s;
        }

        .cb5{
            width:20px;
            height:20px;
            left:60%;
            bottom:-20px;
            animation-duration:11s;
        }

        .cb6{
            width:32px;
            height:32px;
            left:75%;
            bottom:-35px;
            animation-duration:14s;
        }

        .cb7{
            width:14px;
            height:14px;
            left:88%;
            bottom:-15px;
            animation-duration:9s;
        }

        .cb8{
            width:24px;
            height:24px;
            left:15%;
            bottom:-25px;
            animation-duration:12s;
        }

        .cb9{
            width:36px;
            height:36px;
            left:52%;
            bottom:-30px;
            animation-duration:17s;
        }

        .cb10{
            width:18px;
            height:18px;
            left:82%;
            bottom:-20px;
            animation-duration:10s;
        }

        @keyframes cardFloat{

            0%{
                transform:translateY(0px) scale(1);
                opacity:0;
            }

            15%{
                opacity:1;
            }

            100%{
                transform:translateY(-700px) scale(1.5);
                opacity:0;
            }

        }

        /* =========================================
           LEFT SIDE
        ========================================= */

        .left-side{
            width:52%;

            padding:70px;

            display:flex;
            flex-direction:column;
            justify-content:center;

            position:relative;
            z-index:10;

            background:
            linear-gradient(
                135deg,
                rgba(255,255,255,0.08),
                rgba(255,255,255,0.02)
            );
        }

        .logo-box{
            width:110px;
            height:110px;

            border-radius:30px;

            background:
            rgba(255,255,255,0.08);

            border:
            1px solid rgba(255,255,255,0.12);

            display:flex;
            justify-content:center;
            align-items:center;

            margin-bottom:35px;

            backdrop-filter:blur(20px);

            animation:logoFloat 5s infinite ease-in-out;
        }

        @keyframes logoFloat{

            0%{
                transform:translateY(0px);
            }

            50%{
                transform:translateY(-12px);
            }

            100%{
                transform:translateY(0px);
            }

        }

        .logo-box span{
            font-size:42px;
            color:#67e8f9;
        }

        .shop-title{
            font-size:62px;

            line-height:1;

            font-weight:700;

            margin-bottom:25px;

            letter-spacing:-3px;

            color:#ffffff;
        }

        .shop-title span{
            background:
            linear-gradient(
                135deg,
                #ffffff,
                #67e8f9,
                #c084fc
            );

            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .line{
            width:150px;
            height:4px;

            border-radius:20px;

            background:
            linear-gradient(to right,#06b6d4,#8b5cf6);

            margin-bottom:28px;
        }

        .desc{
            color:#cbd5e1;

            font-size:16px;

            line-height:32px;

            max-width:420px;
        }

        /* =========================================
           RIGHT SIDE
        ========================================= */

        .right-side{
            width:48%;

            padding:70px 60px;

            display:flex;
            flex-direction:column;
            justify-content:center;

            position:relative;
            z-index:10;

            background:
            rgba(255,255,255,0.03);

            border-left:
            1px solid rgba(255,255,255,0.06);
        }

        .top-text{
            color:#67e8f9;

            font-size:12px;

            letter-spacing:4px;

            margin-bottom:14px;
        }

        .login-title{
            font-size:48px;

            color:#ffffff;

            font-weight:700;

            margin-bottom:14px;
        }

        .sub-text{
            color:#94a3b8;

            font-size:15px;

            line-height:28px;

            margin-bottom:40px;
        }

        /* =========================================
           FORM
        ========================================= */

        .form-group{
            margin-bottom:24px;
        }

        .form-group label{
            display:block;

            margin-bottom:10px;

            color:#e2e8f0;

            font-size:14px;

            font-weight:500;
        }

        .form-control{
            width:100%;
            height:62px;

            border-radius:18px;

            border:
            1px solid rgba(255,255,255,0.08);

            background:
            rgba(255,255,255,0.05);

            padding:0 22px;

            color:#ffffff;

            font-size:15px;

            transition:0.3s;
        }

        .form-control::placeholder{
            color:#94a3b8;
        }

        .form-control:focus{
            outline:none;

            border-color:#67e8f9;

            background:
            rgba(255,255,255,0.07);

            box-shadow:
            0 0 18px rgba(103,232,249,0.15);
        }

        /* =========================================
           REMEMBER
        ========================================= */

        .remember{
            display:flex;
            justify-content:space-between;
            align-items:center;

            margin-bottom:28px;

            color:#cbd5e1;

            font-size:14px;
        }

        .remember a{
            color:#67e8f9;
            text-decoration:none;
            font-weight:600;
        }

        /* =========================================
           BUTTON
        ========================================= */

        .login-btn{
            width:100%;
            height:64px;

            border:none;

            border-radius:20px;

            background:
            linear-gradient(
                135deg,
                #2563eb,
                #7c3aed,
                #06b6d4
            );

            color:#ffffff;

            font-size:15px;

            font-weight:600;

            letter-spacing:1px;

            cursor:pointer;

            transition:0.4s;

            position:relative;

            overflow:hidden;
        }

        .login-btn::before{
            content:'';

            position:absolute;

            top:0;
            left:-120%;

            width:100%;
            height:100%;

            background:
            rgba(255,255,255,0.18);

            transform:skewX(-30deg);

            transition:0.7s;
        }

        .login-btn:hover::before{
            left:120%;
        }

        .login-btn:hover{
            transform:translateY(-4px);

            box-shadow:
            0 18px 40px rgba(124,58,237,0.30);
        }

        /* =========================================
           FOOTER
        ========================================= */

        .footer{
            margin-top:26px;

            text-align:center;

            color:#64748b;

            font-size:13px;
        }

        /* =========================================
           ERROR
        ========================================= */

        .error{
            background:
            rgba(239,68,68,0.12);

            border:
            1px solid rgba(239,68,68,0.15);

            color:#fecaca;

            padding:14px;

            border-radius:16px;

            margin-bottom:22px;
        }

     

        @media(max-width:950px){

            body{
                height:auto;
                padding:20px;
            }

            .login-container{
                width:100%;
                height:auto;
                flex-direction:column;
            }

            .left-side,
            .right-side{
                width:100%;
            }

            .left-side{
                padding:45px 30px;
            }

            .right-side{
                padding:45px 30px;
            }

            .shop-title{
                font-size:44px;
            }

            .login-title{
                font-size:38px;
            }

        }

    </style>

</head>

<body>

    {{-- BACKGROUND GLOW --}}
    <div class="bg-glow1"></div>
    <div class="bg-glow2"></div>
    <div class="bg-glow3"></div>

    {{-- BACKGROUND BUBBLES --}}
    <div class="bubble b1"></div>
    <div class="bubble b2"></div>
    <div class="bubble b3"></div>
    <div class="bubble b4"></div>
    <div class="bubble b5"></div>
    <div class="bubble b6"></div>
    <div class="bubble b7"></div>
    <div class="bubble b8"></div>
    <div class="bubble b9"></div>
    <div class="bubble b10"></div>

    {{-- FLOATING CUBES --}}
    <div class="cube cube1"></div>
    <div class="cube cube2"></div>
    <div class="cube cube3"></div>
    <div class="cube cube4"></div>

    {{-- LOGIN CARD --}}
    <div class="login-container">

        {{-- CARD BUBBLES --}}
        <div class="card-bubble cb1"></div>
        <div class="card-bubble cb2"></div>
        <div class="card-bubble cb3"></div>
        <div class="card-bubble cb4"></div>
        <div class="card-bubble cb5"></div>
        <div class="card-bubble cb6"></div>
        <div class="card-bubble cb7"></div>
        <div class="card-bubble cb8"></div>
        <div class="card-bubble cb9"></div>
        <div class="card-bubble cb10"></div>

        {{-- LEFT SIDE --}}
        <div class="left-side">

            <div class="logo-box">
                <span>⬢</span>
            </div>

            <h1 class="shop-title">
                <span>OHM MURUGA</span><br>
                TILES
            </h1>

            <div class="line"></div>

            <p class="desc">
                Premium luxury tiles crafted for elegant interiors,
                stylish bathrooms and modern architectural spaces.
            </p>

        </div>

        {{-- RIGHT SIDE --}}
        <div class="right-side">

            <div class="top-text">
                 ADMIN PANEL
            </div>

            <h2 class="login-title">
                Welcome Back
            </h2>

            <p class="sub-text">
                Login into Your Account to access.
            </p>

            {{-- ERROR --}}
            @if(session('error'))

                <div class="error">
                    {{ session('error') }}
                </div>

            @endif

            <form>

                @csrf

                <div class="form-group">

                    <label>Email Address</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Enter your email"
                        required
                    >

                </div>

                <div class="form-group">

                    <label>Password</label>

                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Enter your password"
                        required
                    >

                </div>

                <div class="remember">

                    <label>
                        <input type="checkbox" name="remember">
                        Remember Me
                    </label>

                    <a href="#">
                        Forgot Password?
                    </a>

                </div>

                <button type="button" onclick="window.location.href='{{ url('/dashboard')}}'" class="login-btn">
                    LOGIN 
                </button>

            </form>

            <div class="footer">
                © {{ date('Y') }} OHM MURUGA TILES
            </div>

        </div>

    </div>

</body>
</html>