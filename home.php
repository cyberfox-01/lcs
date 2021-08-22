

<?php

include_once 'resource/session.php';

$parts = explode("@", $_SESSION['username']);
$username = $parts[0];

if (!isset($_SESSION['id']))
{
    header("Location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="LCS Online Enrollment System">
	  <meta name="keywords" content="LCS Online Enrollment System">
  	<meta name="author" content="Marlon Tercero">
    <title>Lucban Christian School | Welcome</title>
    <link rel="icon" type="image/gif/png" href="./img/lcs_logo.png"/>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">Lucban</span> Christian School</h1>
        </div>
        <nav>
           <ul class = "main-menu">
            <li class="current"><a href="home.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a>
                <ul class="sub-menu">
                  <li><a href="announcements.php">Announcements</a></li>
                  <li><a href="tuition-inquiry.php">Tuition Fees</a></li>
                  <li><a href="enroll-new.php">Enroll as New Student/Transferee</a></li>
                  <li><a href="enroll-old.php">Enroll as Old Student</a></li>
                  <li><a href="check-enroll-status.php">Enrollment Status</a></li>
                  <li><a href="view-student-payments.php">View Payments</a></li>
                  <li><a href="talk-to-lcs-chatbot.php">LCS Chatbot</a></li>
                </ul></li>

              </li>

              <li><a href="logout.php">Log Out</a><?php  echo ' '.$username  ?></li>
          </ul>
        </nav>
      </div>
    </header>
    <section id="showcase">
      <div class="container">
        <h1><span class = "highlight">LCS</span> Online Enrollment System</h1>
        
      </div>
      
        <section id="boxes">
          <div class="container">
            <div class="box">
              <a class ="link" href = "/lcs/enroll-new.php"><img src="./img/logo_html.png">
              <h3>NEW STUDENT</h3></a>
              <p style = "padding: 20px; color: white; text-align: justify; background-color: gray; margin-right: 5px; margin-left: 5px; border-radius: 5px;  background: rgba(255, 255, 255, 0.1);">If you are  new student, please click the icon above to enroll.</p>
            </div>
            <div class="box">
              <a class ="link" href = "/lcs/enroll-new.php"><img src="./img/logo_css.png">
              <h3>TRANSFEREE</h3></a>
              <p style = "padding: 20px; color: white; text-align: justify; background-color: gray; margin-right: 5px; margin-left: 5px; border-radius: 5px;  background: rgba(255, 255, 255, 0.1);">If transferee, click the icon above to enroll.</p>
            </div>
            <div class="box">
             <a class ="link" href="/lcs/enroll-old.php"><img src="./img/logo_brush.png">
              <h3> OLD STUDENT</h3></a>
              <p style = "padding: 20px; color: white; text-align: justify; background-color: gray; margin-right: 5px; margin-left: 5px; border-radius: 5px;  background: rgba(255, 255, 255, 0.1);">If re-enrolling for the coming schoo year, click the icon above to enroll.</p>
            </div>
          </div>
        </section>
        

        

    </section >
    <style>
    a  { color: #051055;
      text-decoration: none;
     
       } 
     a:hover {
        color: #AA2609;
        font-size: 27px;
        text-shadow: 1px 1px 1px white;
        transition: all 0.9s;
       
      }/* CSS link color */
    </style>
     <section id="">
          <div style = "margin-left: 150px; margin-right: 150px; margin-top: 40px; margin-bottom: 60px; text-align:justify;">
              <h1 style="color:#051055; font-size: 25px; text-align: left; text-shadow: 1px 1px 1px blue; text-decoration: none;"><a href="announcements.php">ANNOUNCEMENTS</a></h1>
          <?php
              $con = new mysqli('localhost', 'root', 'Dont4GET', 'lcs'); 
              $sql2 = $con-> query("SELECT * FROM announcement ORDER BY datePosted DESC LIMIT 3;");
              
              while($row2 = mysqli_fetch_array($sql2))

              {
                $postedBy2 = $row2['postedBy'];
                $announcement2 = $row2['announcement'];
                $datePosted2 = $row2['datePosted'];
                $announcementTitle2 = $row2['announcementTitle'];
                $id = $row2['id'];


              echo "<tr>";
              
              echo "<p><b><a href=#>".$announcementTitle2."</a></b><br>";
              echo "<span style='color: green; font-size: 11px;'> Date Posted: ".$datePosted2."</p>"; 
              echo "<p>".$announcement2."......<a href=announcements.php>view more</a></p>";
              
             
              echo "</tr>";

              
          

            }

         ?>
       </div>
        </section>

    <footer>
      <p>Lucban Christian School, Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
