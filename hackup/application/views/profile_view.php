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
	<script src="http://js.api.here.com/v3/3.0/mapsjs-core.js"
	type="text/javascript" charset="utf-8"></script>
	<script src="http://js.api.here.com/v3/3.0/mapsjs-service.js"
	type="text/javascript" charset="utf-8"></script>
	<script src="http://js.api.here.com/v3/3.0/mapsjs-ui.js" 
            type="text/javascript" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" 
            href="http://js.api.here.com/v3/3.0/mapsjs-ui.css" />
			<script src="http://js.api.here.com/v3/3.0/mapsjs-mapevents.js" 
	   type="text/javascript" charset="utf-8"></script>

	
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
                <ul class="nav navbar-nav navbar-left">
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
			<div class="col-md-4">	
				<div class="profilelogo">
					<img src="<?php echo base_url() . "assets/img/avatars/" . $img; ?>.jpg" alt="">
				</div>
			</div>
			
			<div class="col-md-8">
				<h1 id="artistName"><?php echo $name ?></h1>
				<h3><span class="glyphicon glyphicon-globe"></span><?php echo $location ?></h3>
						<button id='mapButton' type="button" class="btn btn-default btn" data-toggle="modal" data-target="#viewMap">
							<a href="#">View Map</a>
						</button>
				
						<!-- Modal -->
						  <div class="modal fade" id="viewMap" role="dialog">
							<div class="modal-dialog modal-lg">
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 class="modal-title">Location.</h4>
								</div>
								<div class="modal-body" id='mapContainer'>
								  <p></p>
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							  </div>
							</div>
						  </div>	
						  
				<p><?php echo $bio; ?></p>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<p>
				<button type="button" class="btn btn-default btn" data-toggle="modal" data-target="#inviteArtist">
						<span class="glyphicon glyphicon-user"></span> Invite for a Gig
				</button>
				</p>
				<!-- Modal -->
				  <div class="modal fade" id="inviteArtist" role="dialog">
					<div class="modal-dialog modal-lg">
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">Invite to Gig.</h4>
						</div>
						<div class="modal-body">
						 <textarea id='gigText' placeholder='Leave gig details here.'></textarea>
						</div>
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" data-dismiss="modal">Send</button>
						  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						</div>
					  </div>
					</div>
				  </div>
				
			</div>
			
			
			
			
			<div class="col-md-8">
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
				<table class="table table-striped header-fixed">
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
		</div>
        
        <!-- /.row -->

    </div>
	
	<div style="display: none;">
		<audio id='mediaPlayer' controls>
			<source id='soundSource' src="" type="audio/mpeg">
			Your browser does not support the audio element.
		</audio>
	</div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
	
	<script>
	
	var coordinates='<?php echo $coordinates; ?>'
	
	$('#mapButton').click(function(){var platform = new H.service.Platform({
	  'app_id': 'GLPOIwAWfFQWUt73eNLn',
	  'app_code': 'dCZKx7IaJC_CHX90pDkiYw'
	});
	
	// Obtain the default map types from the platform object:
	var defaultLayers = platform.createDefaultLayers();
	$('#mapContainer').html("");
	var latlng = coordinates.split(", ");
	// Instantiate (and display) a map object:
	setTimeout(function(){
		var map = new H.Map(
		document.getElementById('mapContainer'),
		defaultLayers.normal.map,
		{
		  zoom: 15,
		  center: { lat: latlng[0], lng: latlng[1]}
		});
		var ui = H.ui.UI.createDefault(map, defaultLayers);
	}, 500);});
	
	$.ajax({
		url: "<?php echo base_url(); ?>index.php/songs/getSongs/<?php echo $name ?>",
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
	</script>

</body>

</html>
