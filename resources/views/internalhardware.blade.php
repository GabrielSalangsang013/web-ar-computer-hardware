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
                    <a href="{{ route('internal_hardware_device', 'cpu_cooler') }}"><img src="{{ asset('images/internal_hardwares/cpu_cooler.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">CPU Cooler</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'cpu') }}"><img src="{{ asset('images/internal_hardwares/cpu.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">CPU</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'fan') }}"><img src="{{ asset('images/internal_hardwares/fan.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Fan</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'gpu') }}"><img src="{{ asset('images/internal_hardwares/gpu.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">GPU</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'hard_drive') }}"><img src="{{ asset('images/internal_hardwares/hard_drive.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Hard Drive</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'motherboard') }}"><img src="{{ asset('images/internal_hardwares/motherboard.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Motherboard</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'nic') }}"><img src="{{ asset('images/internal_hardwares/nic.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">NIC</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'power_supply') }}"><img src="{{ asset('images/internal_hardwares/power_supply.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Power Supply</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'ram') }}"><img src="{{ asset('images/internal_hardwares/ram.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">RAM</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'sound_card') }}"><img src="{{ asset('images/internal_hardwares/sound_card.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">Sound Card</span>
                </div>
                <div class="hardware">
                    <a href="{{ route('internal_hardware_device', 'ssd') }}"><img src="{{ asset('images/internal_hardwares/ssd.jpg') }}" alt="" class="hardwareImage"/></a>
                    <span class="hardwareName">SSD</span>
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
