<?php

include_once 'resource/db.php';

$msg="";

$email = $_GET['email'];
$decodeEmail = strtolower(base64_decode(urldecode($email)));




 
if(isset($_POST['reset'])){
   $con = new mysqli('localhost', 'root', 'Dont4GET', 'lcs');

    $psw = $con->real_escape_string($_POST['password']);
    $psw2 = $con->real_escape_string($_POST['password2']);
    $passwordLen = strlen($psw);


if ($psw == "" || $psw2 == "" || $psw != $psw2 || $passwordLen < 8){
      $msg = "<p style = 'padding: 20px; color: red; align = left; background-color: white; margin-right: 400px; margin-left: 400px; border-radius: 5px;  background: rgba(255, 255, 255, 0.6); '><b>Error:</b> One of the following may have an issue. 
        <br> * One of the fields is empty.
        <br> * Password length did not meet the requirements.
        <br> * Password did not match!</p>";
    }else {
      
        $hashedPassword = password_hash($psw, PASSWORD_BCRYPT);
        $sql = "UPDATE users SET password='$hashedPassword' WHERE LOWER(email)='$decodeEmail'";
        if (mysqli_query($con, $sql)){
          $msg = "<p style = 'padding: 20px; color: red; align = left; background-color: white; margin-right: 400px; margin-left: 400px; border-radius: 5px;  background: rgba(255, 255, 255, 0.6); '>Password updated successfully <a href=login.php>Log in</a></p>";

        }else{
          $msg = "<p style = 'padding: 20px; color: red; align = left; background-color: white; margin-right: 400px; margin-left: 400px; border-radius: 5px;  background: rgba(255, 255, 255, 0.6); '>Error</p>" . mysqli_error($con);

        }
        mysqli_close($con);

               
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
            <li class="current"><a href="home-admin.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="services.php">Services</a>
                <ul class="sub-menu">
                  <li><a href="tuition-admin-view.php">Manage Tuition Fees</a></li>
                  <li><a href="add-student-payment.php">Update Student Payment</a></li>
                  <li><a href="add-announcements.php">Add Annoucement</a></li>
                  <li><a href="process-enrollment-new.php">Process Enrollment: New/Transferee Students</a></li>
                  <li><a href="process-enrollment-old.php">Process Enrollment: Old Students</a></li>
                  <li><a href="data-insights-for-enrollments.php">View Enrollment Data Insights</a></li>
                </ul></li>

              </li>
              <li><a href="logout.php">Log Out</a><?php  echo ' '.$username  ?></li>

  
          </ul>
        </nav>
      </div>
    </header>

   
    <section id="showcase">
      <div class="container">
        <form class="container" method ="post" action = "">
           <div class = "tuition-group">
              <div>
                <h2 align="center"> PASSWORD RESET PAGE</h2>
              </div>
              <div>
              <table align="center" id = "enrollmentStatusTable">

                
                 <tr bgcolor ="#E1F0F0" style="text-align:left">
                  <th colspan = 7 style="text-align:left">
                    
                    <form method="post" action="password-reset-link.php">
                       <?php echo $msg; ?>
                       <tr>
                        <td align="right">New Password:</td>
                         <td align="left"><input type="password" placeholder="New Password" name="password" align="left" required>  </td>

                      </tr>
                      <tr>
                        <td align="right">Confirm New Password:</td>
                        <td align="left"><input type="password" placeholder="Confirm Newe Password" name="password2" align="left" required></td>

                      </tr>
                       <tr>
                         <td><input type="submit" name = "reset" value = "Reset"></td>

                      </tr>
                        

                    </form>
                  </th>
                </tr>
              
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