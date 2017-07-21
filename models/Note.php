<?php

require_once "function.php";



 class Note {

    public $id;
    public $user_id;
    public $titre;
    public $description;
    public $state;

//     public function __construct ( $user_id, $titre, $description = "" ){

//     $this->user_id = $user_id;
//     $this->titre = $titre;
//     $this->description = $description;

// }

        public function __construct ($id = 0 ){

        $this->id = $id;

            if($id > 0 ){

                $this->getById();
            }


        }



public function getState(){

$pdo = getBdd();
        $prepared = $pdo->prepare( "SELECT FROM note WHERE id=:id AND state=:state");
        $prepared->execute(array(
            'id' => $this->id,
            'state' => $this->state
            
        ));
    
    $result = $prepared->fetch(PDO::FETCH_ASSOC);
    $this->user_id = $result["user_id"];
    $this->titre = $result["titre"];
    $this->description = $result["description"];
    $this->state = $result["state"];

}





public function getById(){

$pdo = getBdd();
        $prepared = $pdo->prepare( "SELECT * FROM note WHERE id=:id");
        $prepared->execute(array(
            'id' => $this->id
            
        ));
    
    $result = $prepared->fetch(PDO::FETCH_ASSOC);
    $this->user_id = $result["user_id"];
    $this->titre = $result["titre"];
    $this->description = $result["description"];
    $this->state = $result["state"];
}

public function create(){
    
    // envoyer la note dans la bdd
    $pdo = getBdd();
    $prepared = $pdo->prepare( "INSERT INTO note SET user_id=:user_id, titre=:titre, description=:description");
    $prepared->execute(array(
        'user_id' => $this->user_id,
        'titre' => $this->titre,
        'description' => $this->description
    ));
    

    // Recuperer le $this->id

    $this->id = $pdo->lastInsertId();
    
    
    }

    public function update(){
        
        //mise a jour de la note 
        $pdo = getBdd();
        $prepared = $pdo->prepare( "UPDATE note SET titre=:titre, description=:description, state=:state WHERE id=:id");
        $prepared->execute(array(
            'id' => $this->id,
            'titre' => $this->titre,
            'description' => $this->description,
            'state' => $this->state
        ));
    
    }

    public function delete(){
    
    // supprime la note 
    $pdo = getBdd();
    $prepared = $pdo->prepare( "DELETE FROM note WHERE id=:id" );
    $prepared->execute(array(
        'id' => $this->id,
        
    ));

    }
    

 }