<?php

require_once "function.php";




class User {

public $id;
public $username;
public $email;
private $password;

public function __construct ( $email, $password, $username = "" ){

$this->email = $email;
$this->password = sha1($password);
$this->username = $username;

}

private function emailExist(){
//verifier l'existenece de l email dans la BD
    $pdo = getBdd();
    $prepared = $pdo->prepare("SELECT * FROM user WHERE email=:email ");
    $prepared->execute(array(
        'email' => $this->email,
        
    ));
    $bddUser = $prepared->fetch(PDO::FETCH_ASSOC);

    if( $bddUser ){
        return $bddUser;
    }
    else {
        return false;
    }

}



public function inscription(){
    //verifier l'existenece de l email dans la BD
    if($this->emailExist() ) {
    echo "<p> Cet email est déjà utilisé </p>";
    return false;
    }

    // envoyer dans la base de donnée le nouvel user
    $pdo = getBdd();
    $prepared = $pdo->prepare( "INSERT INTO user SET email=:email, password=:password, username=:username");
    $prepared->execute(array(
        'email' => $this->email,
        'password' => $this->password,
        'username' => $this->username
    ));
    

    // Recuperer le $this->id

    $this->id = $pdo->lastInsertId();
    return true;

}

public function login(){

    //verifier si l'utilisateur exite et si mot de passe correspond
    $userBdd = $this->emailExist();
    if( $userBdd ){

        if($userBdd['password'] == $this->password){
            $this->id = $userBdd['id'];
            $this->username = $userBdd['username'];

            // Créer le SESSION ID
            $_SESSION['user'] = $this;
            return true;

        }else{
            return false;
        }

    }
    
}



public function logout(){

    //Coupe la SESSION 
    
}

public function getNotes(){

    //renvoie une liste de note
    $pdo = getBdd();
    $prepared = $pdo->prepare("SELECT * FROM note WHERE user_id=:user_id");
    $prepared->execute(array(
        "user_id" => $this->id
    ));
    $results = $prepared->fetchAll(PDO::FETCH_ASSOC);
    //[note]
    $notes = array(); // sera mon tableau d'objet
    foreach ( $results as $result){
        // on créer nos objet a partir du resultat de la requete
        
        $note = new Note();
        $note->id = $result["id"];
        $note->titre = $result["titre"];
        $note->description = $result["description"];
        $note->user_id = $result["user_id"];
        $note->state = $result["state"];
        
        array_push ( $notes, $note );

    }

    return $notes;
    
}



}


