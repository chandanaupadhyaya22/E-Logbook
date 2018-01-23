<?php
session_start();
if(isset($_SESSION['student'])==false) {
$_SESSION['Login.Error']= "Student login required";
header('Location: student_log.php'); 
}
?>



<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title>Student menu</title>

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="../packaged/css/semantic.css">

  <script src="jquery.js"></script>
  <script src="jquery_address.js"></script>
  <script src="../packaged/javascript/semantic.js"></script>
  <script src="homepage.js"></script>

  <link rel="stylesheet" type="text/css" href="feed.css">
  <link rel="stylesheet" type="text/css" href="homepage.css">
  <script src="feed.js"></script>
</head>
<body id="home">
<div class="ui inverted page grid masthead segment" style="padding-top:30px;">
   
    <div class="column">
      <div class="inverted secondary pointing ui menu">
        <div class="header item">RV College of Engineering</div>
        <div class="right menu">
           <a class="item" href="admin_menu.php">Home</a>
		  <div class="ui dropdown link item">
            Menu
            <i class="dropdown icon"></i>
            <div class="menu">
              <a class="item">Messages </a>
              <a class="item">Timetable</a>
              <a class="item">Profile</a>
			  <a class="item">Biotechnology</a>
			  <a class="item">Mechanical</a>
			  <a class="item">Civil</a>
            </div>
          </div>
          <a class="item" href="admin_info.html">Information</a>
          <a class="item" href="stats.html">Stats</a>
		  
		  <a class="item" href="logout.php">Logout</a>
        </div>
      </div>
      <img src="images/RV_logo.png" class="ui medium image"  style="margin-bottom:6em;width:250px;font-size:1rem" >
      <div class="ui hidden transition information">
        <h1 class="ui inverted header">
          Student
        </h1>
        <p>View your attendance here</p>
        <div class="large basic inverted animated fade ui button">
          <div class="visible content"> Lab session </div>
          <div class="hidden content">
		  <a href="temp_logbook.html">View Now</a>
		  </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ui large inverted vertical sidebar menu">
    <a class="active item">
      Messages <span class="ui label">213</span>
    </a>
    <a class="item">
      Timetable <span class="ui label">113</span>
    </a>
    <div class="item">
      <b>Profile</b>
      <div class="menu">
        <a class="item">
          Change Password <span class="ui label">11</span>
        </a>
        <a class="item">
          Update <span class="ui label">21</span>
        </a>
      </div>
    </div>
    <a class="item">
      <i class="bookmark icon"></i> Favorites
    </a>
    <div class="ui dropdown item">
      <i class="add icon"></i> New
      <div class="menu">
        <a class="item"><i class="rss icon"></i> Feed</a>
        <a class="item"><i class="tag icon"></i> Tag</a>
        <a class="item"><i class="folder icon"></i> Group</a>
      </div>
    </div>
  </div>
  
  <div class="ui page grid overview segment" style="padding-left:0px;padding-right:0px">
    <div class="ui two wide column"></div>
    <div class="twelve wide column">
	    <div class="ui column stackable divided grid" >
            <div class="column">
				<div class="ui teal raised segment">
					<?php
						$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");
							if (mysqli_connect_errno())
							{
									echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							$usn= $_SESSION['usn_of_stu'];
							$qry= "SELECT * FROM logbook_temp WHERE USN='$usn'";
							$result=mysqli_query($con,$qry);

							if($result) {
							if(mysqli_num_rows($result) <= 0) {
								echo "<p> You have not registered for any session right now. Please register one.</p>"; 
							}
							else {	
								echo " <table class='ui inverted celled table segment'><thead><tr><th>Session_id</th><th>Subject</th><th>USN</th><th>Timestamp</th></tr></thead><tbody>";
								while ($row=mysqli_fetch_array($result))
								{	echo "<tr><td>";
									echo $row['sid'];
									echo "</td><td>";
									echo $row['sub_name'];
									echo "</td><td>";
									echo $row['USN'];
									echo "</td><td>";
									echo $row['log_in'];
									
									echo "</td></tr>";
									
								}
								echo "</tbody></table>";
							}
						}
						?>
							

  
</div>
</div>
  </div>
		</div>
		
      </div>
    </div>
  
  <div class="ui primary inverted blue page grid segment" style="	background-image:url(images/12.jpg);background-repeat: no-repeat;  background-size:cover;">
  
      </div>
</body>

</html>