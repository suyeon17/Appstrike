<?php
session_start();
if(isset($_SESSION['login'])) {
	// admin online
	header("Location: http://localhost/Newspaper_management/admin/panel.php");
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
		<link rel="stylesheet" href="../assets/css/theme.css">
		<link rel="stylesheet" href="../assets/css/login.css">
		<script src="../assets/js/login.js"></script>
	</head>

	<body>
		<div class="container">
	      <div class="header clearfix">
	        <nav>
	          <ul class="nav nav-pills pull-right">
	            <li role="presentation"><a href="/Newspaper_management/index.php">Home</a></li>
	            <li role="presentation" class="active"><a href="/Newspaper_management/admin/login.php">Login</a></li>
	          </ul>
	        </nav>
	        <h3 class="text-muted">App ` <i style='color:#00612C;'>Login</i></h3>
	      </div>

			<section id="login">
			    <div class="container">
			    	<div class="row">
			    	    <div class="col-xs-12">
			        	    <div class="form-wrap">
			                <h1>Log in as an Admin</h1>
			                    <form role="form" action="process/login.php" method="post" id="login-form" autocomplete="off">
			                        <div class="form-group">
			                            <label for="username" class="sr-only">username</label>
			                            <input type="text" name="login" id="email" class="form-control" placeholder="Login">
			                        </div>
			                        <div class="form-group">
			                            <label for="key" class="sr-only">Password</label>
			                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
			                        </div>
			                        <div class="checkbox">
			                            <span class="character-checkbox" onclick="showPassword()"></span>
			                            <span class="label">Show password</span>
			                        </div>
			                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
			                    </form>
			                    <!-- <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a> -->
			        	    </div>
			    		</div> <!-- /.col-xs-12 -->
			    	</div> <!-- /.row -->
			    </div> <!-- /.container -->
			</section>

			<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">×</span>
								<span class="sr-only">Close</span>
							</button>
							<h4 class="modal-title">Recovery password</h4>
						</div>
						<div class="modal-body">
							<p>Type your email account</p>
							<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-custom">Recovery</button>
						</div>
					</div> <!-- /.modal-content -->
				</div> <!-- /.modal-dialog -->
			</div> <!-- /.modal -->


	      <footer class="footer">
	        <p>App &copy; 2015</p>
	      </footer>

	    </div> <!-- /container -->
	</body>
</html>