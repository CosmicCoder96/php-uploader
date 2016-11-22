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
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/994d7c72ea.js"></script>
    <script src = "js/bootbox.js"></script>
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
    $servername = "localhost";
    $username = "root";
    $password = "";
    //$dbname = "mentor";
    $dbname="admin";
    try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname",  $username, $password);
    // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //echo"connection succesful";   
  
    }
catch(PDOException $e)
    {
    echo "Connection failed: ";
    }
    $try = "select * from uploads where approval =0";
    $sql_result= $conn->prepare($try);
    $sql_result->execute();
    $rows = $sql_result->fetchALL(PDO::FETCH_ASSOC); 
$option=$_POST['option'];
$target_dir = "directory/admin/";
$target_file = $target_dir . basename(str_replace(' ','-',$_FILES["fileToUpload"]["name"]));
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
//echo $_POST['option'];
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    //$dbname = "mentor";
    $dbname="admin";
    try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname",  $username, $password);
    // set the PDO error mode to exception
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //echo"connection succesful";   
  
    }
catch(PDOException $e)
    {
    echo "Connection failed: ";
    }
        $try = "insert into uploads(name,user,destination,approval) values('".$_FILES["fileToUpload"]["name"]. "','".$user."','".$option."',0)";
    $sql_result= $conn->prepare($try);
    $sql_result->execute();
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded by ".$user."-".$fname."<br>It will be uploaded in the respective directory after inspection by moderator<br>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


echo "<a href = 'login.php' >Go back</a>";
?>