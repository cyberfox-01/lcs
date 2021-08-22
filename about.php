
<?php

      include_once 'resource/session.php';

          $parts = explode("@", $_SESSION['username']);
          $username = $parts[0];
      
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

                <?php  if (isset($_SESSION['id'])) {
                 echo "<li><a href=logout.php>Log Out</a>". " ". $username; 
                }
                 ?></li>

              </li>
          </ul>
        </nav>
      </div>
    </header>

    <section id="">
      <div class="" style = "margin-left: 60px; margin-right: 40px; margin-top: 40px; margin-bottom: 60px; text-align:justify">
        

        <h2>VISION</h2>

        <p>A center of Christian Education in Quezon Province using the best techniques, methodologies, discipline and Bible-Integrated Teaching and producing students with maximum potential and Godly Character.</p>

        <h2>PHILOSOPHY AND PURPOSE</h2>

         <p>Lucban Christian School stands for the Bible, and its standards an integral part of our regulations. It is understood that the attendance at Lucban Christian School is a privilege and not a right. It is the hope and desire of the administration that each parent and student will have a sting respect for the philosophies and aims of the school.</p>

         <h2>Lucban Christian School </h2>

         
         <p><img src="/lcs/img/lcs_logo.png" alt="LCS Logo" style="width:200px;height:200px; float: left; margin: 15px 15px 15px 20px;">Lucban Christian School is a private, non-profit, non-stock service oriented Christian School center in training and developing children’s physical, mental, moral and spiritual life. It is owned and mission school of the Reformed Church in the Philippines. Duly registered at Security and Exchange Commission with SEC Reg. No. A199912405. </p>

		<p>The school was founded in 1993 when church elders Jaime Javen, Perfecto Javen and Pastor Dominador Suhian together with two teachers; Emmalyn De Ramos and Susan Castillo were challenged by the growing number of children whose parents dreamed of high quality of education. 
		The Lucban Christian School, LCS, is an educational ministry of Reformed Church in the Philippines (RCPI), a church established by of the Reformed Church of the Philippines. </p>

		<p>Initially, LCS offered Pre-School Education. It was then in 1995 when elementary grades one through six were added. Through the years, under Antonio Lozano’s leadership the grades enrollment steadily increased resulting in ever-expanding facilities, academic and extracurricular programs. In 2012, the new four-story school building was build though the effort and support of Rev. Mark Dong Won Lu, Kyungnam Layman’s Association, the Parents and Teachers Association and the local fund. It was completed and Inaugurated in October 2016.
		LCS is recognized school with the Government Recognition No. K-18 s. 2003, E-18, s. 2003 and S-0221, s.2017; for pre-school, elementary and High School, respectively.</p>

		<p>Lucban Christian School is owned and managed by the Reformed Church of the Philippines (RCPI), member of the United Private Educational Institution of Quezon Province, Inc. and the Region 4A Association of Christian Schools in Quezon Province (ASQUEP).</p>


        <form class="container" method ="post" action = "login.php">
                   
      </form>
      </div>
      
      
      

    </section>

    
    

    <footer>
      <p>Lucban Christian School, Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
