<?php
require "../models/User.php";

if (isset($_POST['email']) 
&& isset($_POST['password'])
&& isset($_POST['username']))
{
    if ( strlen($_POST["email"]) == 0 || (strlen($_POST["password"]) ) == 0  ){
        header ( "Location: ../index.php?page=inscription&message='email pas set'");
        
    } else {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $user = new User ($email, $password, $username);
    $subscribed = $user->inscription();

    if( $subscribed)
        {
        header ( "Location: ../index.php?page=connection&message='Inscription reussi'");
        }
    else
        {
        header ( "Location: ../index.php?page=inscription&message='Impossible de s'inscrire");
        }


    }


   

}else{

header ( "Location: ../index.php?page=inscription&message='username ou email ou password pas set'");

}