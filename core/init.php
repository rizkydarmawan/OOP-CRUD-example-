<?php
session_start();

spl_autoload_register(function($class){
    require_once 'classes/' . $class . '.php';
});
include 'classes/function.php';

$user = new User();
$anak = new Anak();
?>
