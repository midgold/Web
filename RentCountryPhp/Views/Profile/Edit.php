<?php include 'Views/Layout/Header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-2">
            <form action="#" method="post" enctype="multipart/form-data">
                <h4>Login</h4>
                <input id="login" type="text" name="login" value="<?php echo $user['login'];?>"/>
                <h4>Password</h4>
                <input id="password" type="password" name="password"/>
                <h4>Email</h4>
                <input id="email" type="email" name="email" value="<?php echo $user['email'];?>"/> 
                <input type="submit" name="submit" value="Редактировать" />
            </form>
        </div>
    </div>
</div>
<script>
    $('#form').on('input keyup', function (e){
        var report = {
                      login : $('#login').val(),
                      password : $('#password').val(),
                      email : $('#email').val()
                    };
        $.post('/ValidTestAjax.php', report, function(data){
            var result = JSON.parse(data);
            if(report.login)
                $('.login').html(result.login);
            if(report.password)
                $('.password').html(result.password);
            if(report.email)
                $('.email').html(result.email);
            
            if(result.access){
                $('.formsub').removeAttr('disabled');
            }else{
                $('.formsub').attr('disabled', '');
            }
            
        });
    })
</script>
<?php include 'Views/Layout/Footer.php'; ?>

