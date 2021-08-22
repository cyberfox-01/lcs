<?php
include_once 'resource/session.php';

  $msg = "";

  if (isset($_POST['submit'])) {
    $con = new mysqli('localhost', 'root', 'Dont4GET', 'lcs');

    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);

    if ($email == "" || $password == "")
      $msg = "Either email address box or password field is empty!";
    else {
      $sql = $con->query("SELECT id, password, isEmailConfirmed FROM users WHERE LOWER(email)='$email'");
      if ($sql->num_rows > 0) {
                $data = $sql->fetch_array();
                echo $data['password'];
                if (password_verify($password, $data['password'])) {
                    if ($data['isEmailConfirmed'] == 0)
                      $msg = "Please verify your email!";
                    else {
                      $_SESSION['id'] = $data['id'];
                      $_SESSION['username'] = $email;
                      $msg = "You have been logged in!";
                      header("Location: home.php"); 
                    }
                } else
                  $msg = "Please verify username or password!";
      } else {
        $msg = "Please check your inputs!";
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
        <p>Welcome to the official Enrollment System of Lucban Christian School. Please log in to continue.</p>
        <form class="container" method ="post" action = "login.php">
          <div class = "input-group">

            <?php if ($msg != "") echo $msg . "<br><br>" ?>

            <label for="email"><b>Email Address:</b></label>
            <input type="text" placeholder="Enter Username" name="email" required>

          </div>
          <div class = "input-group">
            <label for="password"><b>Password: </b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
          </div>
           
          <div class = "input-group">
            <button class="button_1" type="submit" name="submit">Log In</button>
          </div> 
          <div class = "input-group">
               <label><b>No Account Yet? <a href ="signup.php">Click Here</a></b></label>
               <label><b>Forgot Password? <a href ="password-reset.php">Click Here</a></b></label>
          </div>                  
      </form>
      </div>
      
      
      

    </section>

    
    

    <footer>
      <p>Lucban Christian School, Copyright &copy; 2019</p>
    </footer>
  </body>
</html>
