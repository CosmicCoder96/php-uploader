<?php

session_start();


	$fname=$_SESSION['fname'];
	$user=$_SESSION['user'];
	if($user=="")
	{
		header("Location: login.php");
	}

?>
<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/994d7c72ea.js"></script>
	<script src = "js/bootbox.js"></script>
<style>
#bar_blank {
  border: solid 1px #000;
  height: 20px;
  width: 300px;
}

#bar_color {
  background-color: #006666;
  height: 20px;
  width: 0px;
}

#bar_blank, #hidden_iframe {
  display: none;
}
</style>	
</head>
<body>
	<nav class = "navbar navbar-default">
		<div class = "container">
			<div class = "navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs123" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			     </button>
				<a href = "#" class = "navbar-brand"> GeekHaven</a>
			</div>
			<div class = "collapse navbar-collapse" id="bs123">

				<div class = "nav navbar-nav">
					<li><a href = "https://www.facebook.com/geekhaveniiita/?fref=ts" target="_blank">About</a></li>
					<li><a href = "#" data-toggle="modal" data-target="#myModal">Contact</a></li>
				</div>
				<div class = "nav navbar-nav navbar-right">
					
					<li><a href = "logout.php">Logout</a></li>
				</div>
			</div>
		</div>
	</nav>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Contact info:</h4>
      </div>
      <div class="modal-body">
        
	<p>Abhishek Deora : Overall Coordinator, GeekHaven<br>
	Phone: 8756227275  &nbsp; <a href = "https://www.facebook.com/abhishek.deora.5" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true" width ="30px" height = "30px"></i></a>
	<br></p>
	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Easter egg</h4>
      </div>
      <div class="modal-body">
        
		<img src = "image.jpg" width = "400px" height = "400px">
	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

	<?php
	echo "<div class = 'container'>";
	echo "<h1>Welcome ".$fname."</h1>";
	echo"<h2>Choose a directory to upload to</h2>";
	?>

<br>

<form action="upload.php" method="post" enctype="multipart/form-data" id = "myForm"  target="hidden_iframe">
 <input type="hidden" value="myForm"
    name="<?php echo ini_get("session.upload_progress.name"); ?>">	   
 Select directory to upload to:
    <select class="form-control" name='option'>
  <option>Movies</option>
  <option>Songs</option>
  <option>Tutorials</option>
  <option>Software</option>
  <option>Pictures</option>
</select>
  <div class="form-group">
	
    <label for="exampleInputFile">File input</label>
    <input type="file" name = "fileToUpload" id="fileToUpload">
    
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
  <iframe id="hidden_iframe" name="hidden_iframe" src="upload.php"></iframe>

<div id="bar_blank">
   <div id="bar_color"></div>
  </div>
  <div id="status"></div>
</body>
<script src = 'js/progressBar.js'></script>
</html>




