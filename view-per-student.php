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



<?php
$booksFee ="";
$miscellaneousFee = "";
$otherFee = "";
$otherInstructionalFee = "";
$ptaDonationFee = "";
$registrationFee = "";
$tuitionFee = "";
$uniformsFee = "";
$totalFees ="";


$con = new mysqli('localhost', 'root', 'Dont4GET', 'lcs');
$studentID = $con->real_escape_string($_GET['studentID']);



      function redirect() {
      header('Location: home.php');
      exit();
    }


if (!isset($_GET['studentID'])) {
          redirect();
          } else {

            $sql = $con->query("SELECT * FROM enrollee WHERE studentID = '$studentID'");

            while($row = mysqli_fetch_array($sql)) {
                          $agreement = "";
                          $enrollmentStatus = $row['enrollmentStatus'];
                          $isApproved = $row['isApproved'];
                          $isPassed = $row['isPassed'];
                          $enrolledWhen = date("Y-m-d");
                          $enrolledBy = $row['enrolledBy'];
                          $studentID = $row['studentID'];
                          $gradeLevel = $row['gradeLevel'];    
                          $enrolledByEmailAddress = $row['enrolledByEmailAddress'];
                          $enrolleeLastName = $row['enrolleeLastName'];
                          $enrolleeFirstName = $row['enrolleeFirstName'];
                          $enrolleeMiddleName = $row['enrolleeMiddleName'];
                          $enrolleeGender = $row['enrolleeGender'];
                          $enrolleeAge = $row['enrolleeAge'];
                          $enrolleeBirthday = $row['enrolleeBirthday'];
                          $enrolleeBirthPlace = $row['enrolleeBirthPlace']; 
                          $enrolleeHouseNo = $row['enrolleeHouseNo']; 
                          $enrolleeStreet = $row['enrolleeStreet'];
                          $enrolleeBarangay = $row['enrolleeBarangay'];
                          $enrolleeMunicipality = $row['enrolleeMunicipality'];
                          $enrolleeProvince = $row['enrolleeProvince'];
                          $enrolleeCountry = $row['enrolleeCountry'];
                          $enrolleeZipCode = $row['enrolleeZipCode'];
                          $enrolleeMotherName = $row['enrolleeMotherName'];
                          $enrolleeFatherName = $row['enrolleeFatherName'];
                          $enrolleeMotherPhone = $row['enrolleeMotherPhone'];
                          $enrolleeFatherPhone = $row['enrolleeFatherPhone'];
                          $motherOtherContacts =  $row['motherOtherContacts'];
                          $fatherOtherContacts = $row['fatherOtherContacts'];
                          $enrolleeGuardian = $row['enrolleeGuardian'];
                          $enrolleeSchoolServiceName = $row['enrolleeSchoolServiceName'];
                          $servicePlateNumber = $row['servicePlateNumber']; 
                          $servicePhoneNumber = $row['servicePhoneNumber'];
                          $enrolleePSANo = $row['enrolleePSANo'];
                          $enrolleeLRN =  $row['enrolleeLRN'];
                          $enrolleeCode = $row['enrolleeCode'];
                          $enrolleeRefNo = $row['enrolleeRefNo'];
                          $_SESSION['studentID'] = $studentID;
                          $gradeLevel2 = strtolower($gradeLevel);
               }
  }




                          
                       
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
    <link rel="stylesheet" href="/lcs/css/style-form.css">
  </head>
  <body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    </script>

    <script type="text/javascript">


        function updatebox()
              {
                  var textbox = document.getElementById("comment");
                  var values = [];

                  if(document.getElementById('tuitionFee').checked) {
                      values.push("Tuition Fee\n");
                  }

                  if(document.getElementById('miscellaneousFee').checked) {
                      values.push("Miscellaneous Fee\n");
                  }

                  if(document.getElementById('bookFee').checked) {
                      values.push("Book Fee\n");
                  }
                   if(document.getElementById('registrationFee').checked) {
                      values.push("Registration Fee\n");
                  }

                   if(document.getElementById('otherInstructionalFee').checked) {
                      values.push("Other Instructional Fee\n");
                  }
                  if(document.getElementById('uniformFee').checked) {
                      values.push("Uniform Fee\n");
                  }
                   if(document.getElementById('ptaDonationFee').checked) {
                      values.push("PTA Donation Fee\n");
                  }
                  if(document.getElementById('otherFees').checked) {
                      values.push("Other Fees\n");
                  }
                  

                  textbox.value = values.join(" ");
              }

       
    </script>


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
     
        <section id="boxes">
          <form class="container" method ="post" action = "add-payment-for-student.php">
            <table style="width:100%">

              </tr>
              <tr>
                <td colspan = 5><br><b>______________________________________________________________________________________________________________________________________</b></td>

              </tr>
              <tr>
                <td colspan = 5><b>STUDENT'S PERSONAL RECORD</b></td>

              </tr>
              <tr>
                <td colspan = 5>_____________________________________________________________________________________________________________________________________</td>

              </tr>

             
              <tr>
                <td colspan="2">
                  <div class = "input-group-signup">
                    <label for="lname"><b>Last Name:</b></label>
                    <input type="text" placeholder="Enter Last Name" name="enrolleeLastName" value = "<?php echo $enrolleeLastName; ?>" disabled>
                  </div>
                </td>
  
                <td colspan="2">
                  <div class = "input-group-signup">
                     <label for="fname"><b>First Name:</b></label>
                    <input type="text" placeholder="Enter first name" name="enrolleeFirstName" value = "<?php echo $enrolleeFirstName; ?>"required disabled>

                  </div>
                </td>
                <td>
                  <div class = "input-group-signup">
                     <label for="mname"><b>Middle Name:</b></label>
                    <input type="text" placeholder="Enter middle name" name="enrolleeMiddleName" value = "<?php echo $enrolleeMiddleName; ?>"required disabled>

                  </div>
                </td>
                <tr>
                 <td>
                  <div class = "input-group-signup">
                    <label for="refNumber"><b>Student Number:</b></label>
                    <input type="text" name="studentID" value = "<?php echo $studentID; ?>" disabled >

                  </div>
                </td>
                <td>
                  <div class = "input-group-signup">
                    <label for="gradeLevel"><b>Grade Level:</b></label>
                    <input type="text" name="gradeLevel" value = "<?php echo $gradeLevel; ?>" disabled >
            
                  </div>
                </td>
                <td>
                  <div class = "input-group-signup">
                    
                    <label for="gender"><b>Gender:</b></label>
                    <input type="text" name="enrolleeGender" value = "<?php echo $enrolleeGender; ?>" disabled >
  

                  </div>
                </td>
                <td>
                  <div class = "input-group-signup">
                    
                    <label for="gender"><b>Age:</b></label>
                    <input type="text" name="enrolleeAge" value = "<?php echo $enrolleeAge; ?>" disabled>
                    
                  </div>
                </td>
                <td>
                  <div class = "input-group-signup">
                    
                   
                    <label for="gender"><b>Email Address:</b></label>
                    <input type="text" name="enrolledByEmailAddress" value = "<?php echo $enrolledByEmailAddress; ?>" disabled>

                  </div>
                </td>
              </tr>

              <tr >
                <td >
                  <div style="margin-top: 50px;">
                <?php
                echo "<h2>PAYMENT TRANSACTIONS </h2>";
                ?>
              </div>
                </td>
              </tr>

             
              

                     <?php

                            $totalPayments = 0;


                            echo "<table style='border: 1px solid orange;'>";
                            echo "<tr style='border: 1px solid orange;'>";
                            echo "<th style='border: 1px solid orange;'> Total Amound Paid </th>";
                            echo "<th style='border: 1px solid orange;'>Payment Date   </th>";
                            echo "<th style='border: 1px solid orange;'> Notes/Comments</th>";
                            echo "<th style='border: 1px solid orange;'> Processed By </th>";
                            echo "</tr>";

                            $sql2 = $con->query("SELECT * FROM studentpayments WHERE studentID = '$studentID'");

                            while($row2 = mysqli_fetch_array($sql2)) {
                                      echo "<tr style='border: 1px solid orange;'>";
                                      echo "<td style='border: 1px solid orange;'><p>PHP ".$row2['amountPaid'].".00</p></td>";
                                      echo "<td style='border: 1px solid orange;'><p>".$row2['paymentMadeWhen']."</p></td>";
                                      echo "<td style='border: 1px solid orange;'><p>".$row2['descriptions']."</p></td>";
                                      echo "<td style='border: 1px solid orange;'><p>".$row2['paymentProcessedBy']."</p></td>";
                                      echo "</tr>";
                                      $totalPayments += $row2['amountPaid'];
                                          

                    }
                    
                    echo "</table>";


                    $sql3 = $con->query("SELECT * FROM tuition WHERE LOWER(gradeCode)='$gradeLevel2'");
                               while($row3 = mysqli_fetch_array($sql3)){

                                $booksFee = $row3['booksFee'];
                                $miscellaneousFee = $row3['miscellaneousFee'];
                                $otherFee = $row3['otherFee'];
                                $otherInstructionalFee = $row3['otherInstructionalFee'];
                                $ptaDonationFee = $row3['ptaDonationFee'];
                                $registrationFee = $row3['registrationFee'];
                                $tuitionFee = $row3['tuitionFee'];
                                $uniformsFee = $row3['uniformsFee'];

                                $totalFees = $booksFee + $miscellaneousFee + $otherFee + $otherInstructionalFee + $ptaDonationFee + $registrationFee + $tuitionFee + $uniformsFee;

                               }
                    $outstandingBalance = $totalFees - $totalPayments;

                    echo "<table style='border: 1px solid orange;'>";
                    echo "<div style='margin-top: 50px;'>";
                    echo "<tr style='border: 1px solid orange;'>";
                    echo "<td colspan=2 style='border: 1px solid orange;'><b>".strtoupper($gradeLevel)." TUITION FEE:</b></td>";
                    echo "<td style='border: 1px solid orange;'>PHP ".$totalFees.".00</td>";
                    echo "</tr>";

                    echo "<tr style='border: 1px solid orange;'>";
                    echo "<td colspan=2 style='border: 1px solid orange;'><b>TOTAL AMOUNT PAID: </b></td>";
                    echo "<td style='border: 1px solid orange;'>PHP ".$totalPayments.".00</td>";
                    echo "</tr>";

                    echo "<tr style='border: 1px solid orange;'>";
                    echo "<td colspan=2 style='border: 1px solid orange;'><b>OUTSTANDING BALANCE:</b></td>";
                    echo "<td style='border: 1px solid orange;'>PHP ".$outstandingBalance.".00</td>";
                    echo "</tr>";


                   echo "</div>";
                    echo "</table>";

               ?>


            </table>
             
          </form>
        </section>
    
      

    </section>


    


    <footer>
      <p>Lucban Christian School, Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
