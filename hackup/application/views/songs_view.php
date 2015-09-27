

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
    <link href="<?php echo base_url(); ?>/assets/css/4-col-portfolio.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	  <!-- jQuery -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>

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
                <a class="navbar-brand" href="#">Prelude</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
		
		
        <!-- Heading Row -->
        <div class="row">
			<div id='artistBox'>
            <div class="col-md-4" >
				<div class = "row">
					<img class="img-responsive img-rounded" src="http://placehold.it/300x300" alt="" id='artistAvatar'>
				</div>
				<div class = "row">
					<br>
					<a id="profileButton">
						<button type="button" class="btn btn-default btn">
							<span class="glyphicon glyphicon-user"></span> View Profile
						</button>
					</a>
                </div>
			</div>
            <!-- /.col-md-8 -->
            <div class="col-md-8" id='playList'>
				<div class="row">
					<h1 id='artistName'>Artist Name</h1>
					<h3>Songs</h3>
				</div>
				<div class="row">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Artist</th>
								<th>Song</th>
							</tr>
						</thead>
						<tbody id='songList'>
						</tbody>
					</table>
				</div>
				<div class="row">
						<button id='mediaBackward' type="button" class="btn btn-default">
							<span class="glyphicon glyphicon-backward"></span>
						</button>
						<button id='mediaToggle' type="button" class="btn btn-default">
							<span class="glyphicon glyphicon-play"></span>
						</button>
						<button id='mediaStop' type="button" class="btn btn-default">
							<span class="glyphicon glyphicon-stop"></span>
						</button>
						<button id='mediaForward' type="button" class="btn btn-default">
							<span class="glyphicon glyphicon-forward"></span>
						</button>
				</div>
			</div>
            <!-- /.col-md-4 -->
			
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->		
		
		
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Browse Artists
                </h1>
            </div>
        </div>
        <!-- /.row -->
		
		
        <!-- Projects Row -->
		<div id='artistContainer'>
			<?php
				//row
				for ($i=0; $i<3; $i++) 
				{
					echo '<div class="row">';
					//col
					for ($j=0; $j<4; $j++) 
					{
						if(isset($artist[($i * 4) + $j]["name"]))
						{
							$artistimg = '<div class="col-md-3 portfolio-item" name="'.$artist[($i * 4) + $j]["name"].'" id="'.$artist[($i * 4) + $j]["id"].'">
											<a href="#">
												<img class="img-responsive" src="'. base_url() . "/assets/img/avatars/" . $artist[($i * 4) + $j]["img"] . '.jpg" alt="">
											</a>
											<h1 align="center"><small>'.$artist[($i * 4) + $j]["name"].'</small></h1>
										</div>';
										
							echo $artistimg;
						}
					}
					
					echo "</div>";
				}
			
			?>
        </div>
		
		<div style="display: none;">
			<audio id='mediaPlayer' controls>
				<source id='soundSource' src="" type="audio/mpeg">
				Your browser does not support the audio element.
			</audio>
		</div>
 
        <!-- /.row -->

		<script>
		 $(document).ready(function(){
			 $('.portfolio-item').click(function()
			 {
				var selectedItem = $(this);
				if(selectedItem.attr('name') != $('#artistBox').attr('name'))
				{
					$('#artistBox').slideUp(400, function()
					{
						$("tbody#songList").html("");
						$('#artistBox #artistName').html(selectedItem.attr('name'));
						$('#artistBox #artistAvatar').attr('src', selectedItem.find('img').attr('src'));
						$.ajax({
							url: "<?php echo $_SERVER["PHP_SELF"]; ?>/songs/getSongs/"+selectedItem.attr('name'),
							dataType: 'json',
							success: function(data)
							{
								data = JSON.parse(data);
								for(var song in data)
								{
									$("tbody#songList").append("<tr class='songItem' file='"+data[song]['filename']+"'>"+
													"<td class='filterable-cell'>"+data[song]['artist']+"</td>"+
													"<td class='filterable-cell'>"+data[song]['title']+"</td>"+
													"</tr>");
								}
								$("tbody#songList tr").click(function()
								{
									$('#soundSource').attr("src", "<?php echo base_url(); ?>/assets/mp3/"+$(this).attr('file'));
									document.getElementById("mediaPlayer").load();
									document.getElementById("mediaPlayer").play();
									$('#mediaToggle span').addClass('glyphicon-pause').removeClass('glyphicon-play');
									$("#songList").find(".selected").removeClass("selected");
									$(this).addClass("selected");
								});
							}
						});
					});
					$('.portfolio-item').not(selectedItem).fadeTo('fast', 0.5);
					selectedItem.fadeTo('fast', 1);
					$('#profileButton').attr("href", "<?php echo $_SERVER["PHP_SELF"]; ?>/songs/openProfile/"+encodeURI(selectedItem.attr('name')));
					$('#artistBox').slideDown();
					$('#artistBox').attr('name', selectedItem.attr('name'));
				}
				else
				{
					$('#artistBox').slideUp();
					$('.portfolio-item').fadeTo('fast', 1);
					$('#artistBox').removeAttr('name');
				}
				 
			});
			 $('#mediaStop').click(function()
				{
					document.getElementById("mediaPlayer").pause();
					$('#artistBox').slideUp();
					$('.portfolio-item').fadeTo('fast', 1);
					$('#artistBox').removeAttr('name');
				});
			$('#mediaToggle').click(function()
				{
					if(document.getElementById("mediaPlayer").paused)
					{
						document.getElementById("mediaPlayer").play();
						$('#mediaToggle span').addClass('glyphicon-pause').removeClass('glyphicon-play');
					}
					else
					{
						document.getElementById("mediaPlayer").pause();
						$('#mediaToggle span').addClass('glyphicon-play').removeClass('glyphicon-pause');
					}
				});
			$('#mediaForward').click(function()
				{
					var prevSong = $('#songList .selected');
					if(prevSong.next().length != 0)
					{
						prevSong.next().addClass('selected');
						$('#soundSource').attr("src", "<?php echo base_url(); ?>/assets/mp3/"+prevSong.next().attr('file'));
						document.getElementById("mediaPlayer").load();
						document.getElementById("mediaPlayer").play();
						
					}
					else
					{
						document.getElementById("mediaPlayer").pause();
					}
					prevSong.removeClass('selected');
					
				});
			$('#mediaBackward').click(function()
				{
					var prevSong = $('#songList .selected');
					if(prevSong.prev().length != 0)
					{
						prevSong.prev().addClass('selected');
						$('#soundSource').attr("src", "<?php echo base_url(); ?>/assets/mp3/"+prevSong.prev().attr('file'));
						document.getElementById("mediaPlayer").load();
						document.getElementById("mediaPlayer").play();
						
					}
					else
					{
						document.getElementById("mediaPlayer").pause();
					}
					prevSong.removeClass('selected');
					
				});
		});
		</script>

        <hr>

        <!-- Footer -->
        

    </div>
    <!-- /.container -->

  

</body>

</html>
