<?php
session_start();
if(!isset($_SESSION['login'])) {
	// admin not online
	header("Location: http://localhost/Newspaper_management/admin/login.php");
	die();
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
		<link rel="stylesheet" href="../assets/css/themeTwo.css">
		<link rel="stylesheet" href="../assets/css/panel.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" />
		<script src="../assets/js/panel.js"></script>
	</head>

	<body>

		<div class="container">
	      <div class="header clearfix">
	        <nav>
	          <ul class="nav nav-pills pull-right">
	            <li role="presentation"><a href="/Newspaper_management/index.php">Home</a></li>
	            <li role="presentation" class="active"><a href="/Newspaper_management/admin/panel.php">Panel</a></li>
	          </ul>
	        </nav>
	        <h3 class="text-muted"><del>App</del> ` <i style='color:#00612C;'>Control Panel</i></h3>
	      </div>
	    </div>


	    <?php
	      		if ( isset($_GET['msg']) && isset( $_GET['type'] )){ 
	      			if ( $_GET['type'] == 'danger' ) {
	      	?>
	      		<div class="container">
		      		<div class="notice notice-danger">
			        	<strong>Mistake ` </strong> <?php echo htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8'); ?>
			    	</div>
				</div>
			
			<?php } else if ($_GET['type'] == 'success') { ?>
				<div class="container">
					<div class="notice notice-success">
				        <strong>Success ` </strong> <?php echo htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8'); ?>
				    </div>
				</div>

			<?php } } ?>

		<div class="nocontainer">
			<div class="row">
		      <div class="col-md-4 col-md-offset-4">
		        <div class="material-button-anim">
		          <ul class="list-inline" id="options">
		            <li class="option">
		              <a href='process/backup.php'>
		              <button class="material-button option1" type="button">
		                <span class="fa fa-database" aria-hidden="true"></span>
		              </button>
		          	  </a>
		            </li>
		            <li class="option">
		              <a href='add.php'>
		              <button class="material-button option2" type="button">
		                <span class="fa fa-pencil" aria-hidden="true"></span>
		              </button>
		          	  </a>
		            </li>
		            <li class="option">
		              <a href='process/logout.php'>
		              <button class="material-button option3" type="button">
		                <span class="fa fa-sign-out" aria-hidden="true"></span>
		              </button>
		           	  </a>
		            </li>
		          </ul>
		          <button id="plus" class="material-button material-button-toggle" type="button">
		            <span class="fa fa-plus" aria-hidden="true"></span>
		          </button>
		        </div>
		      </div>
			</div>
		</div>

		<div class="container">
			<footer class="footer">
		        <p><ins><del>App</del></ins> &copy; 2015</p>
		    </footer>
	    </div> <!-- /container -->

	</body>
</html>