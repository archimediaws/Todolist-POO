<?php

require "models/function.php";
require "models/User.php";
require "models/Note.php";

session_start(); // apres les requires
if(isset($_SESSION['user'])){

$user = $_SESSION['user']; 

}

readMessage();
switch( readPage()){

    case "connection":
        include "views/connection.php";
        break;

    case "profil":
       
        include "views/profil.php";
        break;

    case "inscription":
        include "views/inscription.php";
        break;


    case "noteupdate":
        $id_note = $_GET["noteid"];      
        $note = new Note($id_note);
        include "views/noteupdate.php";

        break;   

    default :
    include "views/connection.php";
    break;

}



?>



