<?php
class ProductDAO{
    
    public $dbclass;
    public $db;


    public function __construct() {
        $this ->dbclass = new Db();
        $this ->db = $this ->dbclass->getConnection();
    }
    
    public function AddProduct($name, $inner_title, $short_description, $description, $category, $status, $grid_type, $price, $userid, $images, $miniature){
        
        
        $sql = 'insert into products(name, inner_title, short_description, description, id_category, status, grid_type, price, userid, image, miniature) '.
                'values(:name, :inner_title, :short_description, :description, :id_category, :status, :grid_type, :price, :userid, :image, :miniature)';
        
        $result = $this->db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':inner_title', $inner_title, PDO::PARAM_STR);
        $result->bindParam(':short_description', $short_description, PDO::PARAM_STR);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        $result->bindParam(':id_category', $category, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':grid_type', $grid_type, PDO::PARAM_STR);
        $result->bindParam(':price', $price, PDO::PARAM_INT);
        $result->bindParam(':userid', $userid, PDO::PARAM_INT);
        $result->bindParam(':image', $images, PDO::PARAM_STR);
        $result->bindParam(':miniature', $miniature, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public function UpdateProduct($product){
        
        
        $sql = 'update products set name = :name, inner_title = :inner_title, short_description = :short_description, description = :description, '.
                'id_category = :id_category, status = :status, grid_type = :grid_type, price = :price, image = :image, miniature = :miniature where id = :id';
        
        $result = $this->db->prepare($sql);
        $result->bindParam(':id', $product['id'], PDO::PARAM_INT);
        $result->bindParam(':name', $product['name'], PDO::PARAM_STR);
        $result->bindParam(':inner_title', $product['inner_title'], PDO::PARAM_STR);
        $result->bindParam(':short_description', $product['short_description'], PDO::PARAM_STR);
        $result->bindParam(':description', $product['description'], PDO::PARAM_STR);
        $result->bindParam(':id_category', $product['id_category'], PDO::PARAM_INT);
        $result->bindParam(':status', $product['status'], PDO::PARAM_INT);
        $result->bindParam(':grid_type', $product['grid_type'], PDO::PARAM_INT);
        $result->bindParam(':price', $product['price'], PDO::PARAM_INT);
        $result->bindParam(':image', $product['image'], PDO::PARAM_STR);
        $result->bindParam(':miniature', $product['miniature'], PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public function DeleteProduct($id){
        $sql = 'delete from products where id = :id';
        
        $result = $this->db->prepare($sql);
        
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $result->execute();
    }
    
    public function GetProductById($id){
        $sql = 'select * from products where id = :id';
        
        $result = $this->db->prepare($sql);
        
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        
        $result->execute();
//        $dsfh = $result->fetch();
        return $result->fetch();
    }
    
    public function GetProductByName($name, $userid){
        $sql = 'select * from products where name = :name and userid = :userid';
        
        $result = $this->db->prepare($sql);
        
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':userid', $userid, PDO::PARAM_INT);
        
        $result->execute();
        
        return $result->fetch();
    }
    
    public function GetAllProduct(){
        $sql = 'select id, name, short_description, description, id_category, status, image, miniature from products';
        
        $result = $this->db->query($sql);
        
        $productList = array();
        $i =0;
        while($row = $result->fetch()){
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['short_description'] = $row['short_description'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['id_category'] = $row['id_category'];
            $productList[$i]['status'] = $row['status'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['miniature'] = $row['miniature'];
            $i++;
        }
        
        return $productList;
    }
    public function GetAllProductByCategory($category_id){
        $sql = 'select id, name, short_description, description, id_category, status, image, miniature from products where id_category = :id_category';
        
        $result = $this->db->prepare($sql);
        $result->bindParam(':id_category', $category_id, PDO::PARAM_STR);
        
        $productList = array();
        $result->execute();
        
        $i =0;
        while($row = $result->fetch()){
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['short_description'] = $row['short_description'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['id_category'] = $row['id_category'];
            $productList[$i]['status'] = $row['status'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['miniature'] = $row['miniature'];
            $i++;
        }
        
        return $productList;
    }
    public function MoveAndRenameImage($upload_name,$name, $route) {

        $fileroute = false;
        if (is_uploaded_file($_FILES[$upload_name]['tmp_name'])) {
            $fileroute = $_SERVER['DOCUMENT_ROOT'] . $route . $name . '.jpg';
            move_uploaded_file($_FILES[$upload_name]['tmp_name'], $fileroute);
            
        }
        return $fileroute;
    }
    
    public function UploadImage($id, $images, $miniature){
        $image = json_encode($images);
        
        $sql = 'update products set image = :image, miniature = :miniature where id = :id';
        
        $result = $this->db->prepare($sql);
        
        $result->bindParam(':image', $image, PDO::PARAM_STR);
        $result->bindParam(':miniature', $miniature, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $result->execute();
    }
    
    public function GetImageRoute($image_route){
        $route = str_replace('C:/wamp64/www/', '/', $image_route);
        return $route;
    }
    
    public function SearchingInProducts($item) {
        //$item = '%'.$item;
        $sql = "select name, short_description, id from products where name like :item";
        
        $result = $this->db->prepare($sql);
        $result->bindParam(':item', $item, PDO::PARAM_STR);
        
        $result->execute();
        $productList = array();
        
        $i = 0;
        while ($row = $result->fetch()){
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['short_description'] = $row['short_description'];
            $productList[$i]['id'] = $row['id'];
            $i++;
        }
        
        return $productList;
    }
    
    public function AddRate($productid, $rate){
        $sql = 'update products set rate = :rate where id = :id';
        
        $result = $this->db->prepare($sql);
        
        $result->bindParam(':productid', $productid, PDO::PARAM_INT);
        $result->bindParam(':rate', $rate, PDO::PARAM_INT);
        
        $result->execute();
        
        return $result->execute();;
    }
}
