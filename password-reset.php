<?php

$msg="";
$emailaddress = strtolower($_POST['emailAddress']);

if (is_null($emailaddress)){
      $msg = "<p style = 'padding: 20px; color: green; font-weight: bold; margin-right: 15px; margin-left: 5px; border-radius: 5px; background:  background: rgba(255, 255, 255, 0.6);; '>An email entered is not found on the database!</p>";
  
  
}else{

            $con = new mysqli('localhost', 'root', 'Dont4GET', 'lcs');

            $sql = $con->query("SELECT email, name FROM users WHERE LOWER(email)='$emailaddress'");
            while($row = mysqli_fetch_array($sql)) {
                    $dbemailAddress=$row['email'];
                    $name=$row['name'];
                    $dbemailAddress2 = urlencode(base64_encode($dbemailAddress));

                    include_once "PHPMailer/PHPMailer.php";
                    include_once "PHPMailer/Exception.php";
                    include_once "PHPMailer/SMTP.php";

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
                    $mail->addAddress($dbemailAddress);
                    $mail->Subject = 'Password Reset Request';
                    $message = "<p><b>Dear ".$name."</b>,</p>

                    <p>Please click the link below to proceed with reseting your password</p>

                    <p><a href='http://tercerotaton.cf/lcs/password-reset-link.php?email=$dbemailAddress2'>Click Here ResetEmail Address</a></p>


                    <p>School Admin</p>";

                    $mail->msgHTML($message);
                    $mail->AltBody = strip_tags($message);
                   
                    if ($mail->send()){
                       $msg = "<p style = 'padding: 20px; color: green; font-weight: bold; margin-right: 15px; margin-left: 5px; border-radius: 5px; background:  background: rgba(255, 255, 255, 0.6);; '>Password Reset: A password reset link has been sent to your email!</p>";
                     }
                     else{

                      $msg = "<p style = 'padding: 20px; color: green; font-weight: bold; margin-right: 15px; margin-left: 5px; border-radius: 5px; background:  background: rgba(255, 255, 255, 0.6);; '>An email was not successfully sent!</p>";
                        break;
                          }
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
                </ul></li>

              </li>
          </ul>
        </nav>
      </div>
    </header>

   
    <section id="showcase">
      <div class="container">
        <form class="container" method ="post" action = "password-reset.php">
           <div class = "tuition-group">
              <div>
                <h2 align="center"> PASSWORD RESET PAGE</h2>
              </div>
              <div>
              <table align="center" id = "enrollmentStatusTable">

                
                 <tr bgcolor ="#E1F0F0" style="text-align:left">
                  <th colspan = 7 style="text-align:left">
                    
                    <form method="post" action="password-reset.php">
                       <?php echo $msg; ?>
                        Enter your email address to proceed with password reset:
                        <input type="text" placeholder="Email Address" name="emailAddress" required>
                        <input type="submit" name = "viewProfile" value = "Reset">
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