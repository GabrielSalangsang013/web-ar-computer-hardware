<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,q_10,w_20/v1667634716/images/ualogo_triinr.webp"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/GabrielSalangsang013/team-cord-web-ar@latest/public/css/internalexternalhardware.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" />
    <title>External Hardware | Markerless Web-AR</title>
</head>
<body>
<body>
    <header>
        <div class="container">
            <nav>
                <a href="{{ route('dashboard') }}"><span class='material-icons iconLeave'>keyboard_backspace</span> </a>
                
                <h4 class="hardware-title-type">External Hardwares</h4>

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
                    <a href="{{ route('external_hardware_device', 'digital_camera') }}"><img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,h_140,q_30,w_140/v1667630868/images/external_hardwares/digital_camera_vh5qfx.webp" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Digital Camera</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'external_hard_drive') }}"><img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,h_140,q_30,w_140/v1667630868/images/external_hardwares/external_hard_drive_yk9kk4.webp" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">External Hard Drive</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'joystick') }}"><img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,h_140,q_30,w_140/v1667630869/images/external_hardwares/joystick_sdwpai.webp" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Joystick</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'keyboard') }}"><img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,h_140,q_30,w_140/v1667630869/images/external_hardwares/keyboard_kie6ue.webp" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Keyboard</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'mic') }}"><img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,h_140,q_30,w_140/v1667630869/images/external_hardwares/mic_oef328.webp" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Microphone</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'monitor_crt') }}"><img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,h_140,q_30,w_140/v1667630868/images/external_hardwares/monitor_crt_yctclk.webp" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Monitor (CRT)</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'monitor_lcd') }}"><img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,h_140,q_30,w_140/v1667630869/images/external_hardwares/monitor_lcd_dqmtwd.webp" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Monitor (LCD)</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'mouse') }}"><img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,h_140,q_30,w_140/v1667630869/images/external_hardwares/mouse_eokbwr.webp" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Mouse</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'plotter') }}"><img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,h_140,q_30,w_140/v1667630869/images/external_hardwares/plotter_onjadx.webp" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Plotter</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'printer') }}"><img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,h_140,q_30,w_140/v1667630869/images/external_hardwares/printer_hamiei.webp" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Printer</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'projector') }}"><img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,h_140,q_30,w_140/v1667630869/images/external_hardwares/projector_bbaror.webp" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Projector</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'sd_card') }}"><img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,h_140,q_30,w_140/v1667630869/images/external_hardwares/sd_card_j42m2m.webp" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">SD Card</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'speaker') }}"><img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,h_140,q_30,w_140/v1667630870/images/external_hardwares/speaker_d7ttsh.webp" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Speaker</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'trackball') }}"><img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,h_140,q_30,w_140/v1667630870/images/external_hardwares/trackball_juipqz.webp" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Trackball</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'usb_card_reader') }}"><img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,h_140,q_30,w_140/v1667630870/images/external_hardwares/usb_card_reader_d8klfj.webp" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">USB Card Reader</span>
                </div>
            </div>
        </div>
    </main>
    <footer></footer>

    <script>

        const burger = document.querySelector('.burger');
        const nav_links = document.querySelector('.nav-links');
        const myBody = document.querySelector('body');
        burger.addEventListener('click', () => {
            nav_links.classList.toggle('show_nav_links');
            burger.classList.toggle('cross_burger');
            myBody.classList.toggle('overflow_screen');
        });

        function liveSearch() {
            // Locate the card elements
            let cards = document.querySelectorAll('.hardware')
            // Locate the search input
            let search_query = document.getElementById("searchbox").value;
            // Loop through the cards
            for (var i = 0; i < cards.length; i++) {
                // If the text is within the card...
                if(cards[i].textContent.toLowerCase().includes(search_query.toLowerCase())) {
                    cards[i].classList.remove("is-hidden");
                } else {
                    cards[i].classList.add("is-hidden");
                }
            }
        }

        let typingTimer;        
        let typeInterval = 500; // Half a second
        let searchInput = document.getElementById('searchbox');

        searchInput.addEventListener('keyup', () => {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(liveSearch, typeInterval);
        });

    </script>
</body>
</html>
