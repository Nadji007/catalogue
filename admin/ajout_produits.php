<?php
include 'INC/header.php';
include_once ('connexpdo.php');
$idcom=connexpdo("catalog", "myparam");  
?>
 <body>
<form action= "<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
<fieldset>
    <legend align="center"><b> Ajoutez un produit</b></legend>
<table align="center">
    <tr><td>Titre: </td><td><input type="text" name="titre" size="40" maxlength="100" required/></td></tr>
    <tr><td>Catégories: </td><td>
        <select name="categorie">
            <option>Choisissez une catégorie</option>    			
            <?php
                
            $cat="SELECT * FROM categories";
		$result=$idcom->query($cat);
            if (!$result)
            {
            $mes_erreur=$idcom->errorInfo();
            echo "Lecture impossible, code",$idcom->errorCode(),$mes_erreur[2];
            }
            else {
            while ($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                $categorie_id = $row['categorie_id'];
                $nom = $row['nom'];
           	   
                echo"<option value='$categorie_id'>$nom</option>";  		
            }
            $result->closeCursor();
            }
            $idcom=null;
            ?>	
        </select>
    
    </td></tr>
<tr><td>Tags: </td><td>      
        <select name="tag">
         <option>Choisissez un mot clé</option>  			
            <?php
                include_once ('connexpdo.php');
                $idcom=connexpdo("catalog", "myparam");
		$tag="SELECT * FROM tags";
		$result=$idcom->query($tag);
            if (!$result)
            {
            $mes_erreur=$idcom->errorInfo();
            echo "Lecture impossible, code",$idcom->errorCode(),$mes_erreur[2];
            }
            else {
            while ($row = $result->fetch(PDO::FETCH_ASSOC))
            {
                $tag_id = $row['tag_id'];
                $nom = $row['nom'];
              
				
                echo"<option value='$tag_id'>$nom</option>";
			
                		
            }
            $result->closeCursor();
            }
            $idcom=null;
            ?>		
        </select>
    </td></tr>
    <tr><td>Prix : </td><td><input name="prix" size maxlength="10" required/></td></tr>
    <tr><td>Poids : </td><td><input name="poids" size maxlength="3" required/></td></tr>
    <tr><td>Image : </td><td><input type="file" name="image" required /></td></tr>
    <tr><td>Description : </td><td><textarea name="description" cols="45" rows="10"></textarea></td></tr>
    <tr>
    <td><input type="reset" value=" Effacer "></td>
    <td><input type="submit" name="insert_post" value=" Envoyer "></td>
    </tr>
    </table>
    </fieldset>
    </form>
     <?php
    include_once ('connexpdo.php');
    $idcom=connexpdo("catalog", "myparam");
    
    if(isset($_POST['insert_post']))
    {
        
        $categorie = $_POST['categorie'];
        $tag = $_POST['tag'];
        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $poids = $_POST['poids'];
        
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        
        move_uploaded_file($image_tmp, "images/$image");
               //Insertion du produit
        $requete="INSERT INTO produits(categorie,tag,titre,description,prix,poids,image)
        VALUES('$categorie','$tag','$titre','$description','$prix','$poids','$image')";
        $nblignes=$idcom->exec($requete);
        
        if($nblignes!=1){
            echo"'<script> alert('Produit enregistré avec succès !')</script>";
            
        }
    
        }
        
 	include 'INC/footer.php';
 ?>
