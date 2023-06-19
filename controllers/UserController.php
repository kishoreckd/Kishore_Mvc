<?php
require_once "models/UserModel.php";

class UserController {
    private $userModel;

    public function __construct() {


        $this->userModel = new UserModel();
    }

    public function createNewProducts($products,$files) {
        // Handle form submission for creating a new products
//       var_dump( "$user");
            unset($_SESSION['Already-Exists']);
        if($products && $files){
            $this->userModel->insertdata($products,$files);
//            header("location:/");
        }else{
            require "views/products/createProducts.php";
        }

    }

    public function edit($product,$files) {
//        var_dump($product);
        $this->userModel->update($product,$files);
        require 'views/products/edit.php';

        // Handle form submission for updating an existing user
    }
//
    public function deleteProduct($id) {
//        echo"$id";
        $this->userModel->deleteOnDb($id);
        header("location:/");
        // Handle user deletion
    }

    public function listOffAllProducts() {
        // Retrieve all users from the UserModel and load the index view

        $allproducts=$this->userModel->getAllProductsFromDb();
        require 'views/products/listOffAllProducts.php';
    }
//
    public function viewOneProduct($id) {
        $particularProduct=$this->userModel->read("$id");
        require 'views/products/edit.php';


        // Retrieve a specific user from the UserModel and load the view view
    }
}
