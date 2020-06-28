$('.pass_btn').click(function () {
    $('.flip-card-inner').css('transform', 'rotateY(180deg)');
    $('.flip-card-front').addClass('animated fadeInUp');
    $('.flip-card-back').css({
        'background-image': 'url(/Content/Cards/Skin.png)',
        'background-size': '100px 140px'
    });
    setTimeout(function () {
        $('.select_card').remove()
    }, 500);
});