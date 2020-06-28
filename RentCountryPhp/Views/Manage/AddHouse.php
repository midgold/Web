<?php include 'Views/Layout/Header.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-2">
            <form action="#" method="post" enctype="multipart/form-data">
                <h4>Name</h4>
                <input type="text" name="name"/>
                <h4>inner_title</h4>
                <input type="text" name="inner_title"/>
                <h4>short_description</h4>
                <input type="text" name="short_description"/>
                <h4>description</h4>
                <input type="text" name="description"/>
                <h4>category</h4>
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
                <h4>image</h4>
                <input type="file" name="image0"/>
                <input type="file" name="image1"/>
                <input type="file" name="image2"/>
                <input type="file" name="image3"/>
                <input type="file" name="image4"/>
                <h4>miniature</h4>
                <input type="file" name="miniature"/>
                <h4>price</h4>
                <input type="text" name="price"/>
                <input type="submit" name="submit"/>
            </form>
        </div>
    </div>
</div>
<?php include 'Views/Layout/Footer.php'; ?>