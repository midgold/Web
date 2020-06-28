<?php include 'Views/Layout/Header.php';?>
        <div class="container">
            <div class="row">
                <div class="col-2">                
                    <form action="#" method="post" id="form">
                    <h2>login</h2>
                    <h6 class="login"></h6>
                    <input type="text" name="login" id="login"/>
                    <h2>email</h2>
                    <h6 class="email"></h6>
                    <input type="email" name="email" id="email"/>
                    <h2>password</h2>
                    <h6 class="password"></h6>
                    <input type="password" name="password" id="password"/>
                    <input type="submit" name="submit" value="Register" disabled="" class="formsub"/> 
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
<?php include 'Views/Layout/Footer.php';?>