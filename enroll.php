<?php

include_once '../resource/db.php';
include_once '../resource/session.php';

      $parts = explode("@", $_SESSION['username']);
      $username = $parts[0];

      if (!isset($_SESSION['id'])){
          header("Location: ../lcs/login.php");
          die();
      }
$con = new mysqli('localhost', 'root', 'Dont4GET', 'lcs');
$sql = $con->query("SELECT name FROM users WHERE email='$_SESSION[username]'");
   while($row = mysqli_fetch_array($sql)) {
    $name=$row['name'];

   }


 if(isset($_POST['enroll'])){

                          //con = new mysqli('localhost', 'root', '', 'lcs');  

                          /*$gradeCode = $_POST['gradeCode'];
                          $tuitionFee = $_POST['tuitionFee'];
                          $miscellaneousFee = $_POST['miscellaneousFee'];
                          $booksFee = $_POST['booksFee'];
                          $registrationFee = $_POST['registrationFee'];
                          $otherInstructionalFee = $_POST['otherInstructionalFee'];
                          $uniformsFee = $_POST['uniformsFee'];
                          $ptaDonationFee = $_POST['ptaDonationFee'];
                          $otherFee = $_POST['otherFee']);

                          $gradeCode_lower = strtolower($gradeCode);*/
                          $agreement = 1;
                          $enrollmentStatus = "New";
                          $isApproved = "Not Evaluated";
                          $isPassed = "Not Evaluated";
                          $enrolledWhen = date("Y-m-d");
                          $enrolledBy = $name;
                          $studentID = $_POST['studentID'];
                          $gradeLevel = $_POST['gradeLevel'];    
                          $enrolledByEmailAddress = $_SESSION['username'];
                          $enrolleeLastName = $_POST['enrolleeLastName'];
                          $enrolleeFirstName = $_POST['enrolleeFirstName'];
                          $enrolleeMiddleName = $_POST['enrolleeMiddleName'];
                          $enrolleeGender = $_POST['enrolleeGender'];
                          $enrolleeAge = $_POST['enrolleeAge'];
                          $enrolleeBirthday = $_POST['enrolleeBirthday'];
                          $enrolleeBirthPlace = $_POST['enrolleeBirthPlace']; 
                          $enrolleeHouseNo = $_POST['enrolleeHouseNo']; 
                          $enrolleeStreet = $_POST['enrolleeStreet'];
                          $enrolleeBarangay = $_POST['enrolleeBarangay'];
                          $enrolleeMunicipality = $_POST['enrolleeMunicipality'];
                          $enrolleeProvince = $_POST['enrolleeProvince'];
                          $enrolleeCountry = $_POST['enrolleeCountry'];
                          $enrolleeZipCode = $_POST['enrolleeZipCode'];
                          $enrolleeMotherName = $_POST['enrolleeMotherName'];
                          $enrolleeFatherName = $_POST['enrolleeFatherName'];
                          $enrolleeMotherPhone = $_POST['enrolleeMotherPhone'];
                          $enrolleeFatherPhone = $_POST['enrolleeFatherPhone'];
                          $motherOtherContacts =  $_POST['motherOtherContacts'];
                          $fatherOtherContacts = $_POST['fatherOtherContacts'];
                          $enrolleeGuardian = $_POST['enrolleeGuardian'];
                          $enrolleeSchoolServiceName = $_POST['enrolleeSchoolServiceName'];
                          $servicePlateNumber = $_POST['servicePlateNumber']; 
                          $servicePhoneNumber = $_POST['servicePhoneNumber'];
                          $enrolleePSANo = $_POST['enrolleePSANo'];
                          $enrolleeLRN =  $_POST['enrolleeLRN'];
                          $enrolleeCode = $_POST['enrolleeCode'];
                          $enrolleeRefNo = "Unknown";
                          $enrolleeNSO = "Unknown";
                          $enrollee137 = "Unknown";
                          $enrollee138 = "Unknown";
                          $enrolleeGMC ="Unknown";
                          $studentReferenceNo = $_POST['studentID'];

                     


                          $stmt = $dbconn->prepare('INSERT INTO enrollee(enrolledBy, studentID, gradeLevel, enrolledByEmailAddress, enrolledWhen, enrolleeLastName, enrolleeFirstName, enrolleeMiddleName, enrolleeGender, enrolleeAge, enrolleeBirthday, enrolleeBirthPlace, enrolleeHouseNo, enrolleeStreet, enrolleeBarangay, enrolleeMunicipality, enrolleeProvince, enrolleeCountry, enrolleeZipCode, enrolleeMotherName, enrolleeFatherName, enrolleeMotherPhone, enrolleeFatherPhone, motherOtherContacts, fatherOtherContacts, enrolleeGuardian, enrolleeSchoolServiceName, servicePlateNumber, servicePhoneNumber, enrolleePSANo, enrolleeLRN, enrolleeNSO, enrollee137, enrollee138, enrolleeGMC, agreedToTerms, enrolleeCode, enrolleeRefNo, isApproved, isPassed, enrollmentStatus, studentReferenceNo) VALUES (:enrolledBy, :studentID, :gradeLevel, :enrolledByEmailAddress, :enrolledWhen, :enrolleeLastName, :enrolleeFirstName, :enrolleeMiddleName, :enrolleeGender, :enrolleeAge, :enrolleeBirthday, :enrolleeBirthPlace, :enrolleeHouseNo, :enrolleeStreet, :enrolleeBarangay, :enrolleeMunicipality, :enrolleeProvince, :enrolleeCountry, :enrolleeZipCode, :enrolleeMotherName, :enrolleeFatherName, :enrolleeMotherPhone, :enrolleeFatherPhone, :motherOtherContacts, :fatherOtherContacts, :enrolleeGuardian, :enrolleeSchoolServiceName, :servicePlateNumber, :servicePhoneNumber, :enrolleePSANo, :enrolleeLRN, :enrolleeNSO, :enrollee137, :enrollee138, :enrolleeGMC, :agreedToTerms, :enrolleeCode, :enrolleeRefNo, :isApproved, :isPassed, :enrollmentStatus, :studentReferenceNo)');

                          $stmt->bindParam(':enrolledBy', $enrolledBy);
                          $stmt->bindParam(':studentID',  $studentID );
                          $stmt->bindParam(':gradeLevel', $gradeLevel);    
                          $stmt->bindParam(':enrolledByEmailAddress', $enrolledByEmailAddress);
                          $stmt->bindParam(':enrolledWhen', $enrolledWhen);
                          $stmt->bindParam(':enrolleeLastName', $enrolleeLastName);
                          $stmt->bindParam(':enrolleeFirstName', $enrolleeFirstName);
                          $stmt->bindParam(':enrolleeMiddleName', $enrolleeMiddleName);
                          $stmt->bindParam(':enrolleeGender', $enrolleeGender);
                          $stmt->bindParam(':enrolleeAge', $enrolleeAge);
                          $stmt->bindParam(':enrolleeBirthday', $enrolleeBirthday);
                          $stmt->bindParam(':enrolleeBirthPlace', $enrolleeBirthPlace); 
                          $stmt->bindParam(':enrolleeHouseNo', $enrolleeHouseNo); 
                          $stmt->bindParam(':enrolleeStreet', $enrolleeStreet);
                          $stmt->bindParam(':enrolleeBarangay', $enrolleeBarangay);
                          $stmt->bindParam(':enrolleeMunicipality', $enrolleeMunicipality);
                          $stmt->bindParam(':enrolleeProvince', $enrolleeProvince);
                          $stmt->bindParam(':enrolleeCountry', $enrolleeCountry);
                          $stmt->bindParam(':enrolleeZipCode', $enrolleeZipCode);
                          $stmt->bindParam(':enrolleeMotherName', $enrolleeMotherName);
                          $stmt->bindParam(':enrolleeFatherName', $enrolleeFatherName);
                          $stmt->bindParam(':enrolleeMotherPhone', $enrolleeMotherPhone);
                          $stmt->bindParam(':enrolleeFatherPhone', $enrolleeFatherPhone);
                          $stmt->bindParam(':motherOtherContacts', $motherOtherContacts);
                          $stmt->bindParam(':fatherOtherContacts', $fatherOtherContacts);
                          $stmt->bindParam(':enrolleeGuardian', $enrolleeGuardian);
                          $stmt->bindParam(':enrolleeSchoolServiceName', $enrolleeSchoolServiceName);
                          $stmt->bindParam(':servicePlateNumber', $servicePlateNumber); 
                          $stmt->bindParam(':servicePhoneNumber', $servicePhoneNumber);
                          $stmt->bindParam(':enrolleePSANo', $enrolleePSANo);
                          $stmt->bindParam(':enrolleeLRN', $enrolleeLRN);
                          $stmt->bindParam(':enrolleeNSO', $enrolleeNSO);
                          $stmt->bindParam(':enrollee137', $enrollee137);
                          $stmt->bindParam(':enrollee138', $enrollee138);
                          $stmt->bindParam(':enrolleeGMC', $enrolleeGMC);
                          $stmt->bindParam(':agreedToTerms', $agreement);
                          $stmt->bindParam(':enrolleeCode', $enrolleeCode);
                          $stmt->bindParam(':enrolleeRefNo', $enrolleeRefNo);
                          $stmt->bindParam(':isApproved', $isApproved);
                          $stmt->bindParam(':isPassed', $isPassed);
                          $stmt->bindParam(':enrollmentStatus', $enrollmentStatus);
                          $stmt->bindParam(':studentReferenceNo', $studentReferenceNo);

                          if ($stmt->execute()){
                          echo '<script type = "text/javascript"> alert("Record updated successfully");</script>';

                                  include_once "../PHPMailer/PHPMailer.php";
                                  include_once "../PHPMailer/Exception.php";
                                  include_once "../PHPMailer/SMTP.php";

                                  $email = $_SESSION['username'];

                                  $mail =  new PHPMailer\PHPMailer\PHPMailer();
                                  $mail->isSMTP();
                                  $mail->SMTPDebug = 0;
                                  $mail->Host = "smtp.gmail.com";
                                  $mail->Port = 587;
                                  $mail->SMTPSecure = 'tls';
                                  $mail->SMTPAuth = true;
                                  $mail->Username = 'mptercero@up.edu.ph';
                                  $mail->Password = 'seudriiwmozxuzdu';
                                  $mail->setFrom($mail->Username);
                                  $mail->addAddress($email);
                                  $mail->Subject = 'Enrollment Registration Confirmation';
                                  $message = "<p><b>Dear ".$name."</b>,</p>

                                  <p>Thank you for you interest enrolling to
                                  our school.</p>

                                  <p>Following are the information of your enrollment:</p>

                                  <p><b>Name: </b>".$enrolleeFirstName." ".$enrolleeLastName."<br>
                                  <b>Temporary Reference Number: </b>".$studentID."<br>
                                  <b>Grade Level: </b>".$gradeLevel."<br>
                                  <b>Address: </b>".$enrolleeHouseNo." ".$enrolleeStreet.", ".$enrolleeBarangay.", ".$enrolleeMunicipality.", ".$enrolleeProvince.", ".$enrolleeCountry." ".$enrolleeZipCode."<br> </p>

                                  <p><b>Please be informed that you will be contacted very soon for entrance exam by the school registrars office. Please take note of the date and time to make sure that you do not miss your appointment. Additionally, please secure the following documents and submite a certified true copy of the following: </b><br>

                                  - NSO Birth Certificate <br>
                                  - Form 137 <br>
                                  - Form 138 <br>
                                  - Certificate of Good Moral Character<br>

                                  </p>


                                  <p>School Admin</p>";

                                  $mail->msgHTML($message);
                                  $mail->AltBody = strip_tags($message);
                                         
                                  if ($mail->send()){
                                      echo "<p style = 'padding: 20px; color: green; background-color: white; margin-right: 300px; margin-left: 300px; border-radius: 5px;  background: rgba(255, 255, 255, 0.6); '>Enrollment Registration Successful! An email has been sent to your email as a receipt! <a href=/lcs/check-enroll-status.php>Click here to view status of enrollment. </a></p>";
                                        
                                    }
                                  else{
                                      $msg = "<p style = 'padding: 20px; color: red; background-color: white; margin-right: 700px; margin-left: 700px; border-radius: 5px;  background: rgba(255, 255, 255, 0.6); '>An error has occured!</p>";
                                      }

                          //call the FPDF library
                         

                          //A4 width : 219mm
                          //default margin : 10mm each side
                          //writable horizontal : 219-(10*2)=189mm

                          //create pdf object

                          } else {
                              echo '<script type = "text/javascript"> alert("There was an issue encountered!");</script>';
                          }


                            //echo '<script type = "text/javascript"> alert("Error updating record.");</script>';

                      }

?>