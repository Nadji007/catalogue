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
        include_once ('connexpdo.php');
        $idcom=connexpdo("catalog", "myparam");
        
			$produit="SELECT * FROM produits LIMIT 4 ";
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
			   $categorie = $pro['categorie'];
			   $tag = $pro['tag'];
			   $titre = $pro['titre'];
			   $prix = $pro['prix'];
                           $poids = $pro['poids'];
                           $description = $pro['description'];
                           $image = $pro['image'];
			   

             
                   echo " <ul>               
                   <li>
                   <a href=''>
                    <div class='thumb'><img src='admin/images/$image' width='50' /></div>
                    <div class='detail'>
                   <h4>$titre</h4>
                    <h5><b>Prix : $prix €</b></h5>
                     <h5><b>Poids : $poids kg</b></h5>
                      <h5>$description</h5>
                       
                   </div>
                    </a>
                    <br/><br/><br/>
                   
                    <a href='details.php?produit_id=$produit_id'><button style='float:right'>Détails</button></a> 
                    </li>
                    
                    </ul>"; 
                 
               }
                
            $result->closeCursor();
            $idcom=null;
			}
			
                 ?>

			
			</section>
			
			
          
     	
			
			</div>
                            </div>
			<div class="clearfix"></div>
			

	</div> <!-- contenuPage -->
	
</div> <!-- #page -->
<?php
 include 'INC/footer.php'; 
 ?>
