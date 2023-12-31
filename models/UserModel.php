<?php

class database
{
    public $db;
    public function __construct(){
        try {
            $this->db= new PDO
            ("mysql:host=localhost;dbname=mvc",
                "admin",
                "welcome");

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

class UserModel extends database {
    // Database connection and other necessary properties

    public function insertdata($products,$files)
    {
        // Perform database insert operation using $data
        $sku =$products['sku'];
//        var_dump($products);
        $query =$this->db->query("select * from products where sku ='$sku'");
        $datas=$query->fetchAll(PDO::FETCH_OBJ);
        if ($datas){
                $this->validation('Already-Exists');
                require_once "views/products/createProducts.php";
//            header("location:/create");
        }
        else{
            move_uploaded_file($files["tmp_name"],"upload/" .$files["name"]);
            $imagePath= "upload/".$files["name"];
            $products_name =$products['product_name'];
            $price =$products['price'];
            $sku =$products['sku'];
            $brands =$products['brands'];
            $manufactured =$products['manufactured'];
            $avl_stock =$products['stock'];
            $this->db ->query( "Insert into products (product_name,price,image,sku,brand,manufactured,availabe_stock) values ('$products_name','$price','$imagePath','$sku','$brands','$manufactured','$avl_stock')");
                        header("location:/");


        }
//
    }
    public function read($id) {
        // Perform database select operation based on $id

        $query =$this->db->query("select * from products where id =$id");
        $datas=$query->fetchAll(PDO::FETCH_OBJ);
        return $datas;

    }

    public function update($products,$files) {
        // Perform database update operation based on $id and $data
var_dump($products);
        move_uploaded_file($files["tmp_name"],"upload/" .$files["name"]);
        $imagePath= "upload/".$files["name"];

        $products_name =$products['product_name'];
        $price =$products['price'];
        $sku =$products['sku'];
        $brands =$products['brands'];
        $manufactured =$products['manufactured'];
        $avl_stock =$products['stock'];
        $id =$products['id'];
            $this->db ->query("Update products set product_name ='$products_name',                                     price='$price',image='$imagePath',sku='$sku',brand='$brands',
                                manufactured='$manufactured',availabe_stock='$avl_stock' where id='$id'");
        header("location:/");

    }

    public function deleteOnDb($id) {
        echo $id;
        $this->db ->query( "DELETE FROM products WHERE id = $id;");

        // Perform database delete operation based on $id
    }

    public function getAllProductsFromDb() {
       $query =$this->db->query("select * from products");
       $datas=$query->fetchAll(PDO::FETCH_OBJ);
       return $datas;

        // Retrieve all users from the database
    }
    public  function validation($getError){

        if($_SESSION['checking']){
            unset($_SESSION[$getError]);
        }
        else{
            $output = $getError == 'userNot' ? 'user not exits' : 'SKU already exits' ;
            $_SESSION[$getError] = $output;
        }

    }
}