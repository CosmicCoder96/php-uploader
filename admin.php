<?php
session_start();

    $fname=$_SESSION['fname'];
    $user=$_SESSION['user'];
    if($user=="" ||($user!="iit2015036" && $user!="iit2014141"))
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
    echo "<form action='admin-upload.php' method = 'post'><table class='table table-bordered'>
  <th>Name</th><th>User</th><th>Destination</th><th>Date</th><th>Select</th>";

    foreach ($rows as $row) {
        echo "<tr><td><a href=directory/admin/$row[name]>".$row['name']."</a></td>";
        echo "<td>$row[user]</td>";
        echo "<td>$row[destination]</td>";
        echo "<td>$row[date]</td>";
        echo "<td><input type = 'checkbox' name = 'check_list[]' value = '$row[name]'/></td></tr>";
    }
    echo "</table>";
    echo "<input type = 'submit' value = 'upload selected files'/> ";
/*    $directory="directory/admin/";
    $phpfiles = glob($directory."*");
echo $phpfiles;
foreach($phpfiles as $phpfile)
{   
echo "<a href=$phpfile>".basename($phpfile)."</a><br>";
}*/



echo "<a href = 'login.php' >Go back</a>";
?>