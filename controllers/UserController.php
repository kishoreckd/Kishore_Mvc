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

        if($products && $files){
            $this->userModel->insertdata($products,$files);
//            var_dump($files);

//            header("location:/");
        }else{
            require "views/user/createProducts.php";
        }

    }

//    public function edit($user) {
////        var_dump($user);
//
//        $this->userModel->update($user['id'],$user['User_Name'],$user['User_Email'],$user['Password']);
//        require 'views/user/edit.php';
//
//        // Handle form submission for updating an existing user
//    }
//
//    public function delete($id) {
//        $this->userModel->delete($id);
//
//        // Handle user deletion
//    }

    public function gettingAllUser() {
        $alluser=$this->userModel->getAllUsersFromDb();
        require 'views/user/index.php';
        // Retrieve all users from the UserModel and load the index view
    }
//
//    public function viewOneUser($id) {
//        $alluser=$this->userModel->read("$id");
//        require 'views/user/edit.php';
//
//
//        // Retrieve a specific user from the UserModel and load the view view
//    }
}
