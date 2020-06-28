<?php include 'Views/Layout/Header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <img src="<?php echo $productdao->GetImageRoute($images[$i]); ?>">
                            <input type="file" name="image<?php echo $i; ?>" />
                        <?php endfor; ?>
                            <h6>Miniature</h6>
                            <img src="<?php echo $productdao->GetImageRoute($product['miniature']); ?>">
                            <input type="file" name="miniature" />
                    </div>
                    <div class="col-6">
                        <h5>Name</h5>
                        <input type="text" name="name" value="<?php echo $product['name']; ?>"/>
                        <h5>Inner Title</h5>
                        <input type="text" name="inner_title" value="<?php echo $product['inner_title']; ?>"/>
                        <h5>short_description</h5>
                        <input type="text" name="short_description" value="<?php echo $product['short_description']; ?>"/>
                        <h5>description</h5>
                        <input type="text" name="description" value="<?php echo $product['description']; ?>"/>
                        <h5>category</h5>
                        <select name="category">
                            <option value="summer">Летние</option>
                            <option value="winter">Зимние</option>
                        </select>
                        <h4>status</h4>
                        <h6>Нет в наличии</h6>
                        <input type="radio" name="status" value="0"/>
                        <h6>В наличии</h6>
                        <input type="radio" name="status" value="1"/>
                        <h4>grid_type</h4>
                        <h6>1 тип</h6>
                        <input type="radio" name="grid_type" value="0"/>
                        <h6>2 тип</h6>
                        <input type="radio" name="grid_type" value="1"/>
                        <h5>price</h5>
                        <input type="text" name="price" value="<?php echo $product['price']; ?>"/>
                        <input type="submit" name="submit" value="Edit" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    img{
        height: 250px;
        width: 250px;
    }
</style>
<?php include 'Views/Layout/Footer.php'; ?>

