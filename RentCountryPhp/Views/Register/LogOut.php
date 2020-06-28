<?php include 'Views/Layout/Header.php';?>
        <div class="container">
            <div class="row">
                <div class="col-2">
                 <?php if($errors):?>
                    <?php foreach ($errors as $error):?>
                    <p>
                        <?php echo $error?>
                    </p>
                    <?php endforeach;?>
                 <?php endif;?>
                <form action="#" method="post">
                    <h2>login</h2>
                    <input type="text" name="login"/>
                    <h2>email</h2>
                    <input type="email" name="email"/>
                    <h2>password</h2>
                    <input type="password" name="password"/>
                    <input type="submit" name="submit" value="Register" />
                </form>
                    <!--Проверка на логированние-->
                    <?php if(!$user->CheckGuest()):?>
                    <h2>Log in<?php echo $user->GetUserById($_SESSION['userid'])['login'];?></h2>
                    <?php endif;?>
                </div>
            </div>
        </div>
<?php include 'Views/Layout/Footer.php';?>
