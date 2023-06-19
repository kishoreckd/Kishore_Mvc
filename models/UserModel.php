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

//        var_dump($products);

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
    public function read($id) {
        $query =$this->db->query("select * from form where id =$id");
        $query->execute();
        $datas=$query->fetchAll(PDO::FETCH_OBJ);
        return $datas;

        // Perform database select operation based on $id
    }

    public function update($id,$name,$email,$password) {

        $this->db ->query("Update form set name ='$name', email='$email',pass='$password' where id='$id'");
        header("location:/");

        // Perform database update operation based on $id and $data
    }

    public function delete($id) {
        $this->db ->query( "DELETE FROM form WHERE id = $id;");
        header("location:/");

        // Perform database delete operation based on $id
    }

    public function getAllUsersFromDb() {
       $query =$this->db->query("select * from products");
       $query->execute();
       $datas=$query->fetchAll(PDO::FETCH_OBJ);
       return $datas;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             $query->execute();
        // Retrieve all users from the database
    }
}