<?php

session_start();

require_once('../classes/security.php');

if(!isset($_SESSION['login'])) {
	// admin not online
	header("Location: http://localhost/Appstrike/admin/login.php");
	die();
}

// this file is for low mode, soo 
$security = new Security();
if ($security -> mode == 'high') {

	// redirect to high mode backup
	header("Location: http://localhost/Appstrike/admin/process/backup.php");
	die();

}

?>

<?php

if (isset( $_GET['filename'] )) {
	
	$output = shell_exec("zip -r uploads/".$_GET['filename'].".zip ../../Appstrike ");

}

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
		<link rel="stylesheet" href="../assets/css/theme.css">
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
	            <li role="presentation"><a href="/Appstrike/index.php">Home</a></li>
	            <li role="presentation"><a href="/Appstrike/admin/panel.php">Panel</a></li>
	          </ul>
	        </nav>
	        <h3 class="text-muted"><del>App</del> ` <i style='color:#00612C;'>Backup</i></h3>
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
				
				<form class="span12" id="postForm" action="lowMode_backup.php" method="get" enctype="multipart/form-data">
					
					<div class="row">
					    <div class="col-lg-4 col-lg-offset-4">
					    	<h4 style='color:grey'>A name for your ZIP File !</h4>
					        <div class="input-group" style='text-align:center;'>
					            <input type="text "class="form-control" id="filename" name="filename" placeholder="Enter File Name"></input>
					            <button type="submit" class="btn btn-primary" style='margin-top:10px'>Submit</button>
					        </div><!-- /input-group -->
					    </div><!-- /.col-lg-4 -->
					</div><!-- /.row -->
					
				</form>
				
				<?php if (isset( $output )) { ?>
				<div class="col-lg-12 alert alert-success" role="alert" align="center" >
				<?php echo "<pre>$output</pre>"; ?>
				</div>
				<?php
					echo "<div>And here is your <a href='http://localhost/Appstrike/admin/uploads/{$_GET['filename']}.zip'>Backup</a> File !</div><br><br>"; 
					}
				?>
			
			<footer class="footer">
	        	
	        	<ins><del>App</del></ins> &copy; 2015
				
				<span id="switch">
	        		<?php if ($security -> mode == 'high') { ?>
	        		<form method="POST" action="process/modes.php">
	        			<input type="hidden" name="level" value="low">
		        		<button type="submit" class="btn btn-danger btn-lg btn3d">
		        			<span class="glyphicon glyphicon-off"></span>
		        		</button>
	        		</form>
	        		<?php } else { ?>
	        		<form method="POST" action="process/modes.php">
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