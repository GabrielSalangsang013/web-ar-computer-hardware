<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,q_100,w_32/v1667634716/images/ualogo_triinr.webp"/>
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/scroll.css">
    <script type="module" src="https://cdn.jsdelivr.net/npm/@google/model-viewer/dist/model-viewer.min.js"></script>
    <title>Markerless Web-AR</title>
</head>
<body>
    <header>
        <div class="container">
            <nav>
               <img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,q_100,w_60/v1667627564/images/ualogo_fcf3ju.webp" alt="" class="logo" loading="lazy"/>
                
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
            {{-- <img src="https://res.cloudinary.com/dr9p65xlj/image/upload/q_30/v1667630643/images/herovrguy_v11ykt.webp" alt="" class="heroGuy" loading="lazy"/> --}}
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
                            <a href="{{ route('internal_hardware_device', 'cpu_cooler') }}">
                            <img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/cpu_fan_xwv4jt.png" alt="" class="hardwareImage" loading="lazy"/>
                            <span class="hardwareName">CPU Cooler</span>
                            </a>
                        </div>
                        <div class="hardware">
                            <a href="{{ route('internal_hardware_device', 'cpu') }}">
                            <img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/cpu_dfzmnw.png" alt="" class="hardwareImage" loading="lazy"/>
                            <span class="hardwareName">CPU</span>
                            </a>
                        </div>
                        <div class="hardware">
                            <a href="{{ route('internal_hardware_device', 'fan') }}">
                            <img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/fan_vmadpy.png" alt="" class="hardwareImage" loading="lazy"/>
                            <span class="hardwareName">Fan</span>
                            </a>
                        </div>
                        <div class="hardware">
                            <a href="{{ route('internal_hardware_device', 'gpu') }}">
                            <img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886095/images/internal_hardwares/gpu_ntynsn.png" alt="" class="hardwareImage" loading="lazy"/>
                            <span class="hardwareName">GPU</span>
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('internal_hardware') }}"><button class="btnSeeMore">See More</button></a>
                </div>

                <div id="externalHardware" class="content">
                    <div class="hardwares">
                        <div class="hardware">
                            <a href="{{ route('external_hardware_device', 'digital_camera') }}">
                            <img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/digital_camera_k2ctbm.png" alt="" class="hardwareImage" loading="lazy"/>
                            <span class="hardwareName">Digital Camera</span>
                            </a>
                        </div>
                        <div class="hardware">
                            <a href="{{ route('external_hardware_device', 'external_hard_drive') }}">
                            <img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/external_hard_drive_ctsrsu.png" alt="" class="hardwareImage" loading="lazy"/>
                            <span class="hardwareName">External Hard Drive</span>
                            </a>
                        </div>
                        <div class="hardware">
                            <a href="{{ route('external_hardware_device', 'joystick') }}">
                            <img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886821/images/external_hardwares/joystrick_b5kybd.png" alt="" class="hardwareImage" loading="lazy"/>
                            <span class="hardwareName">Joystick</span>
                            </a>
                        </div>
                        <div class="hardware">
                            <a href="{{ route('external_hardware_device', 'keyboard') }}">
                            <img src="https://res.cloudinary.com/dr9p65xlj/image/upload/v1669886822/images/external_hardwares/keyboard_b7etzu.png" alt="" class="hardwareImage" loading="lazy"/>
                            <span class="hardwareName">Keyboard</span>
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('external_hardware') }}"><button class="btnSeeMore">See More</button></a>
                </div>

            </div>
        </section>

        <section>
            <div class="container">
                <p class="title2">What is Web-AR?</p>
                <img class="webarcover" src="{{ asset('images/webarcover.png') }}" alt="">
                <p class="explanation">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The abbreviation Web-AR stands for Web-based Augmented Reality, a relatively new technology that doesn't depend on a smartphone app to work. The native camera and mobile web browser on a user's smartphone can be used to access AR experiences.
                </p>
            </div>
        </section>

        <section>
            <div class="container">
                
            </div>
        </section>

        <div>
            <img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,h_250,q_10,w_250/v1667627841/images/Design1_d94v0f.webp" alt="" class="Design1" loading="lazy"/>
            <img src="https://res.cloudinary.com/dr9p65xlj/image/upload/c_scale,q_10/v1667632729/images/Design4_bmackz.webp" alt="" class="Design4" loading="lazy"/>
            <img src="https://res.cloudinary.com/dr9p65xlj/image/upload/q_10/v1667632729/images/Design3_qqzxeg.webp" alt="" class="Design3" loading="lazy"/>
        </div>
    </main>

    <footer class="footer">
        <div class="container centerContent">
            <br/>
            <p>This was created by: Team Cord</p>
            <br/>
            <p>For more info contact us: +639298066743</p>
            <br/>
        </div>
    </footer>


    <script>
        let btnPlayPause = document.querySelector('.btnPlayPause');
        let btnReplay = document.querySelector('.btnReplay');
        var videoTimePause = 0;
        let video = document.getElementById('video');
        let simu1 = document.getElementById('simu1');
        let simu2 = document.getElementById('simu2');
        let simu3 = document.getElementById('simu3');
        let simu4 = document.getElementById('simu4');
        let simu5 = document.getElementById('simu5');
        let simu6 = document.getElementById('simu6');
        let simu7 = document.getElementById('simu7');
        let simu8 = document.getElementById('simu8');
        let simu9 = document.getElementById('simu9');
        let simu10 = document.getElementById('simu10');
        let simu11 = document.getElementById('simu11');
        let simu12 = document.getElementById('simu12');
        let simu13 = document.getElementById('simu13');
        let simu14 = document.getElementById('simu14');
        var myTimeOut = setTimeout(() => {

        });
        var myInterval = setInterval(() => {}, 1000);

        btnPlayPause.addEventListener('click', () => {
            if(video.paused) {
                if(videoTimePause >= 1) { 
                    if(videoTimePause != 100) {
                        video.play();

                        myTimeOut = setTimeout(() => {
                        video.pause();
                        btnPlayPause.innerHTML = '▶️ &nbsp; Play';
                        
                        console.log(videoTimePause);
                        }, videoTimePause);

                        myInterval = setInterval(() => {
                            if(videoTimePause == 0) {
                                clearInterval(myInterval);
                            }
                            videoTimePause = videoTimePause - 100;
                        }, 100);
                    } 
                }

                video.play();
                btnPlayPause.innerHTML = '⏸️ &nbsp; Pause';
            }else {
                video.pause();
                if(videoTimePause == -100) {
                    videoTimePause = videoTimePause + 100;
                }
                console.log('remaining time ' + videoTimePause);
                clearInterval(myInterval);
                clearInterval(myTimeOut);
                btnPlayPause.innerHTML = '▶️ &nbsp; Play';
            }
        });

        btnReplay.addEventListener('click', () => {
            video.currentTime = 0;
            videoTimePause = 0;
            video.pause();

            let active = document.querySelectorAll('.playActive');
            if(active.length > 0) {
                active.forEach(a => {
                    a.classList.remove('playActive');
                })
            }
        });

        function pauseBtn() {
            video.pause();
            btnPlayPause.innerHTML = '▶️ &nbsp; Play';
        }

        simu1.addEventListener('click', () => {
            video.currentTime = 6.05;
            clearInterval(myTimeOut);
            videoTimePause = 4 * 1000;
            pauseBtn();

            let active = document.querySelectorAll('.playActive');
            if(active.length > 0) {
                active.forEach(a => {
                    a.classList.remove('playActive');
                })
            }

            simu1.classList.add('playActive');
        });

        simu2.addEventListener('click', () => {
            video.currentTime = 10;
            clearInterval(myTimeOut);
            videoTimePause = 7 * 1000;
            pauseBtn();

            let active = document.querySelectorAll('.playActive');
            if(active.length > 0) {
                active.forEach(a => {
                    a.classList.remove('playActive');
                })
            }

            simu2.classList.add('playActive');

        });

        simu3.addEventListener('click', () => {
            video.currentTime = 17;
            clearInterval(myTimeOut);
            videoTimePause = 10 * 1000;
            pauseBtn();

            let active = document.querySelectorAll('.playActive');
            if(active.length > 0) {
                active.forEach(a => {
                    a.classList.remove('playActive');
                })
            }

            simu3.classList.add('playActive');
        });

        simu4.addEventListener('click', () => {
            video.currentTime = 28;
            clearInterval(myTimeOut);
            videoTimePause = 11 * 1000;
            pauseBtn();

            let active = document.querySelectorAll('.playActive');
            if(active.length > 0) {
                active.forEach(a => {
                    a.classList.remove('playActive');
                })
            }

            simu4.classList.add('playActive');
        });

        simu5.addEventListener('click', () => {
            video.currentTime = 40;
            clearInterval(myTimeOut);
            videoTimePause = 9.5 * 1000;
            pauseBtn();

            let active = document.querySelectorAll('.playActive');
            if(active.length > 0) {
                active.forEach(a => {
                    a.classList.remove('playActive');
                })
            }

            simu5.classList.add('playActive');
        });

        simu6.addEventListener('click', () => {
            video.currentTime = 49.2;
            clearInterval(myTimeOut);
            videoTimePause = 6.6 * 1000;
            pauseBtn();

            let active = document.querySelectorAll('.playActive');
            if(active.length > 0) {
                active.forEach(a => {
                    a.classList.remove('playActive');
                })
            }

            simu6.classList.add('playActive');
        });

        simu7.addEventListener('click', () => {
            video.currentTime = 55.8;
            clearInterval(myTimeOut);
            videoTimePause = 6.5 * 1000;
            pauseBtn();

            let active = document.querySelectorAll('.playActive');
            if(active.length > 0) {
                active.forEach(a => {
                    a.classList.remove('playActive');
                })
            }

            simu7.classList.add('playActive');
        });

        simu8.addEventListener('click', () => {
            video.currentTime = 62;
            clearInterval(myTimeOut);
            videoTimePause = 18 * 1000;
            pauseBtn();

            let active = document.querySelectorAll('.playActive');
            if(active.length > 0) {
                active.forEach(a => {
                    a.classList.remove('playActive');
                })
            }

            simu8.classList.add('playActive');
        });

        simu9.addEventListener('click', () => {
            video.currentTime = 80.2;
            clearInterval(myTimeOut);
            videoTimePause = 4.8 * 1000;
            pauseBtn();

            let active = document.querySelectorAll('.playActive');
            if(active.length > 0) {
                active.forEach(a => {
                    a.classList.remove('playActive');
                })
            }

            simu9.classList.add('playActive');
        });

        simu10.addEventListener('click', () => {
            video.currentTime = 85;
            clearInterval(myTimeOut);
            videoTimePause = 8 * 1000;
            pauseBtn();

            let active = document.querySelectorAll('.playActive');
            if(active.length > 0) {
                active.forEach(a => {
                    a.classList.remove('playActive');
                })
            }

            simu10.classList.add('playActive');
        });

        simu11.addEventListener('click', () => {
            video.currentTime = 93.1;
            clearInterval(myTimeOut);
            videoTimePause = 18 * 1000;
            pauseBtn();

            let active = document.querySelectorAll('.playActive');
            if(active.length > 0) {
                active.forEach(a => {
                    a.classList.remove('playActive');
                })
            }

            simu11.classList.add('playActive');
        });

        simu12.addEventListener('click', () => {
            video.currentTime = 112.1;
            clearInterval(myTimeOut);
            videoTimePause = 22 * 1000;
            pauseBtn();

            let active = document.querySelectorAll('.playActive');
            if(active.length > 0) {
                active.forEach(a => {
                    a.classList.remove('playActive');
                })
            }

            simu12.classList.add('playActive');
        });

        simu13.addEventListener('click', () => {
            video.currentTime = 135.05;
            clearInterval(myTimeOut);
            videoTimePause = 19 * 1000;
            pauseBtn();

            let active = document.querySelectorAll('.playActive');
            if(active.length > 0) {
                active.forEach(a => {
                    a.classList.remove('playActive');
                })
            }

            simu13.classList.add('playActive');
        });

        simu14.addEventListener('click', () => {
            video.currentTime = 154;
            clearInterval(myTimeOut);
            videoTimePause = 7 * 1000;
            pauseBtn();

            let active = document.querySelectorAll('.playActive');
            if(active.length > 0) {
                active.forEach(a => {
                    a.classList.remove('playActive');
                })
            }

            simu14.classList.add('playActive');
        });

        video.ontimeupdate = function() {
            let vid = video.currentTime;

            switch(true) {
                case (vid >= 6 && vid <= 9):
                    if(!simu1.classList.contains('playActive')) {
                        let active = document.querySelectorAll('.playActive');
                        if(active.length > 0) {
                            active.forEach(a => {
                                a.classList.remove('playActive');
                            })
                        }
                        simu1.classList.add('playActive')
                    }
                    break;
                case (vid >= 9 && vid <= 16):
                    if(!simu2.classList.contains('playActive')) {
                        let active = document.querySelectorAll('.playActive');
                        if(active.length > 0) {
                            active.forEach(a => {
                                a.classList.remove('playActive');
                            })
                        }
                        simu2.classList.add('playActive')
                    }
                    break;
                case (vid >= 16 && vid <= 27):
                    if(!simu3.classList.contains('playActive')) {
                        let active = document.querySelectorAll('.playActive');
                        if(active.length > 0) {
                            active.forEach(a => {
                                a.classList.remove('playActive');
                            })
                        }
                        simu3.classList.add('playActive')
                    }
                    break;
                case (vid >= 28 && vid <= 39):
                    if(!simu4.classList.contains('playActive')) {
                        let active = document.querySelectorAll('.playActive');
                        if(active.length > 0) {
                            active.forEach(a => {
                                a.classList.remove('playActive');
                            })
                        }
                        simu4.classList.add('playActive')
                    }
                    break;
                case (vid >= 40 && vid <= 49):
                    if(!simu5.classList.contains('playActive')) {
                        let active = document.querySelectorAll('.playActive');
                        if(active.length > 0) {
                            active.forEach(a => {
                                a.classList.remove('playActive');
                            })
                        }
                        simu5.classList.add('playActive')
                    }
                    break;
                case (vid >= 49 && vid <= 55):
                    if(!simu6.classList.contains('playActive')) {
                        let active = document.querySelectorAll('.playActive');
                        if(active.length > 0) {
                            active.forEach(a => {
                                a.classList.remove('playActive');
                            })
                        }
                        simu6.classList.add('playActive')
                    }
                    break;
                case (vid >= 55 && vid <= 61):
                    if(!simu7.classList.contains('playActive')) {
                        let active = document.querySelectorAll('.playActive');
                        if(active.length > 0) {
                            active.forEach(a => {
                                a.classList.remove('playActive');
                            })
                        }
                        simu7.classList.add('playActive')
                    }
                    break;
                case (vid >= 61 && vid <= 80):
                    if(!simu8.classList.contains('playActive')) {
                        let active = document.querySelectorAll('.playActive');
                        if(active.length > 0) {
                            active.forEach(a => {
                                a.classList.remove('playActive');
                            })
                        }
                        simu8.classList.add('playActive')
                    }
                    break;
                case (vid >= 80 && vid <= 84):
                    if(!simu9.classList.contains('playActive')) {
                        let active = document.querySelectorAll('.playActive');
                        if(active.length > 0) {
                            active.forEach(a => {
                                a.classList.remove('playActive');
                            })
                        }
                        simu9.classList.add('playActive')
                    }
                    break;
                case (vid >= 84 && vid <= 93):
                    if(!simu10.classList.contains('playActive')) {
                        let active = document.querySelectorAll('.playActive');
                        if(active.length > 0) {
                            active.forEach(a => {
                                a.classList.remove('playActive');
                            })
                        }
                        simu10.classList.add('playActive')
                    }
                    break;
                case (vid >= 93 && vid <= 111):
                    if(!simu11.classList.contains('playActive')) {
                        let active = document.querySelectorAll('.playActive');
                        if(active.length > 0) {
                            active.forEach(a => {
                                a.classList.remove('playActive');
                            })
                        }
                        simu11.classList.add('playActive')
                    }
                    break;
                case (vid >= 112 && vid <= 134):
                    if(!simu12.classList.contains('playActive')) {
                        let active = document.querySelectorAll('.playActive');
                        if(active.length > 0) {
                            active.forEach(a => {
                                a.classList.remove('playActive');
                            })
                        }
                        simu12.classList.add('playActive')
                    }
                    break;
                case (vid >= 134 && vid <= 153):
                    if(!simu13.classList.contains('playActive')) {
                        let active = document.querySelectorAll('.playActive');
                        if(active.length > 0) {
                            active.forEach(a => {
                                a.classList.remove('playActive');
                            })
                        }
                        simu13.classList.add('playActive')
                    }
                    break;
                case (vid >= 154 && vid <= 161):
                    if(!simu14.classList.contains('playActive')) {
                        let active = document.querySelectorAll('.playActive');
                        if(active.length > 0) {
                            active.forEach(a => {
                                a.classList.remove('playActive');
                            })
                        }
                        simu14.classList.add('playActive')
                    }
                    break;
                case (vid >= 161 && vid <= 163):
                    let active = document.querySelectorAll('.playActive');
                    if(active.length > 0) {
                        active.forEach(a => {
                            a.classList.remove('playActive');
                        })
                    }
                    break;
            }
        }
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
        const myHeader = document.querySelector('header');
        burger.addEventListener('click', () => {
            nav_links.classList.toggle('show_nav_links');
            burger.classList.toggle('cross_burger');
            myHeader.classList.toggle('onHeader');
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
