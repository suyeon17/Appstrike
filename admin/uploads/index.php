<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<title>Login</title>
</head>
<body>

<?php
///TP SECURITY  *** Yassir Samadi &&  Loubbna Grimich **** ///

if (isset($_POST['user']) && isset($_POST['pass']))
{
	try
	{
	$bdd = new PDO('mysql:host=localhost;dbname=tpsecurity;charset=utf8','root','');
	$reponse	= $bdd->prepare('Select * from users where username=? and password=?');
	$reponse->execute(array($_POST['user'],$_POST['pass']));
	$data =  $reponse->fetch();
	}
	catch (Exception $e)
	{
        die('Erreur : ' . $e->getMessage());
	}
	if($data != null )
	{
		echo '<div class="col-lg-4 col-lg-push-4 alert alert-success" role="alert" align="center">';
		
		echo "Bienvenue ".$data['username']."</div>";
		
		exit();
	}
	else
	{
		echo '<script>alert("Utilisateur ou mot de passe invalide")</script>' ;
	}
}
?>
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h1>Login</h1>
</div>
<div class="modal-body">
<form class="col-lg-12 center-block" action="index.php" method="post">
<div class="form-group"><input type="text" class="form-control input-lg" placeholder="Utilisateur" name="user"></div>
<div class="form-group"><input type="password" class="form-control input-lg" placeholder="Mot de passe" name="pass"></div>
<div class="form-group"><input type="submit" class="btn btn-block btn-lg btn-primary" value="valider"></div>
</form>
</div>
<div class="modal-footer"></div>
</body>
<html>

