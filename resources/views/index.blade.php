<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Markerless Web based Augmented Reality Technology for Information Technology Course Visualizing Computer Hardware Login Page">
	<meta name="baseURL" content="{{ url('/') }}">
    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,q_100,w_32/v1667634716/images/ualogo_triinr.webp"/>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/scroll.css') }}">
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" />
    <title>Login | Markerless Web-AR</title>
</head>
<body>

    <header class="header">
        <div class="container centerContent marginTop">
            <img width="100" height="100" src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,w_100/v1667627564/images/ualogo_fcf3ju.webp" alt="" class="UALogo"/>
        </div>
    </header>

    <main>
        <div class="container centerContent marginTop2">
            <p class="entranceText">Welcome</p>
            <h1 class="title">Markerless Web based Augmented Reality Technology for Information Technology Course Visualizing Computer Hardware</h1>
            <p class="mobileTextOnly">Learn computer hardware using augmented reality</p>

            <button type="button" id="googleLogin" class="googleBtn">
                <div class="googleBtnLeft">
                    <img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,w_35/v1667629945/images/googleicon_lq8jxv.webp" class="googleBtnIcon" width="25" height="25" alt="" />
                </div>
                <div class="googleBtnRight">
                    <span>Continue with Google</span>
                </div>
            </button>

            <span class="loginInfo">only domain ua.edu.ph can be use</span>
            <span class="loginInfo">Android Requirement: Must have ARCore installed to enable A.R experience</span>
        </div>

        <div>
            <img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,q_10/v1667627841/images/Design1_d94v0f.webp" alt="" class="Design1"/>
            <img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,q_10/v1667627842/images/Design2_a2ljof.webp" alt="" class="Design2"/>
        </div>
    </main>

    <footer>
        <div class="container centerContent">
            <span class="footerText"><strong>Team Cord</strong> Production</span>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha512-lzilC+JFd6YV8+vQRNRtU7DOqv5Sa9Ek53lXt/k91HZTJpytHS1L6l1mMKR9K6VVoDt4LiEXaa6XBrYk1YhGTQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/8.2.5/firebase-app.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/8.2.5/firebase-analytics.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/8.2.5/firebase-auth.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/js/firebase-conf.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/js/google.min.js"></script>

    <script>
        async function alertSuccess() {
            const alert = document.createElement('ion-alert');
            alert.header = 'Success';
            alert.message = 'You have successfully login.';
            alert.buttons = [{text: 'OK', handler: () => {
                window.location.replace("/dashboard");
            }}];

            document.body.appendChild(alert);
            await alert.present();
        }

        async function alertFail() {
            const alert = document.createElement('ion-alert');
            alert.header = 'Invalid Domain';
            alert.message = 'Email must be @ua.edu.ph';
            alert.buttons = ['OK'];

            document.body.appendChild(alert);
            await alert.present();
        }
    </script>

</body>
</html>
