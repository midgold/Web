<html>
<head>
    <link href="/Content/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/Content/Site.css" rel="stylesheet" />
    <link href="/Content/media.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+SC:700" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.js"></script>
    <script src="/Content/bootstrap.js" type="text/javascript"></script>
    <title>Rent of country houses</title>
</head>
<body>
    <div class="popup"></div>
    <div class="popup-content">
        <div class="popup-back">
            <form action="#" method="post" class="mail">
                <h1>Confirm order</h1>
                <input class="inp" type="text" name="name" placeholder="Enter your contact name" />
                <input class="inp" type="text" name="mobile" placeholder="Enter your mobile phone" />
                <input class="inp" type="email  " name="email" placeholder="Enter your email address" />
                <input class="inp sub confirmation" value="Submit" type="button" name="submit">
            </form>
        </div>
    </div>

    <header>
        <div class="container">
            <div class="align">
                <img class="menu_ico" src="/Content/Images/Icons/Menu ico.svg" />

                <ul class="menu">
                    <li><a class="link_menu cart" href="/index.php/Cart/ShopCart">Корзина(<?php echo count($_SESSION['cart_product_id']);?>)</a></li>
                   
                   
                    <li><a class="link_menu" href="/index.php">Главная</a></li>
                    <li><a class="link_menu" href="/index.php/Home/Houses">Все дома</a></li>
                    <?php if(!isset($_SESSION['userid'])):?>
                    <li><a class="link_menu" href="/index.php/Register/LogIn">Вход</a></li>
                    <?php else:?>
                    <li><a class="link_menu" href="/index.php/Profile/Info/<?php echo $_SESSION['userid'];?>">Привет, <?php echo $_SESSION['name'];?></a></li>
                    <li><a class="link_menu" href="/index.php/Register/LogOut">Выход</a></li>
                    <?php endif;?>
                </ul>

            </div>
        </div>
    </header>