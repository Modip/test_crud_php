<?php
session_start();
include("autoloader.php");

// Add Contact
if(isset($_POST["valider"])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $nin = $_POST["nin"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $categorie_id= $_POST["categorie_id"];

   
   

    $sql = "INSERT INTO contact (nom, prenom, nin, phone, email,categorie_id) VALUES (?, ?, ?, ?,?,?)";
    $stmt= $pdo->prepare($sql);
         
    $stmt->execute([$nom,$prenom,$nin,$phone,$email,$categorie_id]);
    redirect("index.php");
}


// Edit Contact
if(isset($_POST["update_contact"])) {
    $contact_id = $_POST["contact_id"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $nin = $_POST["nin"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $categorie_id= $_POST["categorie_id"];


    $sql = "UPDATE contact SET nom=:nom, prenom=:prenom, nin=:nin, phone=:phone, email=:email, categorie_id=:categorie_id WHERE id=:cont_id LIMIT 1";
    $stmt = $pdo->prepare($sql);

        
        
        $data = [
            ':cont_id' => $contact_id,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':nin' => $nin,
            ':phone' => $phone,
            ':email' => $email,
            ':categorie_id' => $categorie_id
            
        ];
        $result = $stmt->execute($data);

  
        redirect("index.php");
}

//Delete Contact
if(isset($_POST["delete-contact"])){
    $contact_id = $_POST["delete-contact"];
    var_dump($contact_id);
    $query= "DELETE FROM contact WHERE id=:cont_id";

    $stmt = $pdo->prepare($query);
    $data=[':cont_id' => $contact_id];
    $result = $stmt->execute($data);

    redirect('index.php');
}

?>