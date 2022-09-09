<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="formulaire.css">
</head>
<body>
<?php
function formulaire($prenom , $nom , $age , $sexe)
{?>
	<img src="">
	<div class="header">
		<h1> Khadim's formulaire creator MODIFIERRRRRws </h1>
	</div>
	<div class="kha">
		<u><p>Formulaire d'inscription a cafe gui</p></u>
	</div>
	<br>
	<br>
	<div class="formulaire">
	<form action="bege.php" method="get">
		<label>Veuillez entrer votre prenom SVP</label><br>
		<input type="text" name="prenom" value=<?php echo "$prenom"; ?>><br><br>
		<label>Veuillez entrer votre nom SVP</label><br>
		<input type="text" name="nom" value=<?php echo  "$nom"; ?>><br><br>
		<label>Veuillez entrer votre age SVP</label><br>
		<input type="text" name="age" value=<?php echo "$age"; ?>><br><br>
		<label>Veuillez entrer votre Sexe SVP</label><br>
		<input type="text" name="sexe" value=<?php echo "$sexe"; ?>><br><br>
		<input type="submit" value="Envoyer">
	</form>
	
<?php }
if (empty($_REQUEST["prenom"]) and empty($_REQUEST["nom"]) and empty($_REQUEST["age"]) and empty($_REQUEST["sexe"])  ) 
{
	formulaire($prenom=null , $nom=null , $age=null , $sexe=null );
}
elseif (empty($_REQUEST["prenom"])&& !empty($_REQUEST["nom"])&& !empty($_REQUEST["age"])&& !empty($_REQUEST["sexe"])) 
{

	$nom = $_REQUEST["nom"];
	$age=$_REQUEST["age"];
	$sexe= $_REQUEST["sexe"];
	formulaire($prenom=null , $nom, $age, $sexe);
}
elseif (!empty($_REQUEST["prenom"])&& empty($_REQUEST["nom"])&& !empty($_REQUEST["age"])&& !empty($_REQUEST["sexe"])) 
{
	$prenom = $_REQUEST["prenom"];
	$age=$_REQUEST["age"];
	$sexe= $_REQUEST["sexe"];
	formulaire($prenom , $nom=null, $age, $sexe);
}
elseif (!empty($_REQUEST["prenom"])&& !empty($_REQUEST["nom"])&& empty($_REQUEST["age"])&& !empty($_REQUEST["sexe"])) 
{
	$prenom = $_REQUEST["prenom"];
	$nom=$_REQUEST["nom"];
	$sexe= $_REQUEST["sexe"];
	formulaire($prenom , $nom, $age=null, $sexe);
}
elseif (!empty($_REQUEST["prenom"])&& !empty($_REQUEST["nom"])&& !empty($_REQUEST["age"])&& empty($_REQUEST["sexe"])) 
{
	$prenom = $_REQUEST["prenom"];
	$nom=$_REQUEST["nom"];
	$age= $_REQUEST["age"];
	formulaire($prenom , $nom, $age, $sexe=null);
}
elseif (!empty($_REQUEST["prenom"])&& empty($_REQUEST["nom"])&& empty($_REQUEST["age"])&& empty($_REQUEST["sexe"])) 
{
	$prenom = $_REQUEST["prenom"];
	formulaire($prenom , $nom=null, $age=null, $sexe=null);
}
elseif (empty($_REQUEST["prenom"])&& !empty($_REQUEST["nom"])&&empty($_REQUEST["age"])&& empty($_REQUEST["sexe"])) 
{
	$nom = $_REQUEST["nom"];
	formulaire($prenom=null , $nom, $age=null, $sexe=null);
}
elseif (empty($_REQUEST["prenom"])&& empty($_REQUEST["nom"])&&!empty($_REQUEST["age"])&& empty($_REQUEST["sexe"])) 
{
	$age = $_REQUEST["age"];
	formulaire($prenom=null , $nom=null, $age, $sexe=null);
}
elseif (empty($_REQUEST["prenom"])&& empty($_REQUEST["nom"]) && empty($_REQUEST["age"])&& !empty($_REQUEST["sexe"])) 
{
	$sexe = $_REQUEST["sexe"];
	formulaire($prenom=null , $nom=null, $age=null, $sexe);
}


