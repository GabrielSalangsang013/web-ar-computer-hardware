<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/ualogo.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
    <script type="module" src="https://unpkg.com/@google/model-viewer@0.6.0/dist/model-viewer.js"></script>
    <script nomodule src="https://unpkg.com/@google/model-viewer@0.6.0/dist/model-viewer-legacy.js"></script>
    <title>Markerless Web-AR</title>
</head>
<body>
    <header>
        <div class="container">
            <nav>
               <img src="{{ asset('images/ualogo.png') }}" alt="" class="logo"/>
                
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
        <div class="container herosection marginTop2">
            <h1 class="heroText"><strong>Markerless</strong><br/>Web Augmented Reality</h1>
            <img src="{{ asset('images/herovrguy.png') }}" alt="" class="heroGuy"/>
        </div>

        <section>
            <div class="container">
                <div class="tab">
                    <button type="button" class="btnTab btnTabActive" data-content="#internalHardware">Internal Hardware</button>
                    <button type="button" class="btnTab" data-content="#externalHardware">External Hardware</button>
                </div>

                <div id="internalHardware" class="content contentActive">
                    <div class="hardwares">
                        <div class="hardware">
                            <a href="{{ route('internal_hardware_device', 'cpu_cooler') }}"><img src="{{ asset('images/internal_hardwares/cpu_cooler.jpg') }}" alt="" class="hardwareImage"/></a>
                        </div>
                        <div class="hardware">
                            <a href="{{ route('internal_hardware_device', 'cpu') }}"><img src="{{ asset('images/internal_hardwares/cpu.jpg') }}" alt="" class="hardwareImage"/></a>
                        </div>
                        <div class="hardware">
                            <a href="{{ route('internal_hardware_device', 'fan') }}"><img src="{{ asset('images/internal_hardwares/fan.jpg') }}" alt="" class="hardwareImage"/></a>
                        </div>
                        <div class="hardware">
                            <a href="{{ route('internal_hardware_device', 'gpu') }}"><img src="{{ asset('images/internal_hardwares/gpu.jpg') }}" alt="" class="hardwareImage"/></a>
                        </div>
                    </div>

                    <a href="{{ route('internal_hardware') }}"><button class="btnSeeMore">See More</button></a>
                </div>

                <div id="externalHardware" class="content">
                    <div class="hardwares">
                        <div class="hardware">
                            <a href="{{ route('external_hardware_device', 'digital_camera') }}"><img src="{{ asset('images/external_hardwares/digital_camera.jpg') }}" alt="" class="hardwareImage"/></a>
                        </div>
                        <div class="hardware">
                            <a href="{{ route('external_hardware_device', 'external_hard_drive') }}"><img src="{{ asset('images/external_hardwares/external_hard_drive.jpg') }}" alt="" class="hardwareImage"/></a>
                        </div>
                        <div class="hardware">
                            <a href="{{ route('external_hardware_device', 'joystick') }}"><img src="{{ asset('images/external_hardwares/joystick.jpg') }}" alt="" class="hardwareImage"/></a>
                        </div>
                        <div class="hardware">
                            <a href="{{ route('external_hardware_device', 'keyboard') }}"><img src="{{ asset('images/external_hardwares/keyboard.jpg') }}" alt="" class="hardwareImage"/></a>
                        </div>
                    </div>

                    <a href="{{ route('external_hardware') }}"><button class="btnSeeMore">See More</button></a>
                </div>

            </div>
        </section>

        <section>
            <div class="container">
                <p class="title2">What is Web-AR?</p>
                <img src="{{ asset('images/arcover.jpg') }}" alt="" class="titleCover"/>
                <p class="explanation">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The abbreviation Web-AR stands for Web-based Augmented Reality, a relatively new technology that doesn't depend on a smartphone app to work. The native camera and mobile web browser on a user's smartphone can be used to access AR experiences.
                </p>
            </div>
        </section>

        <section>
            <div class="container">
                <p class="title2">PC assembly simulator</p>
                <br/>
                <model-viewer 
                    src="{{ asset('models/system_unit/system_unit.glb') }}"
                    ios-src="{{ asset('models/system_unit/system_unit.usdz') }}"
                    ar="ar" 
                    disable-tap
                    auto-rotate
                    camera-controls
                    touch-action="pan-y"
                    autoplay
                    animation-name="MotherboardAction"
                    quick-look-browsers="safari chrome"
                    class="ar"
                    >
                </model-viewer>
                <br/>
                <span>Select device:</span>
                <br/>
                <br/>
                <button class="btnAnim" data-animation="MotherboardAction">Motherboard</button>
                <button class="btnAnim" data-animation="PSUAction">PSU</button>
                <button class="btnAnim" data-animation="M2Action">M2</button>
                <button class="btnAnim" data-animation="RadiatorAction">Radiator</button>
                <button class="btnAnim" data-animation="CPUAction">CPU</button>
                <button class="btnAnim" data-animation="RTX2080tiAction">GPU</button>
                <button class="btnAnim" data-animation="SSDAction">SSD</button>
                <button class="btnAnim" data-animation="WaterCoolingAction">WaterCooling</button>
                <button class="btnAnim" data-animation="RAMAction">RAM</button>
                <button class="btnAnim" data-animation="RAM1Action">RAM1</button>
                <button class="btnAnim" data-animation="RAM2Action">RAM2</button>
                <button class="btnAnim" data-animation="RAM3Action">RAM3</button>
                <button class="btnAnim" data-animation="Corsair_FanAction">Corsair_Fan</button>
                <button class="btnAnim" data-animation="Corsair_Fan1Action">Corsair_Fan1</button>
                <button class="btnAnim" data-animation="Corsair_Fan2Action">Corsair_Fan2</button>
                <p class="explanation">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A system unit is the part of a computer that houses the primary devices that perform operations and produce results for complex calculations. It includes the motherboard, CPU, RAM and other components, as well as the case in which these devices are housed. This unit performs the majority of the functions that a computer is required to do.
                </p>
            </div>
        </section>

        <div>
            <img src="{{ asset('images/Design1.png') }}" alt="" class="Design1"/>
            <img src="{{ asset('images/Design4.png') }}" alt="" class="Design4"/>
            <img src="{{ asset('images/Design3.png') }}" alt="" class="Design3"/>
        </div>
    </main>

    <footer class="footer">
        <div class="container centerContent">
            <br/>
            <p>This was created by: Team Cord</p>
            <br/>
            <p>For more info contact us: +639298066743</p>
        </div>
    </footer>


    <script>
        let btnTabs = document.querySelectorAll('.btnTab');

        btnTabs.forEach(btnTab => {
            btnTab.addEventListener('click', (e) => {
                if(btnTab.getAttribute('data-content') == 'all') {
                    let allNotActiveContent = document.querySelectorAll('.content');
                    allNotActiveContent.forEach(notActiveContent => notActiveContent.classList.add('contentActive'));
                    document.querySelector('.btnTabActive').classList.remove('btnTabActive');
                    btnTab.classList.add('btnTabActive');
                    return;
                }

                document.querySelector('.btnTabActive').classList.remove('btnTabActive');
                btnTab.classList.add('btnTabActive');

                let allContentActives = document.querySelectorAll('.contentActive');
                allContentActives.forEach(contentActive => contentActive.classList.remove('contentActive'));

                let newAllContentActives = document.querySelectorAll(`${btnTab.getAttribute('data-content')}`);
                newAllContentActives.forEach(newContentActive => newContentActive.classList.add('contentActive'));
            });
        });

        const burger = document.querySelector('.burger');
        const nav_links = document.querySelector('.nav-links');
        const myBody = document.querySelector('body');
        burger.addEventListener('click', () => {
            nav_links.classList.toggle('show_nav_links');
            burger.classList.toggle('cross_burger');
            myBody.classList.toggle('overflow_screen');
        });


        let btnAnims = document.querySelectorAll('.btnAnim');


        btnAnims.forEach(btnAnim => {
            btnAnim.addEventListener('click', () => {
                let ar = document.querySelector('.ar');
                ar.setAttribute('animation-name', btnAnim.getAttribute('data-animation'));
            });
        })
    </script>

</body>
</html>
