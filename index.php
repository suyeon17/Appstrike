<?php
require_once('backend/pdo.php');

session_start();

// check if user is online or offline
if ( isset( $_SESSION['login'] ) ) { $online = true; } 
else { $online = false; }

// get all articles ordered
$database = new Database();
$database->query('SELECT * from Articles ORDER BY date DESC, id DESC');
$articles = $database->resultset();
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
		<link rel="stylesheet" href="assets/css/timeline.css">
	</head>

	<body>
		<div class="container">
	      <div class="header clearfix">
	        <nav>
	          <ul class="nav nav-pills pull-right">
	            <li role="presentation" class="active"><a href="/Newspaper_management/index.php">Home</a></li>
	            <?php if (!$online){ ?>
	            <li role="presentation"><a href="/Newspaper_management/admin/login.php">Login</a></li>
	            <?php } else { ?>
	            <li role="presentation"><a href="/Newspaper_management/admin/panel.php">Panel</a></li>
	            <?php } ?>
	          </ul>
	        </nav>
	        <h3 class="text-muted"><del>App</del> ` <i style='color:#00612C;'>Articles</i></h3>
	      </div>

	       <?php
	      		if ( isset($_GET['msg']) && isset( $_GET['type'] )){ 
	      			if ( $_GET['type'] == 'danger' ) {
	      	?>
		      		<div class="notice notice-danger">
			        	<strong>Mistake ` </strong> <?php echo htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8'); ?>
			    	</div>
			
			<?php } else if ($_GET['type'] == 'success') { ?>

					<div class="notice notice-success">
				        <strong>Success ` </strong> <?php echo htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8'); ?>
				    </div>

			<?php } } ?>

			<div class="container">
			    <ul class="timeline">

			    	<?php foreach ($articles as $article) { ?>
			        <a href='press.php?id=<?php echo $article['id']; ?>'>
			        <li>
			          <div class="timeline-badge"><?php echo explode('-',$article['date'])[2].'/'.explode('-',$article['date'])[1];?></div>
			          <div class="timeline-panel">
			            <div class="timeline-heading">
			              <h4 class="timeline-title"><?php echo $article['title']; ?></h4>
			            </div>
			          </div>
			        </li>
			    	</a>
			        <?php } ?>
	
			    </ul>
			</div>
			
	      <footer class="footer">
	        <p><ins><del>App</del></ins> &copy; 2015</p>
	      </footer>

	    </div> <!-- /container -->
	</body>
</html>