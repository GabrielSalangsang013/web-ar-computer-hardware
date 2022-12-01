<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,q_100,w_32/v1667634716/images/ualogo_triinr.webp"/>
    <link rel="stylesheet" href="{{ asset('css/internalexternalhardware.css') }}">
    <link rel="stylesheet" href="{{ asset('css/scroll.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script defer src="https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/js/internalexternalhardware.min.js"></script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" />
    <title>Internal Hardware | Markerless Web-AR</title>
</head>
<body>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="{{ route('dashboard') }}"><span class='material-icons iconLeave'>keyboard_backspace</span> </a>
                
                <h4 class="hardware-title-type">Internal Hardwares</h4>

                <ul class="nav-links">
                    <a href="{{ route('internal_hardware') }}"><li>Internal Hardware</li></a>
                    <a href="{{ route('external_hardware') }}"><li>External Hardware</li></a>
                    <a href="{{ route('logout') }}"><li>Logout</li></a>
                </ul>
    
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <ion-searchbar type="search" placeholder="Custom Placeholder" id="searchbox" oninput="liveSearch()"></ion-searchbar>

            <div class="hardwares">
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'cpu_cooler') }}"><img loading="lazy" 
                    src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/cpu_fan_xwv4jt.png" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">CPU Cooler</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'cpu') }}"><img loading="lazy" 
                    src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/cpu_dfzmnw.png" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">CPU</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'fan') }}"><img loading="lazy" 
                    src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/fan_vmadpy.png" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Fan</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'gpu') }}"><img loading="lazy" 
                    src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/gpu_ntynsn.png" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">GPU</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'hard_drive') }}"><img loading="lazy" 
                    src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/hdd_vs0jpx.png" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Hard Drive</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'motherboard') }}"><img loading="lazy" 
                    src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/motherboard_puqw8a.png" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Motherboard</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'nic') }}"><img loading="lazy" 
                    src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/nic_kdqsx9.png" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">NIC</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'power_supply') }}"><img loading="lazy" 
                    src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886096/images/internal_hardwares/psu_bklwlz.png" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Power Supply</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'ram') }}"><img loading="lazy" 
                    src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886096/images/internal_hardwares/ram_hxrsre.png" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">RAM</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'sound_card') }}"><img loading="lazy" 
                    src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886096/images/internal_hardwares/soundcard_joq98s.png" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Sound Card</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'ssd') }}"><img loading="lazy" 
                    src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886096/images/internal_hardwares/ssd_ogugc4.png" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">SSD</span>
                </div>
            </div>
        </div>

    </main>
    <footer></footer>
</body>
</html>
