<?php

session_start();

require_once('classes/pdo.php');
require_once('classes/security.php');

// check if user is online or offline
if ( isset( $_SESSION['login'] ) ) { $online = true; } 
else { $online = false; }

// get security object
$security = new Security();

// no article is selected
if (!isset($_GET['id'])){
	header("Location: http://localhost/Appstrike/index.php");
	die();
}

// get article
$database = new Database();

if ($security -> mode == 'high'){
	
	// do pdo preparation 
	$database -> query('SELECT * from Articles WHERE id=:id LIMIT 1');
	$database -> bind(':id', $_GET['id']);
	$database -> execute();
	if ( $database -> rowCount() > 0 ) { $article = $database -> single(); }
	else { 
		// id not correct 
		header("Location: http://localhost/Appstrike/index.php");
	 	die();
	}

} else if ($security -> mode == 'low') {

	// do query execution directly 
	$id = $_GET['id'];
	$statement = $database->dbh->query("SELECT * from Articles WHERE id='$id'");
	if (!$statement) {
	   print_r($pdo->errorInfo());
	   die();
	}
	$article = $statement->fetch();

}

// get upload
$database->query('SELECT * from Files WHERE article_id=:article_id LIMIT 1');
$database->bind(':article_id', $_GET['id']);
$database -> execute();
if ( $database->rowCount() > 0 ) { $file = $database->single(); }

?>

<html>
	<head>
		<title>App</title>
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/css/theme.css">
		<link rel="stylesheet" href="assets/css/article.css">
	</head>

	<body>
		<div class="container">
			<div class="header clearfix">
	        <nav>
	          <ul class="nav nav-pills pull-right">
	            <li role="presentation"><a href="/Appstrike/index.php">Home</a></li>
	            <?php if (!$online){ ?>
	            <li role="presentation"><a href="/Appstrike/admin/login.php">Login</a></li>
	            <?php } else { ?>
	            <li role="presentation"><a href="/Appstrike/admin/panel.php">Panel</a></li>
	            <?php } ?>
	          </ul>
	        </nav>
	        <h3 class="text-muted"><del>App</del> ` <i style='color:#00612C;'>Article</i></h3>
	      </div>

	       <?php
	      		if ( isset($_GET['msg']) && isset( $_GET['type'] )){ 
	      			if ( $_GET['type'] == 'danger' ) {
	      	?>
		      		<div class="notice notice-danger">
			        	<strong>Mistake ` </strong> <?php if ($security -> mode == 'high') { echo htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8'); } else { echo $_GET['msg']; } ?>
			    	</div>
			
			<?php } else if ($_GET['type'] == 'success') { ?>

					<div class="notice notice-success">
				        <strong>Success ` </strong> <?php if ($security -> mode == 'high') { echo htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8'); } else { echo $_GET['msg']; } ?>
				    </div>

			<?php } } ?>

			<div class="span8" style="margin-bottom:35px;">
			    <h1><?php echo $article['title']; ?></h1>
			    <p><?php echo $article['text']; ?></p>
			    <?php if(isset($file)) { ?><p><a href="<?php echo $file['path']; ?>" target="_blank">A telecharger</a></p><?php } ?>
			    <div>
			        <span class="badge badge-success">Posted <?php echo $article['date']; ?></span><div class="pull-right">
			        <span class="label"><?php echo $article['login']; ?></span>
			    </div>
			    </div>
			</div>     	

			<footer class="footer">
				
				<ins><del>App</del></ins> &copy; 2015
				
				<span id="switch">
	        		<?php if ($security -> mode == 'high') { ?>
	        		<form method="POST" action="admin/process/modes.php">
	        			<input type="hidden" name="level" value="low">
		        		<button type="submit" class="btn btn-danger btn-lg btn3d">
		        			<span class="glyphicon glyphicon-off"></span>
		        		</button>
	        		</form>
	        		<?php } else { ?>
	        		<form method="POST" action="admin/process/modes.php">
	        			<input type="hidden" name="level" value="high">
		        		<button type="submit" class="btn btn-success btn-lg btn3d">
		        			<span class="glyphicon glyphicon-flash"></span>
		        		</button>
	        		</form>
	        		<?php } ?>
	        	</span>

			</footer>

	    </div> <!-- /container -->
	</body>
</html>