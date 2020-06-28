<?php include 'Views/Layout/Header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-2">
            <h2><?php echo $user['login'];?></h2>
            <h2><?php echo $user['email'];?></h2>
            <a href="/index.php/Profile/Edit/<?php echo $_SESSION['userid']; ?>">Редактировать</a>
        </div>
    </div>
</div>
<?php include 'Views/Layout/Footer.php'; ?>