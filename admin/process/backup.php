<?php
session_start();
if(!isset($_SESSION['login'])) {
	// admin not online
	header("Location: http://localhost/Newspaper_management/admin/login.php");
	die();
}
?>
<?php
$output ="Résultat de compression ";
if (isset($_GET['filename'])){
	$output = shell_exec("zip -r ../backups/".$_GET['filename'].".zip ../../../Newspaper_management");
}
?>
<html>
	<head>
		<title>Hack This Press </title>
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/theme.css">
		<link rel="stylesheet" href="assets/css/timeline.css">
		<style>
		pre {
			background-color : rgba(0,0,0,0) ;
			border :none ;
			color :F00;
			}
		</style>
	</head>
		<body>
		<div class="container">
	      <div class="header clearfix">
	        <nav>
	          <ul class="nav nav-pills pull-right">
	            <li role="presentation"><a href="/Newspaper_management/index.php">Home</a></li>
	            <li role="presentation"><a href="/Newspaper_management/admin/panel.php">Panel</a></li>
	          </ul>
	        </nav>
	        <h3 class="text-muted">Hack This Press | <i style='color:#00612C;'>Sauvegarde</i></h3>
	      </div>
				<form class="span12" id="postForm" action="backup.php" method="get" enctype="multipart/form-data" onsubmit="return postForm()">
					<input type="text "class="form-control" id="filename" name="filename" placeholder="Entrer le nom du fichier compressé"></input>
					<div style='text-align:center;margin-bottom:20px;margin-top:5px;'>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
				<div class="col-lg-12 alert alert-success" role="alert" align="center" >
				<?php echo "<pre>$output</pre>"; 			?>
				</div>
				      <footer class="footer">
	        <p>Hack This Press  &copy; 2015</p>
	      </footer>

	    </div> <!-- /container -->
	
	</body>
	
</html>