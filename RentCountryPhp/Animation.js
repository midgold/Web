var slides_counter = 0;
var prev = 0;

//--------------------header--------------------

$('header .menu_ico').click(function () {
    $('header .menu li').toggle("slow", function () { });
});

$(window).resize(function () {
    if ($(window).width() > 768)
        $('header .menu li').css('display', 'inline-block');
    if ($(window).width() < 768)
        $('header .menu li').css('display', 'none');
});


//--------------------slider--------------------

function slide () {
    $('.slides_img').each(function () { $(this).css('opacity', '0'); });
    $('.slides_img').eq(slides_counter).animate({ opacity: 1 }, 1000);

    $('.photo_sld').each(function () { $(this).css('opacity', '0'); });
    $('.photo_sld').eq(slides_counter).animate({ opacity: 1 }, 1000);

    $('.li').each(function () { $(this).removeClass('curry'); });
    $('.li').eq(slides_counter).addClass('curry');

    slides_counter++;

    if (slides_counter === 3)
        slides_counter = 0;
}

$('.next').click(function () {
    slide();
});

$('.prev').click(function () {
    $('.slides_img').each(function () { $(this).css('opacity', '0'); });
    $('.slides_img').eq(-prev).animate({ opacity: 1 }, 1000);

    $('.photo_sld').each(function () { $(this).css('opacity', '0'); });
    $('.photo_sld').eq(-prev).animate({ opacity: 1 }, 1000);

    $('.li').each(function () { $(this).removeClass('curry'); });
    $('.li').eq(-prev).addClass('curry');

    prev++;

    if (prev === 1)
        prev = -2;
});

slide();

setInterval(slide, 5000);

function resize_img() {
    var height_img = $('.slides_img').height();
    $('.slider_wrap').css({ height: height_img });
}
resize_img();
$(window).ready(resize_img);
$(window).resize(resize_img);



//--------------------popup--------------------

function popup() {
    $('.popup').hide();
    $('.popup-content').hide();
}

popup();

$('.button_order').click(function () {
    $('.popup').show();
    $('.popup-content').show();
});

$('.popup').click(function () {
    $('.popup').hide();
    $('.popup-content').hide();

});

//--------------------reviews--------------------
var cl = true;
$('.right .img').click(function () {

    qwe($('.right'));
    
});

$('.left .img').click(function () {

    qwe($('.left'));
   
});

function qwe(el) {

    var clas = el.attr('class');
    $('.' + clas + ' .non_see').toggle("slow", function () {
        if (cl) {
            $('.' + clas + ' .see').css('display', 'inline-block');

            $('.' + clas + ' .points').hide();
            $('.' + clas + ' .img').attr('src', '/FirstLanding/Content/Images/279.svg');

            cl = false;
        } else {
            $('.' + clas + ' .points').show();
            $('.' + clas + ' .img').attr('src', '/FirstLanding/Content/Images/278.svg');
            cl = true;
        }
    });
}

//--------------------animation--------------------

$(window).ready(function () {
    $(window).scroll(function () {
        if ($(window).scrollTop() > 70)
            $('.green img').animate({ opacity: 1 }, 1000);

        if ($(window).scrollTop() > 240)
            $('.link_green .link').animate({ marginRight: 0 }, 1000);

        if ($(window).scrollTop() > 540 )
            $('#h1_f').animate({ opacity: 1 }, 1000);

        if ($(window).scrollTop() > 1700)
            $('#h1_s').animate({ opacity: 1 }, 1000);

        if ($(window).scrollTop() > 3200)
            $('.submit h2').animate({ marginLeft: 0 }, 1000);

        if ($(window).scrollTop() > 3400)
            $('.inp_anim').animate({ opacity: 1 }, 1000);

        if ($(window).scrollTop() > 3700) {
            $('.grid h1').animate({ marginTop: 25 }, 1000);
            $('.grid img').animate({ opacity: 1 }, 1000);
            $('.grid .photo').animate({ opacity: 1 }, 1000);
        }

        if ($(window).scrollTop() > 5000)
            $('.left').animate({ marginRight: 0 }, 700);

        if ($(window).scrollTop() > 5500)
            $('.contacts h1').animate({ marginRight: 0 }, 700);
    });
});


