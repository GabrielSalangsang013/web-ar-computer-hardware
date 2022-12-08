<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,q_100,w_32/v1667634716/images/ualogo_triinr.webp"/>
    <link rel="stylesheet" href="../../css/hardware.css">
    <link rel="stylesheet" href="../../css/scroll.css">
    <script type="module" src="https://cdn.jsdelivr.net/npm/@google/model-viewer/dist/model-viewer.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>{{ $hardware_info['hardware_name'] }} | Markerless Web-AR</title>
</head>
<body>
    <header>
        <div class="container">
            <nav>
                <span class='material-icons iconLeave' onclick="history.back()">keyboard_backspace</span>
                
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
            <p class="hardwareName">{{ $hardware_info['hardware_name'] }}</p>

            <div class="tab">
                <button type="button" class="btnTab btnTabActive" data-content="#ar">A.R</button>
                <button type="button" class="btnTab" data-content="#image">Image</button>
            </div>

            <div class="centering">
                <div id="ar" class="content contentActive">
                    <br/>
                    <model-viewer 
                        src="{{ $hardware_info['hardware_url_android'] }}"
                        ios-src="{{ $hardware_info['hardware_url_ios'] }}"
                        ar="ar" 
                        disable-tap
                        auto-rotate="auto-rotate" 
                        camera-controls="camera-controls" 
                        touch-action="pan-y"
                        quick-look-browsers="safari chrome" 
                        class="ar"
                        poster="{{ asset('images/loading_model.gif') }}"
                        shadow-intensity=".97"
                        >
                    </model-viewer>
                    <br/>
                </div>

                <div id="image" class="content">
                    <br/>
                    {{-- <img loading="lazy" src="{{ $hardware_info['hardware_image'] }}" alt="" class="image"/> --}}
                    
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        {!! $hardware_info['hardware_ref_image'] !!}
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>

                </div>
            </div>

            <br/>

            <p class="explanation">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $hardware_info['hardware_description'] }}</p>

            <br/>
            </br>

            <div>
                <img loading="lazy" src="{{asset('images/Design5.png')}}" alt="" class="Design5"/>
            </div>


            <div class="caption_box">
                
            </div>
        </div>
    </main>
    <footer></footer>

    <script>
        const carousel = new bootstrap.Carousel('#myCarousel')
    </script>

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
    </script>
</body>
</html>