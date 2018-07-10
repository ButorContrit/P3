<?php
/**
 * Created by PhpStorm.
 * User: Lucile Rutkowski
 * Date: 18/06/2018
 * Time: 22:47
 */

namespace App\config;


use App\src\controller\FrontController;

class Router {

    private $frontController;

    function __construct()
    {
        $this->frontController = new FrontController();
    }

    public function start()
    {
        try{
            if(isset($_GET['route']))
            {
                if($_GET['route'] === 'article'){
                    $id = $_GET['id'];
                    $this->frontController->article($id);
                }
                else{
                    echo 'page inconnue';
                }
            }
            else{
                $this->frontController->home();
            }
        }
        catch (Exception $e)
        {
            echo 'Erreur';
        }
    }

} 