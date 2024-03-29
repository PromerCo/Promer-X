(function ($) {
    "use strict";
    var $body = $('body'),
        $preloader = $('#preloader'),
        preloaderDelay = 1200,
        preloaderFadeOutTime = 500,
        $siteHeader = $('.site-header'),
        $navToggle = $('#navigation-toggle'),
        firstPart = 'home';

    function getWindowWidth() {
        return Math.max($(window).width(), window.innerWidth);
    }

    function getWindowHeight() {
        return Math.max($(window).height(), window.innerHeight);
    }

    function getDocumentWidth() {
        return Math.max($(document).width(), document.body.clientWidth);
    }

    function blum_preloader() {
        $preloader.delay(preloaderDelay).fadeOut(preloaderFadeOutTime);
    }

    function blum_pageLayout() {
        var siteParts = $('.site-part').length,
            sitePartsWidth = siteParts * getDocumentWidth();
        $('.site-part').css('width', getDocumentWidth());
        $('.site-content-inner').css('width', sitePartsWidth);
        if (getWindowWidth() >= 992) {
            $navToggle.removeClass('open');
            $('.header-collapse').css('display', '');
        }
    }

    function blum_showSitePart(target) {
        if ($(target).length > 0) {
            if ($(target).hasClass('active')) {
                return false;
            }
            var position = $(target).index();
            if (position > 0) {
                position = position * -1;
            }
            var move = position * getDocumentWidth();
            $('.site-content-inner').css('transform', 'translate3d(' + move + 'px, 0px, 0px)');
            $('.site-part').removeClass('active');
            $('#navigation li').removeClass('active');
            $('#navigation a[href="' + target + '"]').parents('li').addClass('active');
            setTimeout(function () {
                if (!$body.hasClass('mobile')) {
                    $('.site-part .animated').each(function () {
                        var elem = $(this),
                            animation = elem.data('animation');
                        elem.removeClass(animation + " visible");
                    });
                }
                $(target).addClass('active');
                if (!$body.hasClass('mobile')) {
                    $(target).find('.animated').each(function () {
                        var elem = $(this),
                            animation = elem.data('animation');
                        if (!elem.hasClass('visible')) {
                            var animationDelay = elem.data('animation-delay');
                            if (animationDelay) {
                                setTimeout(function () {
                                    elem.addClass(animation + " visible");
                                }, animationDelay);
                            } else {
                                elem.addClass(animation + " visible");
                            }
                        }
                    });
                }
            }, 500);
        }
    }

    function blum_showSitePartResponsive() {
        var currentPart = $('#navigation li.active').find('a').attr('href');
        if ($('#navigation li.active').length === 0) {
            currentPart = $('#navigation li').first().find('a').attr('href');
        }
        var position = $(currentPart).index();
        if (position > 0) {
            position = position * -1;
        }
        var move = position * getDocumentWidth();
        $('.site-content-inner').css('transform', 'translate3d(' + move + 'px, 0px, 0px)');
    }

    function blum_navigation() {
        $navToggle.on('click', function (e) {
            e.preventDefault();
            if (!$(this).hasClass('open')) {
                $(this).addClass('open');
                $('.header-collapse').slideDown(500);

            } else {
                $('.header-collapse').slideUp(500);
                $(this).removeClass('open');

            }
        });
        $('body').on('click','.fullscreen',function(){
            // alert(123)
            $('.header-collapse').css('display', '');

        })
        $('body').on('click', '#navigation a, a.scrollto', function (e) {
            if (this.hash !== '') {
                if ($(this.hash).length > 0) {
                    e.preventDefault();
                    blum_showSitePart(this.hash);
                }
            }

        });
        $(document).keydown(function (e) {
            if ($('input,select,textarea').is(':focus')) {
                return true;
            }
            var currentPart = $('#navigation li.active');
            if ($('#navigation li.active').length === 0) {
                currentPart = $('#navigation li').first();
            }
            if (e.keyCode == 37 || e.keyCode == 40) {
                var prev_target = currentPart.prev().find('a').attr('href');
                blum_showSitePart(prev_target);
            } else if (e.keyCode == 39 || e.keyCode == 38) {
                var next_target = currentPart.next().find('a').attr('href');
                blum_showSitePart(next_target);
            }
        });
    }

    function blum_showFirstPart() {
        $('#navigation a[href="#' + firstPart + '"]').trigger('click');
    }

    function blum_backgrounds() {
        var $bgImage = $('.bg-image-holder');
        if ($bgImage.length) {
            $bgImage.each(function () {
                var src = $(this).children('img').attr('src');
                var $self = $(this);
                $self.css('background-image', 'url(' + src + ')').children('img').hide();
            });
        }
        if ($body.hasClass('slideshow-background')) {
            $body.vegas({
                preload: true,
                timer: false,
                delay: 5000,
                transition: 'fade',
                transitionDuration: 1000,
                slides: [{
                    src: 'images/promer.co.prometheus.jpg'
                }, {
                    src: 'images/promer.co.internet.jpg'
                }, {
                    src: 'images/promer.co.film.jpg'
                }, {
                    src: 'images/promer.co.media.jpg'
                }]
            });
        }
        if ($body.hasClass('slideshow-zoom-background')) {
            $body.vegas({
                preload: true,
                timer: false,
                delay: 7000,
                transition: 'zoomOut',
                transitionDuration: 4000,
                slides: [{
                    src: 'images/promer.co.prometheus.jpg'
                }, {
                    src: 'images/promer.co.internet.jpg'
                }, {
                    src: 'images/promer.co.film.jpg'
                }, {
                    src: 'images/promer.co.media.jpg'
                }]
            });
        }
        if ($body.hasClass('slideshow-video-background')) {
            $body.vegas({
                preload: true,
                timer: false,
                delay: 5000,
                transition: 'fade',
                transitionDuration: 1000,
                slides: [{
                    src: 'images/promer.co.prometheus.jpg'
                }, {
                    src: 'video/promer.co.film.jpg',
                    video: {
                        src: ['video/marine.mp4', 'video/marine.webm', 'video/marine.ogv'],
                        loop: false,
                        mute: true
                    }
                }, {
                    src: 'images/promer.co.internet.jpg'
                }, {
                    src: 'images/promer.co.media.jpg'
                }]
            });
        }
        if ($body.hasClass('kenburns-background')) {
            var kenburnsDisplayBackdrops = false;
            var kenburnsBackgrounds = [{
                src: 'images/promer.co.prometheus.jpg',
                valign: 'top'
            }, {
                src: 'images/promer.co.internet.jpg',
                valign: 'top'
            }, {
                src: 'images/promer.co.film.jpg',
                valign: 'top'
            }, {
                src: 'images/promer.co.media.jpg',
                valign: 'top'
            }];
            $body.vegas({
                preload: true,
                transition: 'swirlLeft2',
                transitionDuration: 4000,
                timer: false,
                delay: 10000,
                slides: kenburnsBackgrounds,
                walk: function (nb) {
                    if (kenburnsDisplayBackdrops === true) {
                        var backdrop;
                        backdrop = backdrops[nb];
                        backdrop.animation = 'kenburns';
                        backdrop.animationDuration = 20000;
                        backdrop.transition = 'fade';
                        backdrop.transitionDuration = 1000;
                        $body.vegas('options', 'slides', [backdrop]).vegas('next');
                    }
                }
            });
        }
        if ($('#youtube-background').length > 0) {
            var videos = [{
                videoURL: "iXkJmJa4NvE",
                showControls: false,
                containment: '.overlay-video',
                autoPlay: true,
                mute: true,
                startAt: 0,
                opacity: 1,
                loop: true,
                showYTLogo: false,
                realfullscreen: true,
                addRaster: true
            }];
            $('.player').YTPlaylist(videos, true);
        }
        if ($('#youtube-multiple-background').length > 0) {
            var videos = [{
                videoURL: "CG20eBusRg0",
                showControls: false,
                containment: '.overlay-video',
                autoPlay: true,
                mute: true,
                startAt: 0,
                opacity: 1,
                loop: false,
                showYTLogo: false,
                realfullscreen: true,
                addRaster: true
            }, {
                videoURL: "iXkJmJa4NvE",
                showControls: false,
                containment: '.overlay-video',
                autoPlay: true,
                mute: true,
                startAt: 0,
                opacity: 1,
                loop: false,
                showYTLogo: false,
                realfullscreen: true,
                addRaster: true
            }];
            $('.player').YTPlaylist(videos, true);
        }
        if ($body.hasClass('mobile')) {
            $('.video-wrapper').css('display', 'none');
        }
        $('[data-gradient-bg]').each(function (index, element) {
            var granimParent = $(this),
                granimID = 'granim-' + index + '',
                colours = granimParent.attr('data-gradient-bg'),
                colours = colours.replace(' ', ''),
                colours = colours.replace(/'/g, '"')
            colours = JSON.parse(colours);
            granimParent.prepend('<canvas id="' + granimID + '"></canvas>');
            var granimInstance = new Granim({
                element: '#' + granimID,
                name: 'basic-gradient',
                direction: 'left-right',
                opacity: [1, 1],
                isPausedWhenNotInView: true,
                states: {
                    "default-state": {
                        gradients: colours
                    }
                }
            });
        });
    }

    function blum_countdown() {
        var countdown = $('.countdown[data-countdown]');
        if (countdown.length > 0) {
            countdown.each(function () {
                var $countdown = $(this),
                    finalDate = $countdown.data('countdown');
                $countdown.countdown(finalDate, function (event) {
                    $countdown.html(event.strftime('<div class="countdown-container row"><div class="countdown-item col-6 col-sm-auto"><div class="number">%-D</div><span>Day%!d</span></div><div class="countdown-item col-6 col-sm-auto"><div class="number">%H</div><span>Hours</span></div><div class="countdown-item col-6 col-sm-auto"><div class="number">%M</div><span>Minutes</span></div><div class="countdown-item col-6 col-sm-auto"><div class="number">%S</div><span>Seconds</span></div></div>'));
                });
            });
        }
    }

    function blum_mailchimp() {
        var subscribeForm = $('.subscribe-form');
        if (subscribeForm.length < 1) {
            return true;
        }
        subscribeForm.each(function () {
            var el = $(this),
                elResult = el.find('.subscribe-form-result');
            el.find('form').validate({
                submitHandler: function (form) {
                    elResult.fadeOut(500);
                    $(form).ajaxSubmit({
                        target: elResult,
                        dataType: 'json',
                        resetForm: true,
                        success: function (data) {
                            elResult.html(data.message).fadeIn(500);
                            if (data.alert != 'error') {
                                $(form).clearForm();
                                setTimeout(function () {
                                    elResult.fadeOut(500);
                                }, 5000);
                            };
                        }
                    });
                }
            });
        });
    }

    function blum_contactForm() {
        var contactForm = $('.contact-form');
        if (contactForm.length < 1) {
            return true;
        }
        contactForm.each(function () {
            var el = $(this),
                elResult = el.find('.contact-form-result');
            el.find('form').validate({
                submitHandler: function (form) {
                    elResult.fadeOut(500);
                    $(form).ajaxSubmit({
                        target: elResult,
                        dataType: 'json',
                        success: function (data) {
                            elResult.html(data.message).fadeIn(500);
                            if (data.alert != 'error') {
                                $(form).clearForm();
                                setTimeout(function () {
                                    elResult.fadeOut(500);
                                }, 5000);
                            };
                        }
                    });
                }
            });
        });
    }
    $(window).on('load', function () {
        blum_pageLayout();
        blum_preloader();
    });
    $(document).ready(function ($) {
        blum_pageLayout();
        blum_navigation();
        blum_backgrounds();
        blum_countdown();
        blum_mailchimp();
        blum_contactForm();
        blum_showFirstPart();
    });
    $(window).on('resize', function () {
        blum_pageLayout();
        blum_showSitePartResponsive();
    });
})(jQuery);
