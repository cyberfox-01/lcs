<?php
  $msg = "";

  use PHPMailer\PHPMailer\PHPMailer;

  if (isset($_POST['submit'])) {
    $con = new mysqli('localhost', 'root', 'Dont4GET', 'lcs');

    $name = $con->real_escape_string($_POST['name']);
    $email = $con->real_escape_string($_POST['eaddress']);
    $psw = $con->real_escape_string($_POST['psw']);
    $psw2 = $con->real_escape_string($_POST['psw2']);
    $passwordLen = strlen($psw);


  

    if ($name == "" || $email == "" || $psw == "" || $psw2 == "" || $psw != $psw2 || $passwordLen < 8){
      $msg = "<p style = 'padding: 20px; color: red; align = left; background-color: white; margin-right: 400px; margin-left: 400px; border-radius: 5px;  background: rgba(255, 255, 255, 0.6); '><b>Error:</b> One of the following may have an issue. 
        <br> * One of the fields is empty.
        <br> * Password length did not meet the requirements.
        <br> * Password did not match!</p>";
    }
    else {
      $sql = $con->query("SELECT id FROM users WHERE email='$email'");
      if ($sql->num_rows > 0) {
        $msg = "<p style = 'padding: 20px; color: red; align = left; background-color: white; margin-right: 400px; margin-left: 400px; border-radius: 5px;  background: rgba(255, 255, 255, 0.6); '>Error: Email already exists in the database!</p>";
      } else {
        $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
        $token = str_shuffle($token);
        $token = substr($token, 0, 10);

        $hashedPassword = password_hash($psw, PASSWORD_BCRYPT);

        $con->query("INSERT INTO users (name,email,password,isEmailConfirmed,token)
          VALUES ('$name', '$email', '$hashedPassword', '0', '$token');
        ");

                include_once "PHPMailer/PHPMailer.php";
                include_once "PHPMailer/Exception.php";
                include_once "PHPMailer/SMTP.php";

                $mail = new PHPMailer();
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
                $mail->Subject = 'Confirm Your Account Registration';
                $message = "<p>Dear ".$name.",</p>

                <p>Thank you for registering to
                the LCS Online Enrollment System website.</p>

                <p><a href='http://tercerotaton.cf/lcs/confirm.php?email=$email&token=$token'>Click Here To Verify Email Address</a></p>


                <p>Admin</p>";

                $mail->msgHTML($message);
                $mail->AltBody = strip_tags($message);
                       
                if ($mail->send())
                    $msg = "<p style = 'padding: 20px; color: green; background-color: white; margin-right: 300px; margin-left: 300px; border-radius: 5px;  background: rgba(255, 255, 255, 0.6); '>Registration Successful! Please verify your account via your email address!</p>";
                else
                    $msg = "<p style = 'padding: 20px; color: red; background-color: white; margin-right: 300px; margin-left: 300px; border-radius: 5px;  background: rgba(255, 255, 255, 0.6); '>An error has occured!</p>";
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
          </ul>
        </nav>
      </div>
    </header>

    <section id="showcase">
      <div class="container">
        <h1><span class = "highlight">LCS</span> Online Enrollment System</h1>
        <p>Welcome to the official Enrollment System of Lucban Christian School. Please sign up to continue.</p>

         <?php if ($msg != "") echo $msg; ?>


        <form class="container" method ="post" action = "signup.php">
           <div class = "input-group">
           <p><b>Sign Up</b></p>
          
          </div>  

          <div class = "input-group">

            <label><b>First Name:</b></label>
            <input type="text" placeholder="First Name, Last Name" name="name" required>

          </div>

           <div class = "input-group">
            <label><b>E-mail Address:</b></label>
            <input type="text" placeholder="Enter Email Address" name="eaddress" required>
          </div>

          <div class = "input-group">
            <label><b>Password: </b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
          </div>

          <div class = "input-group">
            <label><b>Confirm Password:</b></label>
            <input type="password" placeholder="Confirm Password" name="psw2" required>
          </div>
          
          <div class = "input-group">
            <button class="button_1" type="submit" name="submit" >Sign Up</button>
          </div>     
          <div class = "input-group">
            <label for="uname"><b>Already have an account? <a href="login.php">Sign in</a></b></label>
          </div>      
      </form>
      </div>
      
      
      

    </section>

    
    

    <footer>
      <p>Lucban Christian School, Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
