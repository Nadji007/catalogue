
<!-- PAGE -->
<div id="page">
        <div id ="contenuPage" class="container clearfix">
    	

	<section class="lastArticles boxArticles">
 
			
            
                         <form action= "login.php" method="post" >
                            <div align="center">  <h2>Identifiez-vous</h2>
                            <label>Pseudo : <input type="text" name="pseudo" required/><br> </label> 
                            <label>Mot de Passe :<input type="password" name="pass" required/><br> </label>
                            <input type="submit" value="Connexion"
                            </div>
                        </form>
			
			</section>

			
        </div>
	<div class="clearfix"></div>
				
	
</div> <!-- #page -->
    <?php

        include_once ('connexpdo.php');
        $idcom=connexpdo("catalog", "myparam");

        if(isset($_POST) &&!(empty($_POST['pseudo'])) && !(empty($_POST['pass'])))
        {
        extract($_POST);
        
       $sql = "SELECT pseudo, pass FROM users WHERE pseudo='.$pseudo.' AND pass='.$pass.'";
        $result=$idcom->query($sql);
              
          if (!$pseudo)
            {
            $mes_erreur=$idcom->errorInfo();
            echo "Identifiant incorrect, code",$idcom->errorCode(),$mes_erreur[2];
            }
            else
            {
           
               session_start();
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['pass'] = $pass;
                
     
            }
            header ('Location:http://localhost/catalog/admin/ajout_produits.php');
        $result->closeCursor();
        $idcom=null;
        }
        
?>
