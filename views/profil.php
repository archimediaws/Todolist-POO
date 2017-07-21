<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>
</head>
<body>

    <h1> Page Profil </h1>

    <h2> Welcome <?= $user->username; ?></h2>
    <p> votre email = <?= $user->email; ?></p>


    <h3> Ecrire une Note</h3>
<form action="services/servicenote.php" method = "POST">


<label>titre</label><br>
<input type="text" name="titre" /><br>
<label>description</label><br>
<textarea  name="description"> </textarea><br>

<input type="submit" value="Créer">


</form>
---------------------<br>
<ul>
<?php

    $notes = $user->getNotes();
    foreach ( $notes as $note){
       
        echo "<li>" .$note->titre. "</li>";
        echo "<li>" .$note->description. "</li>";
        echo "<li>" .$note->state. "</li>";
        echo "<li><a href='index.php?page=noteupdate&noteid=".$note->id."' > Editer </a></li>";
        echo "<li><a href='services/servicenote.php?supprimer=1&noteid=".$note->id."' > Supprimer</a></li>";
        echo "<li><a href='services/servicenote.php?stateok=1&noteid=".$note->id."' > FAIT </a></li><br>";
    }

?>
</ul>

</body>
</html>





