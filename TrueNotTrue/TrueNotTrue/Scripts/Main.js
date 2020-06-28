
var selected = [];
var distribution = ["Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Ace", "Jack", "Queen", "King"];

//---------------------------------------------Distribution
var connect;
var timerId = setInterval(Waiting, 2000);

function Waiting() {
    $.get('/Home/Connect', function (data) {
        if (data === "True") {
            connect = true;
            clearInterval(timerId);
        }
        if (connect) {
            GetPlayerCards();
            GetEnemyCards();
            $('.game_start').fadeOut(4000);
            return;
        }
    });
}

//GetPlayerCards();
//GetEnemyCards();

function GetPlayerCards() {
    $.get('/Home/GetCardsPlayer', function (data) {
        var get_cards = JSON.parse(data);
        var ind = 0;
        var spans = $('.player span').each(function () {
            $(this).attr('class', get_cards[ind].JsClass);
            $(this).children().attr('id', get_cards[ind].Name);
            $(this).children().attr('src', '/Content/Cards/' + get_cards[ind].Name + '.png');
            ind++;
        });
    });
}

function GetEnemyCards() {
    $.get('/Home/GetCardsEnemy', function (data) {
        var get_cards = JSON.parse(data);
        var ind = 0;
        var spans = $('.enemy span').each(function () {
            $(this).attr('class', get_cards[ind].JsClass);
            $(this).children().attr('id', get_cards[ind].Name);
            ind++;
        });
    });
}


//---------------------------------------------Pass

$('.pass_btn').click(function () {
    $('.field').append($('.select_card').parent());
    $('.dropdown_w_count').css('display', 'none');
    $('.select_card').css('border', 'none').attr('src', '/Content/Cards/Skin.jpg');

    var allcards = {
        OneCard: $(selected[0]).parent().attr('class'),
        TwoCard: $(selected[1]).parent().attr('class'),
        ThreeCard: $(selected[2]).parent().attr('class'),
        FourCard: $(selected[3]).parent().attr('class'),
        FakeCard: $('.dropdown').val() !== "null" ? $('.dropdown').val() : null,
        CountCard: selected.length
    };
    var json_allcards = JSON.stringify(allcards);

    $.get('Home/Moves?jsonData=' + json_allcards, function (data) {
        //$('.enemy').html(noJson.OneCard + noJson.TwoCard + noJson.ThreeCard + noJson.FourCard + noJson.FakeCard);
    });

    var timerId = setInterval(function () {
        $.get('/Home/Send', function (data) {
            if (data !== null) {
                var noJson = JSON.parse(data);
                var cardClass = noJson.OneCard;
                $('.field').append($('.' + cardClass));
                clearInterval(timerId);
            }
        });
    }, 1000);

    selected = [];
});

//---------------------------------------------Selected Player Cards

$('.player .card').click(function () {
    if (IsContainById($(this), selected)) {
        ArrItemDeleteById($(this), selected);
        $(this).css('border', 'none').removeClass('select_card');

        if (selected.length < 1)
            $('.dropdown_w_count').css('display', 'none');

        var uncount_cards = selected.length;
        $('.count_cards').html(uncount_cards + ' ' + 'cards');
        if (selected.length < 1)
            $('.count_cards').css('display', 'none');
        if (selected.length === 1)
            $('.count_cards').html(uncount_cards + ' ' + 'card');
        return true;
    }

    if (selected.length < 4) {
        var count_cards = selected.length + 1;
        $('.count_cards').html(count_cards + ' ' + 'cards').css('display', 'block');
        if (selected.length === 0)
            $('.count_cards').html(count_cards + ' ' + 'card');

        $(this).css('border', '1px solid red').addClass('select_card');
        selected.push($(this));
        $('.dropdown_w_count').css('display', 'inline-block');
    }
});

function IsContainById(el, arr) {
    for (var i = 0; i < arr.length + 1; i++) {
        if ($(el).attr('id') === $(arr[i]).attr('id'))
            return true;
    }
    return false;
}

function ArrItemDeleteById(el, arr) {
    for (var i = 0; i < arr.length; i++) {
        if ($(el).attr('id') === $(arr[i]).attr('id'))
            selected.splice(i, 1);
    }
}

//---------------------------------------------Rotate Player Cards
//var deg = 6;
//for (var nth = 1; nth < 27; nth++) {
//    $('.path_card span:nth-of-type(' + nth + ')').css('transform', 'rotate(' + deg + ')');
//    deg + 6;
//    }







//var activecard = {
//    Card: card,
//    Active: true
//};
//card.Name = $(this).attr('id');