
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Commerce en ligne</title>
  <meta name="description" content="">

  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->		
<div class="wrap">
	<!-- NAVIGATION -->		
	<div id="nav"> 
    <div class="container clearfix">
    </div> <!-- container -->
	</div> <!--#nav -->

	<!-- HEADER -->
	<header>
	    <div class="container clearfix">

                <div class="tag">
                            
                      <?php
                                 
        include_once ('connexpdo.php');
        $idcom=connexpdo("catalog", "myparam");
            if(!isset($_GET['categories'])){
        
                $cat="SELECT * FROM tags  LIMIT 3";
                $result=$idcom->query($cat);
              
          if (!$result)
            {
            $mes_erreur=$idcom->errorInfo();
            echo "Lecture impossible, code",$idcom->errorCode(),$mes_erreur[2];
            }
            else
			{
            while ($pro = $result->fetch(PDO::FETCH_ASSOC))
            {
                           $tag_id = $pro['tag_id'];
			   $nom = $pro['nom'];

             echo"<ul><li><a href='index.php?tags=$tag_id'>$nom</a></li></ul>";
                  
                 
                    
               }
                
            $result->closeCursor();
            $idcom=null;
			
             }
            }
			
            ?>
            
				
			</div>
					<div id="search">
			
			<form method="get" id="searchform" action="search.php">
				<div>
					<input type="text" value="Chercher" name="q" id="q" onfocus="if (this.value == 'Chercher') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Chercher';}" />
					<input type="submit" id="searchsubmit" value="Go" />
				</div>
			</form>
		</div> <!--#search -->

	    </div> <!-- container -->
	</header>