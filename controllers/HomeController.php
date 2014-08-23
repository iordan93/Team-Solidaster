<?php
namespace Controllers;

class HomeController
{
    public function __construct() {

    }

   public function index() {
       echo "It works!";
   }

    public function func() {
        echo "Func called!";
    }
}