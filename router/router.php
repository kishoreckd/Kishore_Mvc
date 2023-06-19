<?php

class router
{
    public $router = [];
    public $controller;

    public function __construct()
    {
        $this->controller = new UserController();
    }


    public function get($uri, $action)
    {
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'GET',
        ];
        return $this;
    }
    public function post($uri, $action)
    {
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'GET',
        ];
        return $this;
    }
    public function delete($uri, $action)
    {
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'DELETE',
        ];
        return $this;
    }
    public function patch($uri, $action)
    {
        $this->router[] = [
            'uri' => $uri,
            'action' => $action,
            'method' => 'PATCH',
        ];
        return $this;
    }


    public function routing()
    {
        foreach ($this->router as $router) {
            if ($router['uri']==$_SERVER['REQUEST_URI']){
                if ($router['action']) {
                    switch ($router['action']) {
                        case 'create':
                            $this->controller->createNewProducts($_POST,$_FILES['image']);
                            break;
                        case 'edit':
                            $this->controller->edit($_POST,$_FILES['image']);
                            break;
                        case 'delete':
                            $this->controller->deleteProduct($_POST);
                            break;
                        case 'view':
                            $this->controller->viewOneProduct($_POST['view']);
                            break;
                        default:
                            $this->controller->listOffAllProducts();
                    }

                } else {
                    $this->controller->listOffAllProducts();
                }

            }

        }

    }
}



