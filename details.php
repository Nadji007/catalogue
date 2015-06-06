<?php 

include 'INC/header.php';
include_once ('connexpdo.php');
$idcom=connexpdo("catalog", "myparam");    
 ?>
<!-- PAGE -->
<div id="page">
        <div id ="contenuPage" class="container clearfix">
    	

	<section class="lastArticles boxArticles">
            <?php 
               // include_once ('connexpdo.php');
                 //$idcom=connexpdo("keley", "myparam");
                if(isset($_GET['produit_id'])){
        
                   $produit_id = $_GET['produit_id'];
               
        
			$produit="SELECT * FROM produits WHERE produit_id='$produit_id' ";
			$result=$idcom->query($produit);
              
          if (!$result)
            {
            $mes_erreur=$idcom->errorInfo();
            echo "Lecture impossible, code",$idcom->errorCode(),$mes_erreur[2];
            }
            else
			{
            while ($pro = $result->fetch(PDO::FETCH_ASSOC))
            {
                           $produit_id = $pro['produit_id'];
			   $titre = $pro['titre'];
			   $prix = $pro['prix'];
                           $poids = $pro['poids'];
                           $description = $pro['description'];
                           $image = $pro['image'];
			   

             
                  echo "
                      <P><b>$titre</b></p>
                   
                   <div class='detail2'>
                    <div class=''><img src='admin/images/$image' width='400' height='300' /></div>
                    
                     
                      <p>$description</p>
                    <p><b>Prix : $prix €</b></p>
                   <p><b>Poids : $poids Kg</b></p>
                   
                    
                    <p> <a href='index.php?produit_id=$produit_id'><button style='float:right'>Ajouter au panier</button></a></p> 
                    <p><a href='index.php'> <style='float:left'>Retour</a> </p>
                    
                    </div>";
                 
                    
               }
                
            $result->closeCursor();
            $idcom=null;
			
             }
            }
			
        ?>
			
			</section>
			
			
          
     	
			
			</div>
                            </div>
			<div class="clearfix"></div>
			

	</div> <!-- contenuPage -->
	
</div> <!-- #page -->
<?php include 'INC/footer.php'; ?>