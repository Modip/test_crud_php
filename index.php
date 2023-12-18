<?php

    require_once("connect.php");
    ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Accueil</title>
</head>
<body>
    <h3>Ajout de contact</h3>
    <?php include('message.php')?>
    <div class="center" id= "center">
        <div class="boutton" id="boutton">
            <button type="text" class="ajout" onclick=" return showForm()"> Ajouter </button>           
        </div>        
    </div>       
    <div class="formular" id="formular">
        <form action="formularhandler.php" method="post">

            <label for="">Prenom</label>
            <input type="text" name="prenom" id="prenom">
            <label for="" id="cntlprenom" class="cntl">Veillez saisir le prenom</label>
            
            <label for="">Nom</label>
            <input type="text" name="nom" id="nom">
            <label for="" id="cntlnom" class="cntl">Veillez saisir le nom</label>
            
            <label for="">NIN</label>
            <input type="text" name="nin" id="nin">
            <label for="" id="cntlnin" class="cntl">Veillez saisir le nin</label>

            <label for="">Phone</label>
            <input type="text" name="phone" id="phone">
            <label for="" id="cntlphone" class="cntl">Veillez saisir le telephone</label>
            
            <label for="">Email</label>
            <input type="text" name="email" id="email"><br>
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
            } ?>
            </select>
            
            <div class="btn-end">
                <div class="btn" id="boutton">
                    <button type="submit" name="valider" class="valider" onclick="return validate() "> Valider </button>
                </div>
                <div class="btn" id="close">
                    <button class="close"> Fermer </button>
                </div>
            </div>
        </form> 
    </div>
    <br>

    <h3>Listes des contacts</h3>
    <div class ="liste" >
        <table>
            <thead>
                <th>Id</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>NIN</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Catégories</th>
                <th>Action</th>
                <th>Action</th>
            </thead>
            <?php
           
                $query = $pdo->prepare("SELECT * FROM contact");
                $query->execute();

                while($contact=$query->fetch())
                { 

                    $categorie_id=$contact['categorie_id'];

                    $query_categorie = $pdo->prepare("SELECT * FROM categorie WHERE id= $categorie_id");
                    $query_categorie->execute();
                    $result_categorie = $query_categorie->fetch();
                
            ?>
                   <tr>
                        <td> <?=$contact['id'] ?></th>
                        <td> <?=$contact['prenom'] ?></td>
                        <td> <?=$contact['nom'] ?></td>
                        <td> <?=$contact['nin'] ?></td>
                        <td> <?=$contact['phone'] ?></td>
                        <td> <?=$contact['email'] ?></td>
                        <td> <?=$result_categorie['nomCat']?></td>
                         
                        <td> 
                            <a href="contact-edit.php? id=<?=$contact['id']; ?>" class="update" > Modifier</a>
                        </td>
                        <td> 
                            <form action="formularhandler.php" method="post">
                                <button type="submit" name="delete-contact" class="delete" value="<?=$contact['id'];?>">Supprimer</button>
                            </form>
                        </td>
                   </tr>
              <?php  } ?>
        </table>
    </div>
    <script src="public/js/contact.js"></script>
</body>
</html>