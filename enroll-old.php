
<?php
      $msg = "";

      include_once 'resource/session.php';

      $parts = explode("@", $_SESSION['username']);
      $username = $parts[0];

      if (!isset($_SESSION['id']))
      {
          header("Location: login.php");
          die();
  }

  $previousYear = date("Y")-1;
  $month=01;
  $day=01;

  $FinalDate = $previousYear."-".$month."-".$day;
  $final = date("Y-m-d", strtotime($FinalDate));



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

              </li>

              <li><a href="logout.php">Log Out</a><?php  echo ': '.$username  ?></li>
          </ul>
        </nav>
      </div>
    </header>

    <script>
        function search() {
          // Declare variables 
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("studentID");
          filter = input.value.toUpperCase();
          table = document.getElementById("enrollmentStatusTable");
          tr = table.getElementsByTagName("tr");

          // Loop through all table rows, and hide those who don't match the search query
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            } 
          }
        }
</script>

    <section id="showcase">
      <div class="container">
        <form class="container" method ="post" action = "enroll-old.php">
           <div class = "tuition-group">
              <div>
                <h2> Enrollment Portal for Old Students</h2>
                <p> Welcome to the enrollment page for all student. Enter your "Student Number or Last Name" to view your account. </p>

              </div>
              <div>
              <table align="center" id = "enrollmentStatusTable">
                
                 <tr bgcolor ="#E1F0F0" style="text-align:left">
                  <th colspan = 7 style="text-align:left">
                    <form method="post" action="enroll-old.php">
                        Enter Student Number / Enrollee Last Name: 
                        <input type="text" placeholder="Student Number / Last Name" name="studentID" id="studentID" required>
                        <input type="submit" name = "viewProfile" value = "Go>>"> <?php echo $msg; ?>
                    </form>
                  </th>
                </tr>
                  <?php


                    echo "<tr bgcolor =#04087A>
                            <th>Student Number</th>
                            <th>Student Enrollment Status</th>
                            <th>Student Name</th>
                            <th>Enrollment Type</th>     
                            <th>Grade Level</th>
                            <th>Email Address</th>
                            <th>Enrollment Date</th>
                           
                        </tr>";


                    $enrolledByEmailAddress = strtolower($_SESSION['username']);
                    if($studentCodeStarts = "LCS"){
                          if (isset($_POST['viewProfile'])){
                                    $studentID = $_POST['studentID'];

                                    $studentCode = explode("@", $_POST['studentID']);
                                    $studentCodeStarts = $studentCode[0];

                                  $con = new mysqli('localhost', 'root', 'Dont4GET', 'lcs');   
                                  $sql = $con-> query("SELECT enrollmentStatus, studentID, gradeLevel, enrolledWhen, enrolleeFirstName, enrolleeLastName, enrolleeCode  FROM enrollee WHERE studentID = '$studentID' OR enrolleeLastName = '$studentID' AND enrolledByEmailAddress='$_SESSION[username]' AND enrolledWhen >= '$final'");

                                  if ($sql->num_rows > 0){
                                          while($row = mysqli_fetch_array($sql))
                                            {
                                            echo "<tr>";
                                            echo "<td> <a href='http://tercerotaton.cf/lcs/enroll-old-edit-information.php?studentID=$studentID'>" . $row['studentID'] . "</a></td>";
                                            echo "<td>" . ucfirst($row['enrollmentStatus']) . "</td>";
                                            echo "<td>" . $row['enrolleeFirstName'] ." ".$row['enrolleeLastName']. "</td>";
                                            echo "<td>" . $row['enrolleeCode'] ."</td>";
                                            echo "<td>" . $row['gradeLevel'] . "</td>";
                                            echo "<td>" . $enrolledByEmailAddress. "</td>";
                                            echo "<td>" . $row['enrolledWhen'] . "</td>";

                                            
                                           /* echo "<td>" . $row['otherInstructionalFee'] . "</td>";
                                            echo "<td>" . $row['uniformsFee'] . "</td>";
                                            echo "<td>" . $row['ptaDonationFee'] . "</td>";
                                            echo "<td>" . $row['otherFee'] . "</td>";
                                            
                                            echo "<td>" ."<input type=hidden name=hidden value='" . $row['gradeCode'] . "'>"."<input type=submit name=update value=update" . " </td>";*/
                                            echo "</tr>";

                                        }
                                      }else{
                                        echo "<tr>";
                                        echo "<td colspan=7>No records found.</td>";
                                        echo "</tr>";

                                      }
                              }
                    }else{

                          $msg = "The reference number is not an official student number of LCS.";
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