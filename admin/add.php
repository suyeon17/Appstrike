<?php

session_start();

require_once('../classes/security.php');

if(!isset($_SESSION['login'])) {
	// admin not online
	header("Location: http://localhost/Appstrike/admin/login.php");
	die();
}

// get security object
$security = new Security();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>App</title>
		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../assets/css/theme.css">
		<!-- include summernote css/js-->
		<link href="../assets/css/summernote.css" rel="stylesheet">
		<script src="../assets/js/summernote.min.js"></script>
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
	        <h3 class="text-muted"><del>App</del> ` <i style='color:#00612C;'>Add Article</i></h3>
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

				<form class="span12" id="postForm" action="process/add_article.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
					<input type="text" name="title" class="form-control" placeholder="Title">
					<br>
					<textarea class="input-block-level" id="summernote" name="body" rows="18">
					</textarea>
					<div class="form-group">
						<label for="exampleInputFile">File input</label>
						<input type="file" name="file">
						<p class="help-block">You can import one file.</p>
					</div>
					<div style='text-align:center;margin-bottom:20px;margin-top:5px;'>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			
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
	    <script>
		    $(document).ready(function() {
	  			$('#summernote').summernote({
				  height: 300,
				  minHeight: null,
				  maxHeight: null,
				  focus: false,
				  placeholder: 'Describe yourself here...', 
				});
			});
			var postForm = function() {
				var content = $('textarea[name="body"]').html($('#summernote').code());
			}
	    </script>
	</body>
</html>