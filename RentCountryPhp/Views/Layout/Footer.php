<div class="line">© 2017</div>


    <script src="/Animation.js"></script>
    <script>
//        $('.some').click(function(){
//            $.ajax({
//                url: 'Mail.php',
//                type: 'post',
//                dataType: 'html',
//                data: 'aaaaaaaaaaaaaa'
//                
//            }).done(function() {
//          console.log('success');   
//        }).fail(function() {
//          console.log('fail');
//        });
//        });
        $('.confirmation').click(function () {
        var param = $(this).parent().serialize();
        $.post('Mail.php', param, function (data) {

        });
    })

    $('.tocart').click(function () {
        $.post('/index.php/Cart/AddToCartAjax/' + $(this).val(), null, function (data) {
                CurrentCountProductCart();
            });
        });
        $('.delcart').click(function () {           
            Delete(this, 'DeleteProductFromSessionAjax/');
            CurrentCountProductCart();
        });
        function CurrentCountProductCart(){
            $.post('/index.php/Cart/CartProductCount/', null, function (data) {
                $('.cart').html('Корзина('+data+')');
            });
        }
        function Delete(item, url) {
            var removeId = $(item).val();
            var parent = $(item).parent().parent().remove();
            $.post(url + removeId, null, function (data) {

            });
        }
    </script>
</body>
</html>