if (window.innerWidth < window.innerHeight | window.outerWidth < window.outerHeight) {
    alert('Change orientation');
    $('body').css('display', 'none');
}
var mql = window.matchMedia("(orientation: landscape)");
var landscape;
mql.addListener(function (m) {
    if (m.matches) {
        // Изменено на горизонтальный режим
        $('body').css('display', 'block');
        landscape = true;
    }
    else {
        // Изменено на портретный режим
        alert('Change orientation');
        $('body').css('display', 'none');
        landscape = false;
    }
});
if (mql.matches | landscape) {
    $('body').css('display', 'block');
    var chat;
    var noJson;
    var selected = [];
    var allcards;
    var to_sale;
    var rand_src_skin;
    var element;
    var padding_pl_card;
    var game_id;
    var card_name;

    $(function () {

        // Ссылка на автоматически-сгенерированный прокси хаба
        chat = $.connection.gameHub;

        chat.client.gettingCards = function (allcards) {
            //refreshGame();
            animGettingCards();
            $("#loading").modal('hide');
            noJson = JSON.parse(allcards);
            var i = 0;
            $('.player span img').each(function () {
                //$(this).attr('class', noJson[i].JsClass);
                $(this).attr('id', noJson[i].Name);
                $(this).attr('src', '/Content/Cards/' + noJson[i].Name + '.svg');
                i++;
            });
            $('.enemy span img').each(function () {
                $(this).attr('src', '/Content/Cards/skin_' + rand_src_skin + '.svg');
            })
        };
        chat.client.getWaitModelId = function (waitModelId) {
            game_id = waitModelId;
        }
        chat.client.refreshMove = function () {
            chat.server.fieldRefresh(game_id);

        };

        chat.client.queue = function (queue) {
            if (queue == "able_pass") {
                $('.container_btn a').removeClass('disable_pass');
                $('.container_btn_refresh').css('display', 'none');
                $('.waiting_opponent').css('display', 'none');

            }
            if (queue == "disable_pass") {
                $('.container_btn a').addClass('disable_pass');
                refreshGame();
                $('.waiting_opponent').css('display', 'block');
            }
        };

        function flipCards(place) {
            $(place).each(function () {
                card_name = $(this).attr('id');
                $(this).attr('src', '/Content/Cards/' + card_name + '.svg').addClass('animated flipInX');
            });
        }

        function appendCards(place, noJson) {
            if (place == '.field') {
                for (i = 0; i < noJson.CountCard; i++)
                    $(place).append('<img style="transform: rotate(' + randomInteger(10, 350) + 'deg); position: absolute; left: 50%" src=/Content/Cards/skin_' + rand_src_skin + '.svg id=' + noJson.OneCard + ' />');
            }
            else
                $('.field img').each(function () {
                    card_name = $(this).attr('id');
                    if (place == '.player')
                        $(place).append('<span><img class="card animated fadeIn" src="/Content/Cards/' + card_name + '.svg"' + ' id="' + card_name + '" /></span>');
                    else
                        $(place).append('<span><img class="card animated fadeIn" src="/Content/Cards/skin_' + rand_src_skin + '.svg"></span>');
                });
        }

        function deleteFieldCards(place) {
            element = document.querySelector('.field img');

            if (place == 'offtable')
                $('.field img').addClass('animated fadeOut');
            else if (place == 'player')
                $('.field img').addClass('animated shake');
            else if (place == 'enemy')
                $('.field img').addClass('animated fadeOutUpBig');

            element.addEventListener('animationend', function () {
                $('.field').children().remove();
                if ($('.player img').length == 0)
                    determineWinner();
            });

            
        }

        function deleteEnemyCards(count) {
            $('.enemy span').each(function () {
                if (count >= 0)
                    $(this).remove();
                count--;
            });
        }

        function determineWinner() {
                chat.server.endGame();
            
                
            //else if ($('.field img').length == 0 & $('.player img').length != 0 & $('.enemy img').length == 0)
            //    playAgain(false);
        }

        chat.client.playAgain = function (result) {
            if (result) {
                $('.container_btn_refresh').css('display', 'block');
                $('.AFK').html('You win <br/> Play again?');
            }

            else {
                $('.container_btn_refresh').css('display', 'block');
                $('.AFK').html('You loose <br/> Play again?');
            }
                
            refreshGame(1);
        }

        chat.client.gettingUpdate = function (updates) {
            noJson = JSON.parse(updates);

            if (noJson.Distributor == "offtable") {
                flipCards('.field img');
                var new_cards = noJson.CountCard;
                appendCards('.offtable');
                deleteFieldCards('offtable');
                while (new_cards > 0) {
                    $('.offtable img').eq(-new_cards).css({ 'transform': 'rotate(' + randomInteger(10, 350) + 'deg)', 'position': 'absolute', 'left': '40%' });
                    new_cards--;
                }
                
            }
            else if (noJson.Distributor == "player") {
                appendCards('.player', noJson);
                flipCards('.field img');
                deleteFieldCards('player');
                set_position_card('.player');
                deleteEnemyCards(noJson.CountCard);
            }
            else if (noJson.Distributor == "enemy") {
                appendCards('.enemy', noJson);
                flipCards('.field img');
                deleteFieldCards('enemy');
                set_position_card('.enemy');
            }
            else if (noJson.Distributor == "pass") {
                appendCards('.field', noJson);
                $('.notify').html('<span class="col-md-12">' + noJson.CountCard + 'x</span><br/><span class="col-md-12 increase_span">' + noJson.Notify + '</span>');

                if ($('.container_btn').attr('class') == 'disable_pass')
                    deleteEnemyCards(noJson.CountCard);
            }
            $('.dropdown_w_count').css('display', 'none');
        }
    });

    //---------------------------------------------Dropdown
    $('.dropdown_el').click(function () {
        to_sale = $(this).attr('id');
        $('.to_sale').html(' sale' + ' ' + to_sale);
    });

    //---------------------------------------------Pass

    $('.pass_btn').click(function () {

        $('.waiting_opponent').css('display', 'none');

        allcards = {
            OneCard: $(selected[0]).attr('id'),
            TwoCard: $(selected[1]).attr('id'),
            ThreeCard: $(selected[2]).attr('id'),
            FourCard: $(selected[3]).attr('id'),
            FakeCard: to_sale !== "null" ? to_sale : null,
            CountCard: selected.length,
            Notify: to_sale,
            GameId: game_id,
            Trust: null
        };

        if (to_sale == null | to_sale == undefined) {
            alert('Choose to sale!');
        } else {
            var json_allcards = JSON.stringify(allcards);

            $('.notify').html('<span class="col-md-12">' + selected.length + 'x</span><br/><span class="increase_span col-md-12">' + to_sale + '</span>');

            $('.select_card').each(function () {
                $(this).addClass('animated fadeOutUp').css('transform', 'rotateY(100deg)');
                element = document.querySelector('.select_card');
            });

            element.addEventListener('animationend', function () {
                chat.server.send(json_allcards);
                $('.select_card').remove();
            });

            selected = [];

            reset_position_card('.player');
        }
    });

    $('.trust').click(function () { trustHandler(true); });

    $('.no_trust').click(function () { trustHandler(false); });

    function trustHandler(trust) {
        allcards = {
            OneCard: noJson.OneCard,
            TwoCard: noJson.TwoCard,
            ThreeCard: noJson.ThreeCard,
            FourCard: noJson.FourCard,
            FakeCard: noJson.FakeCard,
            CountCard: noJson.CountCard,
            Notify: noJson.Notify,
            GameId: game_id,
            Trust: trust
        };
        var Json_allcard = JSON.stringify(allcards);
        chat.server.send(Json_allcard);
    }

    // Открываем соединение
    $.connection.hub.start().done(function () {
        chat.server.createGame();
        rand_src_skin = randomInteger(0, 19);
        padding_pl_card = 1;

        $(document).ready(function () {
            $("#loading").modal('show');
        });
        //TestPass();
    });




    //--------------------------------------------------------------------------------------------------------------------------------
    function TestPass() {
        allcards = {
            OneCard: '5_of_Diamonds',
            TwoCard: '5_of_Diamonds',
            ThreeCard: '',
            FourCard: '',
            FakeCard: '5_of_Diamonds',
            CountCard: 7,
            Notify: 'OneCard',
            GameId: game_id,
            Trust: true
        };

        var json_allcards = JSON.stringify(allcards);

        $('.notify').html(selected.length + ' ' + '<span class="increase_span">' + to_sale + '</span>');

        chat.server.send(json_allcards);



        selected = [];
    };



    //---------------------------------------------Selected Player Cards

    $('.player').on('click', '.card', function () {
        if (IsContainById($(this), selected)) {
            ArrItemDeleteById($(this), selected);

            $(this).attr('src', '/Content/Cards/' + $(this).attr('id') + '.svg');

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
            $('.count_cards').html(count_cards + ' ' + 'cards').css('display', 'inline-block');

            if (selected.length === 0)
                $('.count_cards').html(count_cards + ' ' + 'card');

            $(this).attr('src', '/Content/Cards/' + $(this).attr('id') + '_anim.svg').addClass('select_card');
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

    function randomInteger(min, max) {
        var rand = min - 0.5 + Math.random() * (max - min + 1)
        rand = Math.round(rand);
        return rand;
    }

    //---------------------------------------------Position Cards
    function set_position_card(party) {
        var position_card = $(party).children('span');
        $.each(position_card, function (index) {
            $(position_card[index]).css('margin-right', '-' + randomInteger(44, 66));
        });
        position_card = $(party).children('span').children('img');
        $.each(position_card, function (index) {
            $(position_card[index]).css('margin-top', '-' + randomInteger(44, 66));
        });
        if ($('.player').children().length > 28) {
            $('.card').css({ 'height': '140px', 'width': '97px' });
            $('img').css({ 'height': '140px', 'width': '97px' });
        }
    }
    set_position_card('.player');
    set_position_card('.enemy');

    function reset_position_card(party) {
        var position_card = $(party).children('span');
        $.each(position_card, function (index) {
            $(position_card[index]).css('padding-right', padding_pl_card + '%');
        });
        padding_pl_card = padding_pl_card + 0.4;
    }

    //---------------------------------------------Scale
    $('.player').on('mouseenter', '.card', function (event) {
        $(this).addClass('animated fadeIn').css({ 'height': '250px', 'width': '179px', 'z-index': '2' });
    }).on('mouseleave', '.card', function (event) {
        $(this).removeClass('animated fadeIn').css({ 'height': '150px', 'width': '107px', 'z-index': '0' });
    });

    $(window).on('beforeunload', function () {
        return 'are you sure you want to leave?';
    });
}

if (window.outerWidth < 700 | window.innerWidth < 700) {
    $('.player').on('mouseenter', '.card', function (event) {
        $(this).addClass('animated fadeIn').css({ 'height': '210px', 'width': '149px', 'z-index': '2' });
    }).on('mouseleave', '.card', function (event) {
        $(this).removeClass('animated fadeIn').css({ 'height': '100px', 'width': '72px', 'z-index': '0' });
    });
}

function animGettingCards() {
    $('.anim_getting_card').css('display', 'block');
    $('.anim_getting_card img').each(function () {
        $(this).attr('src', '/Content/Cards/skin_' + rand_src_skin + '.svg')
    });
    var allcards = document.querySelectorAll('.card');
    var coord;
    var i = 0;

    var gettind = setInterval(function () {
        if (allcards[i] != undefined) {
            coord = allcards[i].getBoundingClientRect();
            $('.anim_getting_card').eq(i).css('transform', 'translate(' + coord.left + 'px, ' + coord.top + 'px)');
            i++;
        }
    }, 60);
    setTimeout(function () {
        clearInterval(gettind);
        $('.enemy, .player, .container_btn').css('opacity', '1');
        $('.anim_getting_card').css('display', 'none');
    }, 4250);
}

function refreshGame(timer) {
    var timer = 0;

    setTimeout(function () {
        timer++;
        if (timer == 1) {
            $('.container_btn_refresh').css('display', 'block').click(function () {
                location.reload(true);
                $(this).css('display', 'none');
            });
        }
    }, 90000);
    $('.pass_btn').click(function () {
        $('.container_btn_refresh').css('display', 'none');
    });
}


