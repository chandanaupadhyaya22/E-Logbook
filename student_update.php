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
    <script src="forms.js"></script>
</head>
<body id="home">
<div class="ui inverted page grid masthead segment" style="padding-top:30px;">
   
    <div class="column">
      <div class="inverted secondary pointing ui menu">
        <div class="header item">RV College of Engineering</div>
        <div class="right menu">
           <a class="item" href="student_menu.php">Home</a>
		  <div class="ui dropdown link item">
            Menu
            <i class="dropdown icon"></i>
            <div class="menu">
              <a class="item">Messages </a>
              <a class="item">Timetable</a>
              <a class="item">Profile</a>
			  
            </div>
          </div>
          <a class="item" href="student_info.html">Information</a>
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
		  <a href="view_attendance.php">View Now</a>
		  </div>
        </div>
      </div>
    </div>
  </div>
 

  <div class="ui page grid overview segment" style="padding-left:0px;padding-right:0px">
    <div class="ui two wide column"></div>
    <div class="twelve wide column">
	    <div class="ui column center aligned stackable divided grid" >
            <div class="column">
				
					<form class="ui red raised secondary form segment" name="input" action="student_success_msg.php" method="post">
					<?php
						$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");
							if (mysqli_connect_errno())
							{
									echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							$usn=$_SESSION['usn_of_stu'];
							$qry= "SELECT * FROM student WHERE USN='$usn'";
							$result=mysqli_query($con,$qry);

							if($result) {
							if(mysqli_num_rows($result) <= 0) {
								echo "<p> No student details found. Please contact your admin.</p>"; 
							}
							else {	
								echo " <table class='ui left aligned three column celled table segment'><thead><tr><th class='five wide'>Particular</th><th class='seven wide'>Details</th></tr></thead><tbody>";
								while ($row=mysqli_fetch_array($result))
								{	echo "<tr><td>";
									echo 'Name';
									echo "</td><td>";
									echo $row['name'];
									
									echo "</td></tr>";
									echo "<tr><td>";
									echo 'USN';
									echo "</td><td>";
									echo $row['USN'];
									
									echo "</td></tr>";
									echo "<tr><td>";
									echo 'Semester';
									echo "</td><td>";
									echo $row['sem'];
									
									echo "</td></tr>";
									echo "<tr><td>";
									echo 'Batch';
									echo "</td><td>";
									echo $row['batch'];
									
									echo "</td></tr>";
									echo "<tr><td>";
									echo 'Email id';
									echo "</td><td>";
									echo "<input placeholder='mail id' type='email' name='mail'>";
									
									echo "</td></tr>";
									echo "<tr><td>";
									echo 'Phone number';
									echo "</td><td>";
									echo "<input placeholder='Phone no' type='text' name='phone'>";
									
									echo "</td></tr>";
									echo "<tr><td>";
									echo "Parent's name";
									echo "</td><td>";
									echo $row['patent'];
									
									echo "</td></tr>";
									echo "<tr><td>";
									echo 'Parent mail id';
									echo "</td><td>";
									echo "<input placeholder='parent mail id' type='text' name='pmail'>";
									
									echo "</td></tr>";
									echo "<tr><td>";
									echo 'Parent number';
									echo "</td><td>";
									echo "<input placeholder='parent no' type='text' name='pphone'>";
									
									echo "</td></tr>";
									echo "<tr><td>";
									echo 'Address';
									echo "</td><td>";
									echo "<input placeholder='Address' type='text' name='add'>";
									
									echo "</td></tr>";
								
									
								}
								echo "</tbody></table>";
							}
						}
						$_SESSION['Message']="Successfully updated";
						?>
						<input type="email" name="bday">
					<div class="red ui submit button">Update</div>
 
  

  </form>


</div>
  </div>
		</div>
		
      </div>
  
  <div class="ui primary inverted blue page grid segment" style="	background-image:url(images/12.jpg);background-repeat: no-repeat;  background-size:cover;">
  
      </div>
</body>

</html>