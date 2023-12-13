
<?php
include("connect.php");
require_once("connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Document</title>
</head>
<body>
<h3>Ajout de contact</h3>
       
    <div class="formularEdit" id="formular">
    <?php
   
    if(isset($_GET['id'])){
        $contact_id = $_GET['id'];
       

        $query = "SELECT * FROM contact WHERE id=:cont_id LIMIT 1";
       
        $stmt = $pdo->prepare($query);
      
        $data= [':cont_id' =>$contact_id];
      
       
        $stmt->execute($data);

        $result = $stmt->fetch(PDO::FETCH_OBJ);
       
       
    }

    ?>


        <form action="formularhandler.php" method="post">
            <input type="hidden" name="contact_id" value="<?=$result->id?>">
            <label for="">Prenom</label>
            <input type="text" name="prenom" id="prenom" value="<?= $result->prenom ?>">
            <label for="" id="cntlprenom" class="cntl">Veillez saisir le prenom</label>
            
            <label for="">Nom</label>
            <input type="text" name="nom" id="nom" value="<?= $result->nom ?>">
            <label for="" id="cntlnom" class="cntl">Veillez saisir le nom</label>
            
            <label for="">NIN</label>
            <input type="text" name="nin" id="nin" value="<?= $result->nin ?>">
            <label for="" id="cntlnin" class="cntl">Veillez saisir le nin</label>

            <label for="">Phone</label>
            <input type="text" name="phone" id="phone" value="<?= $result->phone ?>">
            <label for="" id="cntlphone" class="cntl">Veillez saisir le telephone</label>
            
            <label for="">Email</label>
            <input type="text" name="email" id="email" value="<?= $result->email ?>"><br>
            <label for="" id="cntlemail" class="cntl">Veillez saisir l'adresse mail</label>
            
            <select id="" name="categorie_id">
            <option value="">Catégories</option>
            <?php               
            $categories = $pdo->prepare("SELECT * FROM categorie");
            $categories->execute();
           
            while($categorie=$categories->fetch())
            { 
            ?>    
                <option value="<?=$categorie['id'] ?>" class="clp"><?=$categorie['nom'] ?></option> 
            <?php
            }
            ?>

            </select>
            <div class="btn-end">
                <div class="btn" id="boutton">
                    <button type="submit" name="update_contact" class="valider" onclick="return validate() "> Valider </button>
                </div>
                <div class="btn" id="close">
                    <button class="close"> Fermer </button>
                </div>
            </div>
        </form> 
    </div>
    <script src="public/js/contact.js"></script>
</body>
</html>