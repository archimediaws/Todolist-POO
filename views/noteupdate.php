

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Note</title>
</head>
<body>
<center>
    <h1> Modifier ma note </h1>

    <h2> Utilisateur <?= $user->username; ?></h2>
    <p> votre email = <?= $user->email; ?></p>


    <h3> Modifier ma Note</h3>
<form action="services/servicenote.php?noteid=<?= $note->id ?>&notestate=<?= $note->state ?>" method = "POST">


<label>Modifier le titre</label><br>
<input type="text" name="titre" value="<?= $note->titre ?>"/><br>
<label>Modifier la description</label><br>
<textarea  name="description"><?= $note->description ?> </textarea><br>
<label>Fait</label><br>
<input type="text" name="state" value="<?= $note->state ?>"/><br>

<input type="submit" value="Updater">


</form>



---------------------


</center>
</body>
</html>



