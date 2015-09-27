<?php 
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Prelude</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
	
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>/assets/css/4-col-portfolio.css" rel="stylesheet">

	
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
			</div>
                <a class="navbar-brand" href="#">Prelude</a>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse collapse">
                 <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php base_url(); ?>/hackup/">Home</a>
                    </li>
                   <?php session_start(); 
							if(isset($_SESSION['user'])){
								echo "<li><a href='http://localhost/hackup/index.php/songs/openProfile/".$_SESSION['user']."'>Profile</a></li>";
							}
							else
							{
								echo "";
							}
					?>
                    <li>
                        <a href="#">Invites</a>
                    </li>
                </ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
                        <a href="http://localhost/hackup/index.php/login">
							<?php
								if(isset($_SESSION['user'])){
									echo $_SESSION['user'];
								}
								else
								{
									echo "Log-in";
								}
							?>
						</a>
                    </li>
				</ul>
				
				
				
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
		
    <!-- Page Content -->
    <div class="container">
	
	<div class="row">
        <div class="col-md-6 center-block"">	
	
		<h1>Log-In</h1>

		
			<form method='post' action='login/enter' role="form" class="col-xs-6">
			  <div class="form-group">
				<label for="code">Username</label>
				<input name='username' type="text" class="form-control"/>
			  </div>

			  <div class="form-group">
				<label for="code">Password</label>
				<input name='password' type="password" class="form-control"/>
			  </div>
			  <button type="submit" class="btn btn-default">Submit</button>
			</form>
			
		
		</div>
		
		</div>
	<div class="row">
        <div class="col-md-6 center-block">	
			<p><a href="register">Register</a></hp>
		</div>
	</div>
</div>
	
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>

</body>

</html>
