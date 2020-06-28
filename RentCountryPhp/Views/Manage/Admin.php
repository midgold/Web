<?php include 'Views/Layout/Header.php';?>
        <div class="container">
            <div class="row">
                <select>
                    <option selected="">Все категории</option>
                </select>
                <input type="text" class="search" placeholder="Поиск"/>
                <a href="AddHouse">Добавить Дом</a>
                <table class="table">
                    <?php foreach ($productList as $product):?>
                    <tr>
                        <td><?php echo $product['name']?></td>
                        <td><?php echo $product['short_description']?></td>
                        <td><a href="EditHouse/<?php echo $product['id']?>">Редактировать</a></td>
                        <td><button class="del" value="<?php echo $product['id']?>">Удалить</button></td>
                    </tr>
                    <?php endforeach;?>
                </table>
                <div class="test">
                    
                </div>
            </div>              
        </div>
        <script>
           $.post('ListCategoryAjax', null, function(data){
               var list = JSON.parse(data);
               $(list).each(function(index, data){
                   $('select').append('<option value="'+data.id+'">'+data.name+'</option>');
               })
           })
           $('select').change(function(){
               var categoryId = $(this).val();
               $('tr').remove();
               if(categoryId == 'Все категории'){                  
                      PostTask('GetProductsAjax');
                   } else {
                        PostTask('GetProductsByCategoryAjax/' + categoryId);
                   }
               });
            $('.search').change(function (){
                var searchString = $(this).val();
                $('tr').remove();
                    PostTask('SearchingAjax/'+searchString);
            });
            $('.del').click(function(){
                Delete(this, 'DeleteProductAjax/');
            });    
            
    function PostTask(url){
    $.post(url, null, function(data){
           var list = JSON.parse(data);
           $(list).each(function(index, data){
               var name = '<td>'+data.name+'</td>';
               var short_description = '<td>'+data.short_description+'</td>';
               var id = '<td><a href="EditHouse/'+data.id+'">Редактировать</a></td>';
               var remove = '<td><button class="del" value="' + data.id +'">Удалить</button></td>';
               $('table').append('<tr>'+name+short_description+id+ remove + '</tr>');
                   });
               })
               }
        </script>
    <?php include 'Views/Layout/Footer.php';?>