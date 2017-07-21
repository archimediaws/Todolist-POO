<?php
require "../models/Note.php";
require "../models/User.php";

session_start();



if ( isset($_GET["supprimer"]) && isset($_GET["noteid"])){

$id = $_GET["noteid"];
$note =new Note ($id);

$note->delete();

header("Location: ../index.php?page=profil");

}


else if ( isset($_GET["stateok"]) && isset($_GET["noteid"])){

$id = $_GET["noteid"];
$note =new Note ($id);

$note->state = 1;
$note->update();

header("Location: ../index.php?page=profil");

}



else if( isset($_POST["titre"]) && isset($_POST["description"]) && isset($_GET["noteid"]) && isset($_POST["state"]) ){

    $note =new Note ( $_GET['noteid']);
    $note->titre = $_POST['titre'];
    $note->description = $_POST['description'];
    $note->state = $_POST['state'];
    $note->update();

    header("Location: ../index.php?page=profil");



}

else if( isset($_POST["titre"]) && isset($_POST["description"]) ){

$titre = $_POST["titre"];
$description = $_POST["description"];
$user = $_SESSION["user"];

$note = new Note(); 
 $note->titre = $titre;
 $note->description = $description;
 $note->user_id = $user_id;
 


$note->create();

header ("Location: ../index.php?page=profil");
}
else
{

header ("Location: ../index.php?page=profil&message='erreur la note n'est pas enregistrée");

}


