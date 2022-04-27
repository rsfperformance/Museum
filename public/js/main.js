$(window).on('load', () => {

    new WOW({
        offset: 50,
        mobile:  false,
    }).init();
    

    //____ALTERNATIVE VISION__________ 

    let defaultFont = parseInt($(':root').css('font-size'))
    let currentFont 
    let zoomIndex 
    if(sessionStorage.font) {
        currentFont = parseInt(sessionStorage.font)
        zoomIndex = parseInt(sessionStorage.zoomIndex)
        $(':root').css('font-size', `${currentFont}px`)
    } else {
        currentFont = defaultFont
        zoomIndex = 0
    }
    if(sessionStorage.filter) {
        $('html').addClass(sessionStorage.filter)
    }




    $('.header-style__color .normal').click(() => {
        $('html').removeClass('gray').removeClass('invert').addClass('normal')
        sessionStorage.filter = 'normal'
    })

    $('.header-style__color .gray').click(() => {
        $('html').removeClass('normal').removeClass('invert').addClass('gray')
        sessionStorage.filter = 'gray'
    })

    $('.header-style__color .invert').click(() => {
        $('html').removeClass('nornal').removeClass('gray').addClass('invert')
        sessionStorage.filter = 'invert'
    })


    $('.header-style__font .small').click(() => {
        if(zoomIndex > -3) {
            zoomIndex--
            currentFont-=3
            sessionStorage.font = currentFont
            sessionStorage.zoomIndex = zoomIndex
            $(':root').css('font-size', `${currentFont}px`)
        }
    })

    $('.header-style__font .big').click(() => {
        if(zoomIndex < 3) {
            zoomIndex++
            currentFont+=3
            sessionStorage.font = currentFont
            sessionStorage.zoomIndex = zoomIndex
            $(':root').css('font-size', `${currentFont}px`)
        }
    })
    

    $('.header-style__reset span').click(() => {
        $('html').removeClass('invert').removeClass('gray')
        sessionStorage.filter = 'normal'
        zoomIndex = 0
        sessionStorage.zoomIndex = zoomIndex
        $(':root').css('font-size', `${defaultFont}px`)
        sessionStorage.font = defaultFont
    })

    $('.mobile-menu__eye a').click(e => {
        e.preventDefault()
        $('.mobile-menu__eye .header-style').fadeToggle(0)
    })



    //______SOUND____________

    let sound = document.querySelector('#playAudio');
    sound.volume = 0.4;

    $('.sound-off').click(e => {
        e.preventDefault()
        sound.pause()
        $('.sound-off').css('display', 'none')
        $('.sound-on').css('display', 'flex')
    })

    $('.sound-on').click(e => {
        e.preventDefault()
        sound.play()
        $('.sound-on').css('display', 'none')
        $('.sound-off').css('display', 'flex')
    })


    //____MOBILE-MENU___________ 


    $('.mobile-menu .menu__item-svg').click(function() {
        $(this).parents('.menu__item').toggleClass('menu__item-open')
    })

    $('.mobile-menu .submenu__item-svg').click(function() {
        $(this).parents('.submenu__item').toggleClass('submenu__item-open')
    })

    $('.mobile-menu .header-head__lang').click(function() {
        $(this).toggleClass('header-head__lang-open')
    })

    $('.header-mobi').click(function() {
        $(this).toggleClass('header-mobi__open')
        $('.mobile-menu').toggleClass('mobile-menu-open')
    })


    //________FEEDBACK______________


    $('.chat').click(e => {
        e.preventDefault()
        $('.popup-layer').show()
        $('.feedback').addClass('feedback-show')
    })
    
    
    $('.popup-layer').click(function() {
        $(this).hide()
        $('.feedback').removeClass('feedback-show')
    })

    $('.feedback__close').click(function() {
        $('.popup-layer').hide()
        $('.feedback').removeClass('feedback-show')
    })
    


    //_________MAIN SLIDER______________

    $('.main-carousel').owlCarousel({
        dots: false,
        nav: false,
        mouseDrag: false,
        smartSpeed: 700,
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 4000,
        
        responsive: {
            0 : {
                margin: 15,
            },
            600 : {
                margin: 20,
            },

            800: {
                margin: 20,
            },

            1200: {
                margin: 25,
            },

            1500: {
                margin: 30,
            }
        }  
    })


    $('.main-arrow__left').click(() => {
        $('.main-carousel').trigger('prev.owl.carousel', [700]);
        $('.main-carousel').trigger('stop.owl.autoplay')
    })

    $('.main-arrow__right').click(() => {
        $('.main-carousel').trigger('next.owl.carousel', [700]);
        $('.main-carousel').trigger('stop.owl.autoplay')
    })


    $('.main-close').click(function(e) {
        e.preventDefault()
        let address = $(this).attr('href')
        $('.main-360').css('clip-path', 'circle(120rem at 0 0)')
        $('.main-360').css('opacity', '1')
        setTimeout(() => {
            $(location).attr('href', address)
        }, 1500)
    })


     //______ZOOM______________

     $('.zoom-open').click(function() {
         $('body').css('overflow', 'hidden')
         let src = $(this).parent().find('.zoom-img').attr('src');
         $('.zoom-popup').fadeIn(600)
         $('.zoom-popup__img').attr('src', src)
     })

     $('.zoom-popup__close').click(() => {
        $('body').css('overflow', '')
        $('.zoom-popup').fadeOut(600)
        setTimeout(() => {
            panzoom.reset()
         }, 600)
     })


    const element = document.querySelector('.zoom-popup__img')
    const panzoom = Panzoom(element, {

    })

    const parent = element.parentElement
    parent.addEventListener('wheel', panzoom.zoomWithWheel);

    $('.zoom-in').click(() => {
        panzoom.zoomIn()
    })

    $('.zoom-out').click(() => {
        panzoom.zoomOut()
    })
    $('.reset').click(() => {
        panzoom.reset()
    })



     //______ABOUT______________

     let showCounter = true;
     $(window).on("scroll load resize", function () {
         if (!showCounter) return false; 
         let w_top = $(window).scrollTop(); 
         if (w_top >= $(window).height()/4) {
            
            $(".about__numbers-anim .about-number__count span").each(function() {
             $(this).prop("col",0).animate({
                     counter:$(this).text()},{
                     duration: 2000,
                     easing: "swing",
                     step:function(now){
                         $(this).text(Math.ceil(now));
                     }
                 });
             });
            showCounter = false;
         }
 
     }); 



     //________HISTORY______________


    $('.history-carousel__img').hover(function(){
        $(this).parent().addClass('history-carousel__item-active')
        let index = $(this).index('.history-carousel__img')
        let offsetEl = $(this).offset().left
        $('.history-line span').css('width', `${offsetEl}px`)
        for (let i = 0; i <= index; i++) {
            $('.history-carousel__dot').eq(i).addClass('history-carousel__dot-active')
        }
    },
    function(){
        $(this).parent().removeClass('history-carousel__item-active')
        $('.history-line span').css('width', `0`)
        $('.history-carousel__dot').removeClass('history-carousel__dot-active')
    })




    //_______QUOTE______________

    $('.quotes-carousel').owlCarousel({
        dots: true,
        nav: false,
        mouseDrag: true,
        smartSpeed: 700,
        items: 1,
    })


    //______CEREMONY______________

    $('.ceremony-carousel').owlCarousel({
        dots: false,
        nav: false,
        mouseDrag: false,
        smartSpeed: 700,
        responsive: {
            0 : {
                items: 1
            },
            768 : {
                items: 2
            },
            1200: {
                items: 3
            }
        }  
    })

    $('.ceremony-arrows .arrow__left').click(() => {
        $('.ceremony-carousel').trigger('prev.owl.carousel', [700]);
    })

    $('.ceremony-arrows .arrow__right').click(() => {
        $('.ceremony-carousel').trigger('next.owl.carousel', [700]);
    })


    $('.ceremony-video').owlCarousel({
        dots: false,
        nav: false,
        mouseDrag: false,
        smartSpeed: 700,
        items: 1,
        loop: true,       
        responsive: {
            0 : {
                stagePadding: 35,
                margin: 15,
            },
            600 : {
                stagePadding: 65,
                margin: 20,
            },

            800: {
                stagePadding: 95,
                margin: 20,
            },

            1200: {
                stagePadding: 125,
                margin: 25,
            },

            1500: {
                stagePadding: 195,
                margin: 30,
            }
        }  
    })

    $('.ceremony-video__arrows .arrow__left').click(() => {
        $('.ceremony-video').trigger('prev.owl.carousel', [700]);
    })

    $('.ceremony-video__arrows .arrow__right').click(() => {
        $('.ceremony-video').trigger('next.owl.carousel', [700]);
    })

    
    //______SOURCES______________


    $('.sources-carousel').owlCarousel({
        dots: true,
        nav: false,
        mouseDrag: true,
        smartSpeed: 700,
        items: 1,
        autoWidth: true,
    })

    $('.sources-arrows .arrow__left').click(() => {
        $('.sources-carousel').trigger('prev.owl.carousel', [700]);
    })

    $('.sources-arrows .arrow__right').click(() => {
        $('.sources-carousel').trigger('next.owl.carousel', [700]);
    })


    //______GALLERY______________

    $('.gallery-carousel').owlCarousel({
        dots: true,
        nav: false,
        mouseDrag: true,
        smartSpeed: 700,
        loop: true,
        responsive: {
            0 : {
                stagePadding: 35,
                items: 1,
            },
            700 : {
                stagePadding: 85,
                items: 2,
            },
            1400: {
                stagePadding: 195,
                items: 3,
            }
        }
    })

    $('.gallery-arrows .arrow__left').click(() => {
        $('.gallery-carousel').trigger('prev.owl.carousel', [700]);
    })

    $('.gallery-arrows .arrow__right').click(() => {
        $('.gallery-carousel').trigger('next.owl.carousel', [700]);
    })


    //______VIDEOS______________


    $('.videos-carousel').owlCarousel({

        margin: 20,
        video: true,
        mouseDrag: false,
        stagePadding: 200,
        startPosition: 1,
        responsive: {
            0 : {
                stagePadding: 35,
                items: 1,
            },

            670: {
                stagePadding: 75,
                items: 2
            },

            1200: {
                stagePadding: 200,
                items: 3,
            },

        } 
    });


    $('.videos-arrows .arrow__left').click(() => {
        $('.videos-carousel').trigger('prev.owl.carousel', [700]);
    })

    $('.videos-arrows .arrow__right').click(() => {
        $('.videos-carousel').trigger('next.owl.carousel', [700]);
    })


     //______ART______________

     $('.art-carousel').owlCarousel({
        dots: true,
        nav: false,
        mouseDrag: true,
        smartSpeed: 700,
        items: 1,
        autoWidth: true,
    })

    $('.art-arrows .arrow__left').click(() => {
        $('.art-carousel').trigger('prev.owl.carousel', [700]);
    })

    $('.art-arrows .arrow__right').click(() => {
        $('.art-carousel').trigger('next.owl.carousel', [700]);
    })



    //__________LAW___________

    $('.law-tab__name').click(function(){
        let parent = $(this).parent()
        if(parent.hasClass('law-tab__item-open')) {
            $('.law-tab__item').removeClass('law-tab__item-open')
        } else {
            $('.law-tab__item').removeClass('law-tab__item-open')
            parent.addClass('law-tab__item-open')
        }
    })

    $('.law__nav a').click(function(e) {
        e.preventDefault()
        let index = $(this).index('.law__nav a')
        $('.law__nav a').removeClass('current')
        $('.law-tab').css('display', 'none')
        $(this).addClass('current')
        $('.law-tab').eq(index).css('display', 'block')
    })


    
    //_____________INPUTMASK__________


    $('.form__tel').inputmask("+\\9\\98 99 999 99 99")

})