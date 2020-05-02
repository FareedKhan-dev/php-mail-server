<?php include('header.php') ?>

<?php
if (filter_has_var(INPUT_POST, 'submit')) {
  $name  = htmlentities(trim(($_POST['name'])));
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  if ($name !== "" and $email !== "") {
    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name) == true) {
      echo "<p class = 'text-center container alert alert-danger' >Please enter your name without any special characters!</p>";
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
      echo "<p class = 'text-center container alert alert-danger' >$email, is not a valid mail.</p>";
    }

    if ((preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $name) == false) and (filter_var($email, FILTER_VALIDATE_EMAIL) == true)) {
      function random_password_generate($length)
      {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-=+?";
        $ID = substr(str_shuffle($chars), 0, $length);
        return $ID;
      }
      $ID = random_password_generate(8);

      $to_email = "$email";
      $subject = 'ID GENERATED MESSAGE FROM FAREED KHAN';
      $message = '<h2>ID created for '. $name.'</h2> <hr>;
        <p><strong>Name: </strong>'.$name.'</p>
        <p><strong>Email: </strong>'.$email.'</p>
        <p><strong>Your ID: </strong>'.$ID.'</p>';
      // Always set content-type when sending HTML email
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= "From: noreply@company.com". "\r\n";

      if (mail($to_email, $subject, $message , $headers)) {
        echo "<p class = 'text-center container alert alert-success' >$name, Your ID has been Created Successfully. Checkout your gmail!</p>";
      } else {
        echo "<p class = 'text-center container alert alert-success' >Email sending failed. Please try again!</p>";
      }

    }
  } else {
    echo "<p class = 'text-center container alert alert-danger' >Please fill all inputs.</p>";
  }
}
?>

<div class="container-xl text-center jumbotron">
  <h1>FIND YOUR INFORMATION</h1>
  <hr>
  <p>Find information related to your client or server.</p>
  <p>Project is created on php and the UI of website is created with the help of bootstrapCDN.</p>
  <a class="btn btn-primary" href="server.php" role="button">About Server</a>
  <a class="btn btn-primary" href="client.php" role="button">About Client</a>
</div>



<div class="container-xl jumbotron text-center">
  <h1>RECEIVE MAIL ABOUT ID CONFIRMATION</h1>
  <hr>
  <p>A message will be send to your email after you create an ID here.</p>
  <p>Project is created on php and the UI of website is created with the help of bootstrapCDN.</p> <br>
  <form action="" method="POST" class=" form-inline justify-content-center">
    <div class="form-group">

    </div>
    <div class="form-group mx-2">
      <input type="email" pattern=".+@gmail.com" placeholder="Enter email" name="email" required class="form-control" id="exampleInputEmail1" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Confirm identity</button>
  </form>

</div>

</body>

</html>