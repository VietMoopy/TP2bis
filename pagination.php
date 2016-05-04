<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
    <style>
      table{
        border-collapse : collapse;
      }
      td,tr{
        border : 1px solid black;
      }
       .error{
          background-color : yellow;
        }
      .warning{
          background-color : red;
        }

      }
    </style>
		<title></title>
		<link href="/bootstrap/css/bootstrap.css" rel="stylesheet" />
	</head>
	<body>
		<?php
include './data.php.txt';
?>
		<div class="container">
<div class="page-header">
<h5>Données</h5>
</div>
			<table class="table table-striped table-condensed table-bordered">
				<thead>
					<tr>
						<th>Nom</th>
						<th>Prénom</th>
						<th>Mail</th>
						<th>Taille</th>
						<th>Poids</th>
						<th>Imc</th>
					</tr>
				</thead>
				<tbody>
<?php
$nb=count($data);
$nbPage = ceil($nb/10);
extract($_GET);
if(isset($page)){
for ($i = ($page-1) * 10;$i<$page * 10;$i++){
	$personne=$data[$i];
	$m=$personne['Poids'];
	$t=$personne['Taille']/100;
	$imc=$m/($t*$t);
	$class="";
	if ($imc >= 25) $class="error";
	if ($imc <= 18) $class="warning";
	echo "<tr class=\"$class\">";
	echo "<td>".$personne['Nom']."</td>";
	echo "<td>".$personne['Prenom']."</td>";
	echo "<td>".$personne['Email']."</td>";
	echo "<td>".$personne['Taille']."</td>";
	echo "<td>".$personne['Poids']."</td>";
	echo "<td>".round($imc,2)."</td>";
	echo "</tr>";
}
}
else{
for ($i = 0 ; $i < 10;$i++){
	$personne=$data[$i];
	$m=$personne['Poids'];
	$t=$personne['Taille']/100;
	$imc=$m/($t*$t);
	$class="";
	if ($imc >= 25) $class="error";
	if ($imc <= 18) $class="warning";
	echo "<tr class=\"$class\">";
	echo "<td>".$personne['Nom']."</td>";
	echo "<td>".$personne['Prenom']."</td>";
	echo "<td>".$personne['Email']."</td>";
	echo "<td>".$personne['Taille']."</td>";
	echo "<td>".$personne['Poids']."</td>";
	echo "<td>".round($imc,2)."</td>";
	echo "</tr>";
}
}
?>
				</tbody>
			</table>
			<form methode="get">
			<?php
				if(isset($page)){
				$precedent = $page;
				$suivant = $page;
				if($page != 1)
				$precedent = $page-1;
				if($page != $nbPage)
				$suivant = $page+1;
				}
				else{
					$precedent = 1;
					$suivant = 2;
				}
		echo "<button name='page' type='submit' value='".$precedent."'><<</button>";
			  	for($i = 1; $i <= $nbPage; $i++){
    	echo "<button name='page' type='submit' value='$i'>$i</button>";
					}
			echo "<button name='page' type='submit' value='".$suivant."'>>></button>";
			?>
								
			</form>
    <div class="pagination">
    </div>
		</div>
	</body>
</html>