<?php
session_start();
if(!isset($_SESSION['login'])) {
	// admin not online
	header("Location: http://localhost/Newspaper_management/admin/login.php");
	die();
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Busni</title>
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
	            <li role="presentation"><a href="/Newspaper_management/index.php">Home</a></li>
	            <li role="presentation" class="active"><a href="/Newspaper_management/admin/panel.php">Panel</a></li>
	          </ul>
	        </nav>
	        <h3 class="text-muted">Busni ` <i style='color:#00612C;'>Add Article</i></h3>
	      </div>

				<form class="span12" id="postForm" action="process/add_article.php" method="POST" enctype="multipart/form-data" onsubmit="return postForm()">
					<input type="text" name="title" class="form-control" placeholder="Title">
					<br>
					<textarea class="input-block-level" id="summernote" name="body" rows="18">
					</textarea>
					<div style='text-align:center;margin-bottom:20px;'>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			
	      <footer class="footer">
	        <p>Busni &copy; 2015</p>
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