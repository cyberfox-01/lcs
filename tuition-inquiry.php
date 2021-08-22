
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
    <link rel="stylesheet" href="./css/style-tuition.css">
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

    <section id="showcase">
      <div class="container">
        <form class="container" method ="post" action = "tuition-inquiry.php">
           <div class = "tuition-group">
              <div>
                <h2> Tuition Computation Table </h2>
                <p> Welcome to tution summary page. Select the correct level to see how much is the tution fee for the currect school year. </p>

              </div>
              <div>
              <table align="center">
                <tr>

                  <th colspan = 2>
                    <p><b>ASSESMENT FEES</b></p>
                  </th>
                </tr>
                 <tr bgcolor ="#E1F0F0">
                  <td colspan=2>
                    Select Grade: 
                     <select  id="gradeLevel" name = "gradeLevel"> 
                        <option value="Kinder I">-----</option>
                        <option value="Kinder I">Kinder I</option> 
                        <option value="Kinder II">Kinder II</option> 
                        <option value="Grade 1">Grade 1</option>
                        <option value="Grade 2">Grade 2</option> 
                        <option value="Grade 3">Grade 3</option> 
                        <option value="Grade 4">Grade 4</option> 
                        <option value="Grade 5">Grade 5</option> 
                        <option value="Grade 6">Grade 6</option> 
                        <option value="Grade 7">Grade 7</option>  
                        <option value="Grade 8">Grade 8</option> 
                        <option value="Grade 9">Grade 9</option> 
                        <option value="Grade 10">Grade 10</option> 
                        <option value="Grade 11">Grade 11</option> 
                        <option value="Grade 12">Grade 12</option>  
                    </select> 
                    <input type="submit" name ="viewTuition" value = "Go>>">
                  </td>
                </tr>
                <?php

                         if(isset($_POST['viewTuition'])){


                                            $gradeLevel = strtolower($_POST['gradeLevel']);
                                            $_SESSION['gradeLevel'] = $gradeLevel;

                                            
                                              $con = new mysqli('localhost', 'root', 'Dont4GET', 'lcs');   
                                              $sql = $con-> query("SELECT * FROM tuition WHERE LOWER(gradeCode) = '$gradeLevel'");
                                              while($row = mysqli_fetch_array($sql))
                                                {

                                                $tuitionFee = $row['tuitionFee'];
                                                $miscellaneousFee = $row['miscellaneousFee'];
                                                $booksFee = $row['booksFee'];
                                                $registrationFee= $row['registrationFee'];
                                                $otherInstructionalFee = $row['otherInstructionalFee'];
                                                $uniformsFee = $row['uniformsFee'];
                                                $ptaDonationFee = $row['ptaDonationFee'];
                                                $otherFee = $row['otherFee'];

                                                echo "<form method=post action=none>";

                                                 echo "<tr>";
                                                echo "<td colspan=2><b>Tuition Fee Details for ".ucfirst($gradeLevel).":</b></td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                echo "<td >Tuition Fee:</td>";
                                                echo "<td> PHP " .$tuitionFee. ".00</td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                echo "<td>Miscellaneous Fee:</td>";
                                                echo "<td> PHP " . $miscellaneousFee. ".00</td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                echo "<td> Book Fee: </td>";
                                                echo "<td> PHP " .$booksFee. ".00</td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                echo "<td>Registration Fee:</td>";
                                                echo "<td> PHP " .$registrationFee. ".00</td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                echo "<td>Other Instructional Fee: </td>";
                                                echo "<td> PHP " .$otherInstructionalFee . ".00</td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                echo "<td>Uniform Fee:</td>";
                                                echo "<td> PHP " .$uniformsFee. ".00</td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                echo "<td>PTA Donation Fee:</td>";
                                                echo "<td> PHP " .$ptaDonationFee. ".00</td>";
                                                echo "</tr>";

                                                echo "<tr>";
                                                echo "<td>Other Fees: </td>";
                                                echo "<td> PHP " .$otherFee. ".00</td>";
                                                echo "</tr>";

                                                $sum = $tuitionFee + $miscellaneousFee + $booksFee + $registrationFee + $otherInstructionalFee + $uniformsFee + $ptaDonationFee + $otherFee;

                                                echo "<tr bgcolor = #FFAF33>";
                                                echo "<td><b>TOTAL ASSESSMENT FEES:</b></td>";
                                                echo "<td> <b>PHP ".$sum.".00 </b></td>";
                                                echo "</tr>";
                                                
                                                echo "</form>";
                                                

                                      
                                                }

                                    }


                                            
                        ?>
                                       


              </table>
              </div>

            </div>
      </form>
      </div>
      
      
      

    </section>

    
    

    <footer>
      <p>Lucban Christian School, Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
