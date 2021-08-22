<?php


include_once 'resource/session.php';
include_once 'resource/db.php';

$parts = explode("@", $_SESSION['username']);
$username = $parts[0];

if (!isset($_SESSION['id']))
{
    header("Location: index.php");
    die();
}

$con = new mysqli('localhost', 'root', 'Dont4GET', 'lcs');

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="LCS Online Enrollment System">
    <meta name="keywords" content="web design, affordable web design, professional web design">
    <meta name="author" content="Marlon Tercero">
    <title>Lucban Christian School | Welcome</title>
    <link rel="stylesheet" href="/lcs/css/announce-style-form.css">
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

    <section id="">
     
        <section id="">
          <form class="" method ="post" action = "add-announcements.php">
    
            	
            <div style =  "margin-left: 150px; margin-right: 150px; margin-top: 40px; margin-bottom: 60px; text-align:justify">
             
           	<h1 style="color:#051055; font-size: 40px; text-shadow: 1px 1px #FB6B0D; text-align: center;">Announcements</h1>

              
              	
              	
              <?php
              	
       				$sql2 = $con-> query("SELECT * FROM announcement ORDER BY datePosted DESC;");

       				while($row2 = mysqli_fetch_array($sql2))

                        {
                        	$postedBy2 = $row2['postedBy'];
            							$announcement2 = $row2['announcement'];
            							$datePosted2 = $row2['datePosted'];
            							$announcementTitle2 = $row2['announcementTitle'];
            							$id = $row2['id'];


							echo "<tr>";
							
							echo "<b><a href=#>".$announcementTitle2."</a></b><br>";
              echo "<p style='color: green; font-size: 11px;'> Date Posted: ".$datePosted2."===============================================================================================================</p>"; 
							echo "<p>".$announcement2."</p>";
              
             
							echo "</tr>";
							
					

						}

         ?>
            </div>
            

            
             
          </form>
        </section>
    
      

    </section>


    


    <footer>
      <p>Lucban Christian School, Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
