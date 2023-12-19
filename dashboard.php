<?php
    require_once("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Test</title>
</head>
<body>
    <div class="main">
        <div class="sidebar">
            <div class="logo"></div>
            <ul class="menu">
                <li class="active">
                    <a href="#">
                    <i class="fa fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>
                <li><a href="#">
                    <i class="fa fa-user"></i>
                    <span>Profile</span></a>
                </li>
                <li>
                    <a href="#">
                    <i class="fa fa-chart-bar"></i>
                    <span>Statistiques</span></a>
                </li>
        
                <li class="logout">
                    <a href="#" >
                    <i class="fa fa-sign-out-alt"></i>
                    <span>Deconnexion</span></a>
                </li>
            </ul>
        </div>
        <div class="main-content">
            <div class="header">
                <div class="main-header">
                    <div class="header-title">
                    <span class="header-span">Modip</span>
                            <h3>Dashboard</h3>
                    </div>
                    <div class="header-search">
                        <div class="search-box">
                            <i class="fa-solid fa-search"></i>
                            <input type="text" class="search-input" placeholder="search">
                        </div> 
                        <div class="img">
                            <img src="public/img/modip.jpg"class="profil-img" alt="">
                    </div>  
                </div>
                </div>
            </div>
            <div class="card-content">
                <div class="card">
                    <div class="header-title">
                        <span class="header-span">Categories de contacts</span>
                    </div>
                    <div class="box-content">
                    <div class="card-box">
                        <div class="box">
                            <p> 138 </p>
                            <span>Salariés</span>
                            <i class="fa fa-users box-icon"></i>
                        </div>
                    </div>
                    
                    <div class="card-box">
                        <div class="box">
                            <p> 88 </p>
                            <span>Entrepreneurs</span>
                            <i class="fa fa-digging box-icon"></i>
                        </div>
                    </div>

                    <div class="card-box">
                            <div class="box">
                                <p>188 </p>
                                <span>Non salariés</span>
                                <i class="fa fa-shopping-bag box-icon"></i>
                            </div>
                        </div>

                        <div class="card-box">
                            <div class="box">
                                <p>898 </p>
                                <span>Etudiants</span>
                                <i class="fa fa-tasks box-icon"></i>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </div>
            
            <div class="table-contact">
                <div class="contact-list">
                <div class="header-title">
                    <span class="header-span">Liste des contacts</span>
                </div>
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
            </div>
        </div>
    </div>
</body>
</html>