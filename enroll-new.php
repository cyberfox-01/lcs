
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
	  <meta name="keywords" content="web design, affordable web design, professional web design">
  	<meta name="author" content="Marlon Tercero">
    <title>Lucban Christian School | Welcome</title>
    <link rel="icon" type="image/gif/png" href="./img/lcs_logo.png"/>
    <link rel="stylesheet" href="./css/style-form.css">
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
    <script>
        function enrolleeStatus(data) { 
              var uid = Math.random()*100000000000000000;
              document.getElementById("studentID").value = data+"-"+uid;
                
        }
    </script>

    <section id="showcase">
      <div class="container">
          <h2><span class = "highlight">Application for Enrollment Form</h2>
        
      </div>
      
        <section id="boxes">
          <form class="container" method ="post" action = "/lcs/includes/enroll.php">
            <table style="width:100%">
              <tr>
                <th colspan="7">
                  <p>STUDENT'S PERSONAL RECORD (Fill up this form legibly and clearly)</p>
                </th>
              </tr>

              <tr>
                <td>
                  <div class = "input-group-short">
                    <label for="newEnrollee"><b>Enrollee Status:</b></label>
                    <select  onchange="enrolleeStatus(this.value)" name = "enrolleeCode"> 
                        <option value="">-----------</option> 
                        <option value="NS">New Student</option> 
                        <option value="TR">Transferee</option> 
                    </select>

                  </div>
                </td>


                <td><div class = "input-group-signup">
                    <label for="refNumber"><b>Temporary Student Number:</b></label>
                    <input type="text" name="studentID" id="studentID" value = " " required>
                  </div>
                </td>
                 <td><div class = "input-group-short">
                    <label for="gradeLevel"><b>Grade Level:</b></label>
                    <select  onchange="" name = "gradeLevel"> 
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
                  </div>
                </td>
      
              </tr>

              <tr>
                <td>
                  <div class = "input-group-signup">
                    <label for="lname"><b>Last Name:</b></label>
                    <input type="text" placeholder="Enter Last Name" name="enrolleeLastName" required>
                  </div>
                </td>


                <td><div class = "input-group-signup">
                    <label for="fname"><b>First Name:</b></label>
                    <input type="text" placeholder="Enter first name" name="enrolleeFirstName" required>
                  </div>
                </td>
                
                <td>
                  <div class = "input-group-signup">
                    <label for="mname"><b>Middle Name:</b></label>
                    <input type="text" placeholder="Enter middle name" name="enrolleeMiddleName" required>
                  </div>
                </td>
                
              </tr>
              <tr>
                <td>
                  <div class = "input-group-short">
                    <label for="gender"><b>Gender:</b></label>
                    <select name="enrolleeGender"> 
                        <option value=" "> </option> 
                        <option value="Male">Male</option> 
                        <option value="Female">Female</option> 
                    </select> 
                  </div>
                </td>
                 <td>
                  <div class = "input-group-short">
                    <label for="age"><b>Age:</b></label>
                    <select name="enrolleeAge">
                        <?php 
                        for($i=4; $i<=60; $i++)
                         {
                          ?>
                         <option value="<?php echo $i;?>"><?php echo $i;?></option>
                        <?php
                            }
                            ?> 
                          
                    </select> 
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                    <div class = "input-group-bdate">
                      <label for="Birthdate"><b>Birthdate:</b></label>
                      <input type="date" placeholder="Birthdate" name="enrolleeBirthday" required>
                    </div>
                </td>
                <td>
                    <div class = "input-group-bplace">
                      <label for="birthplace"><b>Birth Place:</b></label>
                      <input type="text" placeholder="Town/City, Province" name="enrolleeBirthPlace" required>
                    </div>
                </td>
              </tr>
              <tr>
                <td>
                    <div class = "input-group-home">
                      <label for="homeaddress"><b>Home Address:</b></label>
                    </div>
                </td>                
              </tr>
              <tr>
                <td>
                    <div class = "input-group-homeaddress">
                      <input type="text" placeholder="House Number" name="enrolleeHouseNo">
                      <label for="housenumber"><i>House Number<i></label>
                    </div>
                </td>
                <td>
                    <div class = "input-group-homeaddress">
                      <input type="text" placeholder="Street/Subdivision" name="enrolleeStreet" required>
                      <label for="street"><i>Street/Subdivision<i></label>
                    </div>
                </td>
                <td>
                    <div class = "input-group-homeaddress">
                      <input type="text" placeholder="Barangay" name="enrolleeBarangay" required>
                      <label for="barangay"><i>Barangay<i></label>
                    </div>
                </td>
                
              </tr>
              <tr>
                <td>
                    <div class = "input-group-homeaddress_2">
                      <input type="text" placeholder="City/Municipality" name="enrolleeMunicipality" required>
                      <label for="city"><i>City/Municipality<i></label>
                    </div>
                </td>
                <td>
                    <div class = "input-group-homeaddress_2">
                      <input type="text" placeholder="Province" name="enrolleeProvince" required>
                      <label for="Province"><i>Province<i></label>
                    </div>
                </td>
                <td>
                    <div class = "input-group-homeaddress_2">
                      <input type="text" placeholder="Country" name="enrolleeCountry" required>
                      <label for="Country"><i>Country<i></label>
                    </div>
                </td>
                 <td>
                    <div class = "input-group-homeaddress_2">
                      <input type="text" placeholder="Zipcode" name="enrolleeZipCode" required>
                      <label for="Zipcode"><i>Zipcode<i></label>
                    </div>
                </td>
                
              </tr>
              <tr>
                <td>
                  <div class = "input-group-parentinfo_2">
                      <p>Parent/Guardian Information </p>
                  </div>
                </td>
              </tr>

              <tr>
                <td colspan = 2>
                    <div class = "input-group-parentinfo">
                      <label for="mother"><i>Mother's Name<i></label>
                      <input type="text" placeholder="Mother's Name" name="enrolleeMotherName" required>
                    </div>
                </td>
                <td colspan = 2>
                    <div class = "input-group-parentinfo">
                      <label for="father"><i>Father's Name<i></label>
                      <input type="text" placeholder="Father's Name" name="enrolleeFatherName" required>
                    </div>
                </td>
                
              </tr>

              <tr>
                <td colspan = 2>
                    <div class = "input-group-parentinfo">
                      <label for="mother_phone"><i>Mother's Work Phone:<i></label>
                      <input type="text" placeholder="Mother's Work Phone" name="motherOtherContacts">
                    </div>
                </td>
                <td colspan = 2>
                    <div class = "input-group-parentinfo">
                      <label for="father_phone"><i>Father's Work Phone:<i></label>
                      <input type="text" placeholder="Father's Work Phone" name="fatherOtherContacts">
                    </div>
                </td>
                
              </tr>
              <tr>
                <td colspan = 2>
                    <div class = "input-group-parentinfo">
                      <label for="personal_phone"><i>Contact Numbers:<i></label>
                      <input type="text" placeholder="Mother's Personal Phone Number" name="enrolleeMotherPhone" required>
                    </div>
                </td>
                <td colspan = 2>
                    <div class = "input-group-parentinfo">
                      <label for="personal_phone1"><i>Contact Numbers:<i></label>
                      <input type="text" placeholder="Father's Personal Phone Number" name="enrolleeFatherPhone" required>
                    </div>
                </td>
                
              </tr>

              <tr>
                <td colspan = 5>
                    <div class = "input-group-parentinfo">
                      <label for="guardian"><i>Gurdian/s:<i></label>
                      <input type="text" placeholder="Gurdian/s" name="enrolleeGuardian">
                    </div>
                </td>
                
              </tr>


              <tr>
                <td colspan = 2>
                    <div class = "input-group-parentinfo">
                      <label for="school_service_name"><i>School Service Name:<i></label>
                      <input type="text" placeholder="School Service Name" name="enrolleeSchoolServiceName">
                    </div>
                </td>
                <td>
                    <div class = "input-group-parentinfo">
                      <label for="plate_number"><i>Plate Number:<i></label>
                      <input type="text" placeholder="Plate Number" name="servicePlateNumber">
                    </div>
                </td>
                <td colspan = 2>
                    <div class = "input-group-parentinfo">
                      <label for="service_phone_number"><i>Service's Phone Number:<i></label>
                      <input type="tel" placeholder="Service Phone Number" name="servicePhoneNumber">
                    </div>
                </td>
                
              </tr>
              <tr>
                <td>
                  <div class = "input-group-reference">
                    <label for="psa_number">Files and Documents</label>

                  </div>
                </td>
              </tr>
               <tr>
                <td colspan = 5>
                    <div class = "input-group-parentinfo">
                      <label for="psa_number"><i>PSA Birth Certificate Number:<i></label>
                      <input type="text" placeholder="PSA Birth Certificate Number" name="enrolleePSANo" required>
                    </div>
                </td>
                
              </tr>

              </tr>
               <tr>
                <td colspan = 5>
                    <div class = "input-group-parentinfo">
                      <label for="lrn_number"><i>Learner's Reference Number (LRN):<i></label>
                      <input type="text" placeholder="Learner's Reference Number" name="enrolleeLRN" required>
                    </div>
                </td>
                
              </tr>


     
              <tr>
                <td colspan = 5>
                  <div class = "input-group-agreement">

                    <p>Thank you for reaffirming your confidence in our school to assist you in providing Christian Quality Education for your child/children. Our commitment is to work with the hone but not to assume responsibilities, which rightfully belong to the parents. Because of our ministry to homes, all children from the same family, re expected to attend the shool.</p>
                  </div>
                </td>
              </tr>

              <tr>
                <td colspan = 5>
                  <div class = "input-group-agreement">

                    <label for="agreement">
                      <h1> School's Agreement</h1>

                      <p>I understand that the school is an integral part of a child training of which I am expected to fully support.</p> <br>

                      <p>I hereby accept the school policies in paying my financial obligations in support of the school.</p><br>

                      <p>I understand that my child is expected to take part in Sunday School and other school activities, including Physical Education and sponsored trips away from the educational facility and I absolve the school from the liability to me or my child becauses of injury to my child properly supervised school ativities. I agree also with the insurance policy at my child while he/she is enrolled at LCS.</p><br>

                      <p>I agree to uphold and support high academic standards of the school providing a place at home for my hild to study and by cooperating and encouraging my child in the completion of my homework or assignments. I also aggree to attend and participate in all meetings and conferences like regular parent-teacher conferences, parents' orientation, quarterly report meetings, consultations and the likes.</p><br>

                      <p>I appreciate the standards of the school and will not do any action showing profanity and obscenity that will dishoner the Word of God , or disprespect the staff of the school. I hereby agree to the support regulations discussed in the school handbook in the applicant's behalf and authorize the school to employ discipline, as it deems wise and expedient for the training of my child.</p><br>

                      <p>I understand that the school reserves the right, after parental conference, to dismiss my child, should he/she fails to comply to established regulations and discipline or whose parents do not assume reponsibilities to the school.</p><br>

                      <div class = "agree" required><input type="checkbox"><p>I have read this school policy, understood and agreed to the terms stated in this application.</p>
                      </div><br>
                    </label>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <div class = "input-group-upload">
                    <input type="submit" name = "enroll" value = "Submit to Enroll">
                  </div>
                </td>

              </tr>

            </table>
             
          </form>
        </section>
    
      

    </section>


    


    <footer>
      <p>Lucban Christian School, Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
