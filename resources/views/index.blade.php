<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="baseURL" content="{{ url('/') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/ualogo.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Login | Markerless Web-AR</title>
</head>
<body>

    <header class="header">
        <div class="container centerContent marginTop">
            <img src="{{ asset('images/ualogo.png') }}" alt="" class="UALogo"/>
        </div>
    </header>

    <main>
        <div class="container centerContent marginTop2">
            <p class="entranceText">Welcome</p>
            <h1 class="title">Markerless Web based Augmented Reality Technology for Information Technology Course Visualizing Computer Hardware</h1>
            <p class="mobileTextOnly">Learn computer hardware using augmented reality</p>

            <div id="googleLogin" class="googleBtn">
                <div class="googleBtnLeft">
                    <img src="{{ asset('images/googleicon.png') }}" alt="" class="googleBtnIcon"/>
                </div>
                <div class="googleBtnRight">
                    <span>Continue with Google</span>
                </div>
            </div>

            <span class="loginInfo">only domain ua.edu.ph can be use</span>
        </div>

        <div>
            <img src="{{ asset('images/Design1.png') }}" alt="" class="Design1"/>
            <img src="{{ asset('images/Design2.png') }}" alt="" class="Design2"/>
        </div>
    </main>


    <footer>
        <div class="container centerContent">
            <span class="footerText"><strong>Team Cord</strong> Production</span>
        </div>
    </footer>


    <script src="{{ url('/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    

	<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
	<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>

	<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
	<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-analytics.js"></script>

	<!-- Add Firebase products that you want to use -->
	<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-auth.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-firestore.js"></script>

	<script type="text/javascript" src="{{ url('/js/firebase-conf.js') }}"></script>
	
	<!-- google provider -->
	<script type="text/javascript" src="{{ url('/js/google.js') }}"></script>

</body>
</html>
