<?php
//This page handles creation and input to the session cart.
//output buffering
ob_start();

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once('../classes/cart.php');

//testing alteration to the session here from the 'add to cart' click on the main page
session_start();

//showing us what is in post and session from home.html
/*echo("SESSION: <BR>");
var_dump($_SESSION);
echo("<br>POST: <BR>");
var_dump($_POST);*/

//session_destroy();

//carts are currently being overwritten for each 'add to cart', need to check if cart isset, if so, do not create a new cart, just add to new one

//if no existing cart


if(isset($_POST['val'])) {
    if(!(isset($_SESSION['sessionCart']))) {
        $userCart= new Cart();
        $userCart->incrementCartItem((int)$_POST['val']);
        $_SESSION['sessionCart'] = $userCart;

    }
//if cart already exists
    elseif (isset($_SESSION['sessionCart'])) {
        $_SESSION['sessionCart']->incrementCartItem((int)$_POST['val']);
    }
}



