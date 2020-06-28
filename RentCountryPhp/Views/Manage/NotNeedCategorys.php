<?php include 'Views/Layout/Header.php';?>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <table>
                        <?php foreach ($categoryList as $category):?>
                        <table>
                            <tr>
                                <td><?php echo $category['name'];?></td>
                                <td><button class="del" value="<?php echo $category['id'];?>">Удалить</button></td>
                            </tr>
                        </table>
                        <?php endforeach;?>
                    </table>
                <form action="#" method="post" enctype="multipart/form-data">
                
                    <input type="text" name="name" placeholder="name category"/>                   
                    <input type="submit" name="submit" value="Add" />
                </form>
                </div>
            </div>
        </div>
        <script>
            $('table').on('click','.del',function(){
                var removeId = $(this).val();
                $(this).parent().remove();
                $.post('DeleteCategoryAjax/'+removeId, null, function(data){
                    
                });
            });
        </script>
   <?php include 'Views/Layout/Footer.php';?>
