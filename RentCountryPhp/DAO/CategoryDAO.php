<?php
class CategoryDAO{
    public $dbclass;
    public $db;
    
    public function __construct() {
        $this->dbclass = new Db();
        $this->db = $this->dbclass->getConnection();
    }
    
    public function AddCategory($name){
        $sql = 'insert into category(name) values(:name)';
        
        $result = $this->db->prepare($sql);
        
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        return $result->execute();
    }
    
    public function DeleteCategory($id){
        $sql = 'delete from category where id = :id';
        
        $result = $this->db->prepare($sql);
        
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    
    public function GetCategory($id){
        $sql = 'select from category where id = :id';
        
        $result = $this->db->prepare($sql);
        
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public function GetAllCategory(){
        $sql = 'select * from category';
        
        $result = $this->db->prepare($sql);
        $result->execute();
        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch()){
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }
        return $categoryList;
    }
    public function UpdateCategory($category){
        $sql = 'update category set name = :name where id = :id';
        
        $result = $this->db->prepare($sql);
        
        $result->bindParam(':id', $category['id'], PDO::PARAM_INT);
        $result->bindParam(':name', $category['name'], PDO::PARAM_STR);
        return $result->execute();
    }
}
