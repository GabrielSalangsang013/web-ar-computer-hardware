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
                <a href="{{ route('dashboard') }}"><span class='material-icons iconLeave'>keyboard_backspace</span> </a>
                
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
                <button type="button" class="btnTab" data-content="#video">Video</button>
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

                        {!! $hardware_info['hardware_hotspots'] !!}
                    </model-viewer>
                    <br/>
                    <button id="toggleLabel">View on / off labels</button>

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

                <div id="video" class="content">
                    <br/>
                    <iframe loading="lazy" class="ytVideoiframe" src="{{ $hardware_info['hardware_video'] }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            <br/>

            <p class="explanation">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $hardware_info['hardware_description'] }}</p>

            <br/>
            </br>

            <strong>Model Name & Brand</strong></br></br>
            {!! $hardware_info['hardware_name&specs'] !!}

            <br/>
            <br/>
            {{-- <strong><span>References:</span></strong> --}}
            <p class="elipsis"><strong>Video Reference:</strong> <br/><a href="{{ $hardware_info['hardware_ref_video'] }}">{{ $hardware_info['hardware_ref_video'] }}</a></p>
            <div>
                <img loading="lazy" src="{{asset('images/Design5.png')}}" alt="" class="Design5"/>
            </div>

            <div>
                @if ($hardware_info['hardware_audio_1'] != '')
                    <audio id="audio_hot1" controls>
                        <source src="{{ $hardware_info['hardware_audio_1'] }}" type="audio/mpeg">
                    </audio>
                @endif 

                @if ($hardware_info['hardware_audio_2'] != '')
                    <audio id="audio_hot2" controls>
                        <source src="{{ $hardware_info['hardware_audio_2'] }}" type="audio/mpeg">
                    </audio>
                @endif 

                @if ($hardware_info['hardware_audio_3'] != '')
                    <audio id="audio_hot3" controls>
                        <source src="{{ $hardware_info['hardware_audio_3'] }}" type="audio/mpeg">
                    </audio>
                @endif 

                @if ($hardware_info['hardware_audio_4'] != '')
                    <audio id="audio_hot4" controls>
                        <source src="{{ $hardware_info['hardware_audio_4'] }}" type="audio/mpeg">
                    </audio>
                @endif 

                @if ($hardware_info['hardware_audio_5'] != '')
                    <audio id="audio_hot5" controls>
                        <source src="{{ $hardware_info['hardware_audio_5'] }}" type="audio/mpeg">
                    </audio>
                @endif 
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
            let Hotspot = document.querySelectorAll('.Hotspot');
            let toggleLabel = document.getElementById('toggleLabel');

            if(Hotspot.length == 0) {
                toggleLabel.classList.add('hide');
            }
            
            toggleLabel.addEventListener('click', () => {
                let Hotspot = document.querySelectorAll('.Hotspot');
                Hotspot.forEach(hot => {
                    hot.classList.toggle('hide');
                });
            });
        </script>

        <script>
            let caption_box = document.querySelector('.caption_box');
            caption_box.addEventListener('click', () => {
                caption_box.classList.remove('caption_box_active');
            });
        </script>

        @if ($hardware_info['hardware_audio_1'] != '')
            <script>
                let hot_caption_1 = '{{ $hardware_info["hardware_caption_1"] }}' ;
                let hot1 = document.getElementById('hot1');
                let audio_hot1 = document.getElementById('audio_hot1');
                hot1.addEventListener('click', () => {
                    audio_hot1.play();
                    caption_box.innerHTML = hot_caption_1;
                    caption_box.classList.add('caption_box_active');
                });
            </script>
        @endif 

        @if ($hardware_info['hardware_audio_2'] != '')
            <script>
                let hot_caption_2 = '{{ $hardware_info["hardware_caption_2"] }}' ;
                let hot2 = document.getElementById('hot2');
                let audio_hot2 = document.getElementById('audio_hot2');
                hot2.addEventListener('click', () => {
                    audio_hot2.play();
                    caption_box.innerHTML = hot_caption_2;
                    caption_box.classList.add('caption_box_active');
                });
            </script>
        @endif 

        @if ($hardware_info['hardware_audio_3'] != '')
            <script>
                let hot_caption_3 = '{{ $hardware_info["hardware_caption_3"] }}' ;
                let hot3 = document.getElementById('hot3');
                let audio_hot3 = document.getElementById('audio_hot3');
                hot3.addEventListener('click', () => {
                    audio_hot3.play();
                    caption_box.innerHTML = hot_caption_3;
                    caption_box.classList.add('caption_box_active');
                });
            </script>
        @endif 

        @if ($hardware_info['hardware_audio_4'] != '')
            <script>
                let hot_caption_4 = '{{ $hardware_info["hardware_caption_4"] }}' ;
                let hot4 = document.getElementById('hot4');
                let audio_hot4 = document.getElementById('audio_hot4');
                hot4.addEventListener('click', () => {
                    audio_hot4.play();
                    caption_box.innerHTML = hot_caption_4;
                    caption_box.classList.add('caption_box_active');
                });
            </script>
        @endif 

        @if ($hardware_info['hardware_audio_5'] != '')
            <script>
                let hot_caption_5 = '{{ $hardware_info["hardware_caption_5"] }}' ;
                let hot5 = document.getElementById('hot5');
                let audio_hot5 = document.getElementById('audio_hot5');
                hot5.addEventListener('click', () => {
                    audio_hot5.play();
                    caption_box.innerHTML = hot_caption_5;
                    caption_box.classList.add('caption_box_active');
                });
            </script>
        @endif 

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