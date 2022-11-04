<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/ualogo.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('css/internalexternalhardware.css') }}">
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
                    <a href="{{ route('external_hardware_device', 'digital_camera') }}"><img src="{{ asset('images/external_hardwares/digital_camera.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Digital Camera</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'external_hard_drive') }}"><img src="{{ asset('images/external_hardwares/external_hard_drive.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">External Hard Drive</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'joystick') }}"><img src="{{ asset('images/external_hardwares/joystick.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Joystick</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'keyboard') }}"><img src="{{ asset('images/external_hardwares/keyboard.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Keyboard</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'mic') }}"><img src="{{ asset('images/external_hardwares/mic.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Microphone</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'monitor_crt') }}"><img src="{{ asset('images/external_hardwares/monitor_crt.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Monitor (CRT)</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'monitor_lcd') }}"><img src="{{ asset('images/external_hardwares/monitor_lcd.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Monitor (LCD)</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'mouse') }}"><img src="{{ asset('images/external_hardwares/mouse.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Mouse</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'plotter') }}"><img src="{{ asset('images/external_hardwares/plotter.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Plotter</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'printer') }}"><img src="{{ asset('images/external_hardwares/printer.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Printer</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'projector') }}"><img src="{{ asset('images/external_hardwares/projector.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Projector</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'sd_card') }}"><img src="{{ asset('images/external_hardwares/sd_card.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">SD Card</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'speaker') }}"><img src="{{ asset('images/external_hardwares/speaker.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Speaker</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'trackball') }}"><img src="{{ asset('images/external_hardwares/trackball.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Trackball</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('external_hardware_device', 'usb_card_reader') }}"><img src="{{ asset('images/external_hardwares/usb_card_reader.jpg') }}" alt="" class="hardwareImage"/></a>
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
