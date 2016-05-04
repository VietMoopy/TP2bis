<!DOCTYPE html>
<html>

<head>
  <title>Ceci est une page de test avec des balises PHP</title>
  <meta charset="utf-8" />
  <style>
  </style>
</head>

<body>
	<body>
		<div class="container-fluid">
					<h1>Pierre Feuille Ciseaux</h1>
					<h3>Choisissez votre coup :</h3>
     <form method="get" action="shifumi.php">
           <a href="?coup=0"><img src="./pierre.png" style="width:50px;height:50px;"></a>
           <a href="?coup=1"><img src="./feuille.png" style="width:50px;height:50px;"></a>
           <a href="?coup=2"><img src="./ciseaux.png" style="width:50px;height:50px;"></a>
      </form>
      <br>
        <?php
        extract($_GET);
    if (isset($coup)){
      $coupOrdi = rand(0,2);
      if($coup == $coupOrdi){
        echo "<h3> Résultat : Egalite </h3><br>";
      }
      else if(($coup == 0 && $coupOrdi == 2) || ($coup == 1 && $coupOrdi == 0) || ($coup == 2 && $coupOrdi == 1)){
        echo "<h3>Résultat : Victoire </h3> <br>";
      }
      else{
        echo "<h3>Résultat : Defaite </h3> <br>";
      }
        echo "<br> Votre Coup : <br>";
        if($coup == 0)
           echo "<img src='./pierre.png' style='width:50px;height:50px;'>";
        if($coup == 1)
           echo "<img src='./feuille.png' style='width:50px;height:50px;'>";
        if($coup == 2)
           echo "<img src='./ciseaux.png' style='width:50px;height:50px;'>";
       echo "<br> Coup de l'Ordi : <br>";
        if($coupOrdi == 0)
           echo "<img src='./pierre.png' style='width:50px;height:50px;'>";
        if($coupOrdi == 1)
           echo "<img src='./feuille.png' style='width:50px;height:50px;'>";
        if($coupOrdi == 2)
           echo "<img src='./ciseaux.png' style='width:50px;height:50px;'>";
    }
 ?>
		</body>

</html>