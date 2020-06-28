<?php include 'Views/Layout/Header.php';?>    
<section class="all_houses">
        <div class="container">

            <div class="season_btn">
                <a href="/index.php/Home/Houses/Winter">Winter houses</a>
                <a href="/index.php/Home/Houses/Summer">Summer houses</a>
                <a href="/index.php/Home/Houses">Off-season houses</a>
            </div>

            <div class="row">
                <?php foreach ($houses as $house):?>               
                <div class="col-lg-6 col-md-12">
                    <div class="product">
                        <h2><a href="/index.php/Home/House/<?php echo $house['id']?>"><?php echo $house['name']?></a></h2>

                        <div>
                            <img class="product_exterior" src="<?php echo $house['miniature']?>" />

                            <p>
                                <?php echo $house['short_description']?>
                            </p>
                        </div>

                        <div class="product_btn_align">

                            <button class="to_order_l btn_product tocart" value="<?php echo $house['id']?>">В корзину</button>
                            <button class="learn_more_l btn_product">Learn more</button>

                            <input class="star fill_star" />
                            <input class="star fill_star" />
                            <input class="star fill_star" />
                            <input class="star no_fill_star" />
                            <input class="star no_fill_star" />

                        </div>

                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
<script>
//    $.post('Manage/ListCategoryAjax', null, function(data){
//               var list = JSON.parse(data);
//               $(list).each(function(index, data){
//                   $('season_btn').append('<a class="category" value="'+data.id+'">'+data.name+'</a>');
//               })
//           })
//           $('.category').click(function(){
//               var categoryId = $(this).val();
//               $('tr').remove();
//               if(categoryId == 'Все категории'){                  
//                      PostTask('Manage/GetProductsAjax');
//                   } else {
//                        PostTask('Manage/GetProductsByCategoryAjax/' + categoryId);
//                   }
//               });
//            $('.category').click(function (){
//                var searchString = $(this).val();
//                $('tr').remove();
//                    PostTask('Manage/SearchingAjax/'+searchString);
//            });           
//            
//    function PostTask(url){
//    $.post(url, null, function(data){
//           var list = JSON.parse(data);
//           $(list).each(function(index, data){
//               var name = '<td>'+data.name+'</td>';
//               var short_description = '<td>'+data.short_description+'</td>';
//               var id = '<td><a href="EditHouse/'+data.id+'">Редактировать</a></td>';
//               var remove = '<td><button class="del" value="' + data.id +'">Удалить</button></td>';
//               $('table').append('<tr>'+name+short_description+id+ remove + '</tr>');
//                   });
//               })
//               }
</script>
<?php include 'Views/Layout/Footer.php';?>