elseif (empty($_REQUEST["prenom"])&& empty($_REQUEST["nom"])&& !empty($_REQUEST["age"])&& !empty($_REQUEST["sexe"])) 
{
	$age= $_REQUEST["age"];
	$sexe=$_REQUEST["sexe"];
	formulaire($prenom=null , $nom=null, $age, $sexe);
}
elseif (empty($_REQUEST["prenom"])&& !empty($_REQUEST["nom"])&& empty($_REQUEST["age"])&& !empty($_REQUEST["sexe"])) 
{
	$nom= $_REQUEST["nom"];
	$sexe=$_REQUEST["sexe"];
	formulaire($prenom=null , $nom, $age=null, $sexe);
}
elseif (empty($_REQUEST["prenom"])&& !empty($_REQUEST["nom"])&& !empty($_REQUEST["age"])&& empty($_REQUEST["sexe"])) 
{
	$nom= $_REQUEST["nom"];
	$age=$_REQUEST["age"];
	formulaire($prenom=null , $nom, $age, $sexe=null);
}
elseif (!empty($_REQUEST["prenom"])&& empty($_REQUEST["nom"])&& empty($_REQUEST["age"])&& !empty($_REQUEST["sexe"])) 
{
	$prenom= $_REQUEST["prenom"];
	$sexe=$_REQUEST["sexe"];
	formulaire($prenom, $nom=null , $age=null , $sexe);
}
elseif (!empty($_REQUEST["prenom"])&& empty($_REQUEST["nom"])&& !empty($_REQUEST["age"])&& empty($_REQUEST["sexe"])) 
{
	$prenom= $_REQUEST["prenom"];
	$age=$_REQUEST["age"];
	formulaire($prenom, $nom=null , $age, $sexe=null);
}
elseif (!empty($_REQUEST["prenom"])&& !empty($_REQUEST["nom"])&& empty($_REQUEST["age"])&& empty($_REQUEST["sexe"])) 
{
	$prenom= $_REQUEST["prenom"];
	$nom=$_REQUEST["nom"];
	formulaire($prenom, $nom , $age=null, $sexe=null);
}
else{
	$prenom=$_REQUEST["prenom"];
	$nom=$_REQUEST["nom"];
	$age=$_REQUEST["age"];
	$sexe=$_REQUEST["sexe"];

 	$server="localhost";
	 $login="root";
 	$pass="";

 	try{
	 	$connection = new PDO("mysql:host=$server;dbname=cafegui",$login,$pass);
	 	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 	echo "connexion reussie";
	 	/*requette="CREATE TABLE membre(prenom varchar(30), nom varchar(30) ,age varchar(30) ,sexe varchar(30) )";
	 	$connection->exec($requette);*/
	 	$insermembre= $connection->prepare("INSERT INTO membre(prenom  ,nom ,age,sexe ) VAlUES(:prenom,:nom,:age,:sexe) ");
	 	$insermembre->bindParam(":prenom",$prenom);
	 	$insermembre->bindParam(":nom",$nom);
	 	$insermembre->bindParam(":age",$age);
	 	$insermembre->bindParam(":sexe",$sexe);
	 	$insermembre->execute();
	 	$afficherMembre=$connection->prepare("SELECT * FROM membre ");
	 	$afficherMembre->execute();
	 	$resultat=$afficherMembre->fetchall();
	 	echo "<pre>";
	 	print_r($resultat);
	 	echo "</pre>";

	 	/*for ($i=0; $i<18 ; $i++) { 
	 		# code...
	 	
		 	$supprimerMembre=$connection->prepare("DELETE  FROM membre WHERE i");
		 	$supprimerMembre->execute();
		}
		echo "membre bien supprimé";
		$afficherMembre=$connection->prepare("SELECT * FROM membre ");
		$afficherMembre->execute();
		$resultat=$afficherMembre->fetchall();
		echo "<pre>";
		print_r($resultat);
		echo "</pre>";*/
	}	

 	catch(PDOException $e){
 		echo "echec connexion:".$e->getMessage();
	}
}
?>
</body>
</html>
