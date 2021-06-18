
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>index</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/explorehome.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/navstyle.css">
    <link rel="stylesheet" href="assets/css/promostyle.css">
    <link rel="stylesheet" href="assets/css/structure.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<script src="jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <!-- SweetAlert2 -->
<script type="text/javascript" src='../files/bower_components/sweetalert/js/sweetalert2.all.min.js'> </script>
<!-- SweetAlert2 -->
<link rel="stylesheet" href='../files/bower_components/sweetalert/css/sweetalert2.min.css' media="screen" />
	
<style>
/* Style all input fields */

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
<script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>

	
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-md fixed-top bg-white" id="navigation" style="background-color: rgba(255,255,255,0);padding: 0px;padding-right: 5px;">
            <div class="container-fluid"><img class="img-fluid" src="assets/img/logo.png" style="margin: 13px;"><a class="navbar-brand" style="color: rgb(255,255,255);">Res Management System</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" style="background-color: #ffffff;margin: 16px;margin-right: 12px;"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon" style="color: rgba(255,255,255,0.5);background-color: #ffffff;"></span></button>
                <div
                    class="collapse navbar-collapse text-justify" id="navcol-1" style="padding: 0px;padding-right: 0px;padding-left: 6px;">
                    <ul class="nav navbar-nav ml-auto" id="nav-links">
                        <li class="nav-item" role="presentation" id="link"><a class="nav-link active" href="index.php" style="color: rgb(255,255,255);">Home</a></li>
                       <li class="nav-item dropdown" id="link"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#" style="color: #ffffff;">Academic Support</a>
                            <div class="dropdown-menu" role="menu">
                                <h6 class="dropdown-header" role="presentation">Structures</h6><a class="dropdown-item" role="presentation" href="mentors.php">Residence Mentors</a><a class="dropdown-item" role="presentation" href="resCom.php">Residence Committee</a><a class="dropdown-item" role="presentation" href="labSchedule.php">Lab Schedule</a>
                               
                        </li>
                        <li class="nav-item" role="presentation" id="link"><a class="nav-link active" href="complain.php" style="color: rgb(255,255,255);">Complaints</a></li>
						
                        <li class="nav-item" role="presentation" id="link"><a class="nav-link active" href="profile.php" style="color: rgb(255,255,255);">Profile</a></li>

						<?php
							if(strlen($_SESSION["login"])==0)
							{
                        		echo '<li class="nav-item" role="presentation"><a class="nav-link active" href="#"><button class="btn btn-outline-primary" data-toggle="modal" data-target="#signin" type="button">Log In</button></a></li>
								<li class="nav-item" role="presentation"><a class="nav-link active" href="#"><button class="btn btn-primary" data-toggle="modal" data-target="#signup" type="button">Sign Up</button></a></li>
								';
						
							}else
							{
								echo '<li class="nav-item" role="presentation"><a class="nav-link active" href="logout.php"><button class="btn btn-outline-primary" data-toggle="modal" data-target="#" type="button">Logout</button></a></li>';
							}
							
						?>
						
                        
                    </ul>
            </div>
    </div>
    </nav>
    <div class="modal fade" role="dialog" tabindex="-1" id="signin">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sign In</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-envelope-o"></i></span></div><input class="form-control" name="uemail" type="email" required="" placeholder="Student Email">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-lock"></i></span></div><input class="form-control" name="password1" type="password" required="" placeholder="Password">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        
						<input type="submit" name="submit" value="submit">
						<?php
						if(isset($_POST['submit']))
{
							$password=$_POST['password1'];
							$dec_password=md5($password);
							$useremail=$_POST['uemail'];
							$ret= mysqli_query($con,"SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
							$num=mysqli_fetch_array($ret);
							$find = $num['stdNum']; 

							if($num>0)
							{

								$sel = "SELECT * FROM student_records WHERE stdNum =$find ";
								$quiry = mysqli_query($con,$sel);
								$line=mysqli_fetch_array($quiry);

								$extra="index.php";
								$_SESSION['login']=$_POST['uemail'];
								$_SESSION['name']=$line['name'];
								$_SESSION['SName']=$line['SName'];
								$_SESSION['stdNum']=$line['stdNum'];
								$_SESSION['gender']=$line['gender'];

								//$host=$_SERVER['HTTP_HOST'];
								//$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
								header("location:extra");
								exit();
							}
							else
							{
							echo "<script>alert('Invalid username or password');</script>";
							$extra="index.php";
							$host  = $_SERVER['HTTP_HOST'];
							$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
							//header("location:http://$host$uri/$extra");
							//header("location:$extra");
							//echo "<a href='index.php'></a>";
							exit();
							}
}
					?>
                    </form>
                    <hr style="background-color: #bababa;">
                    <p class="text-center">Or&nbsp;<a class="text-decoration-none"  data-dismiss="modal" data-toggle="modal" data-target="#password"href="#" >Forgot password</a></p>
                    <p class="text-center">Don't have an account? &nbsp;<a class="text-decoration-none" data-dismiss="modal" data-toggle="modal" data-target="#signup" href="#">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
		
		
	<div class="modal fade" role="dialog" tabindex="-1" id="password">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Forgot Password</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-envelope-o"></i></span></div><input class="form-control" name="femail" type="email" required="" placeholder="Student Email">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <!--<div class="form-group"><button class="btn btn-primary btn-lg text-white" style="width: 100%;" type="button">Log in</button></div>-->
						<div class="form-group" class="btn btn-primary btn-lg text-white" style="width: 100%;" type="button">
						<input type="submit" name="send" value="send">
							</div>
					<?php
						//Code for Forgot Password

							if(isset($_POST['send']))
							{
							$row1=mysqli_query($con,"select email,password from users where email='".$_POST['femail']."'");
							$row2=mysqli_fetch_array($row1);
							if($row2>0)
							{
							$email = $row2['email'];
							$subject = "Information about your password";
							$password=$row2['password'];
							$message = "Your password is ".$password;
							mail($email, $subject, $message, "From: $email");
							echo  "<script>alert('Your Password has been sent Successfully');</script>";
							}
							else
							{
							echo "<script>alert('Email not register with us');</script>";	
							}
							}
						
						?>
                    </form>
                    <hr style="background-color: #bababa;">
                    <p class="text-center">Or&nbsp;<a class="text-decoration-none" href="#" data-target="#password">Forgot password</a></p>
                    <p class="text-center">Don't have an account? &nbsp;<a class="text-decoration-none" data-dismiss="modal" data-toggle="modal" data-target="#signup" href="#">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>	
		
		
		
		
		
		
		
		
		
		
		
	
    <div class="modal fade" role="dialog" tabindex="-1" id="signup">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sign Up Now</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <form class="mt-4" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-user-o"></i></span></div><input type="text" class="form-control" name="stdNum"  minlenght="9" maxlength="9" required placeholder="Student Number">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="far fa-envelope"></i></span></div><input class="form-control" name="email" type="text" required placeholder="Student Email">
                                <div class="input-group-append"></div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-lock"></i></span></div><input class="form-control" id="password" name="password" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"   title="Must contain at least 1 number and 1 uppercase and lowercase letter, and at least 8 or more characters" required  placeholder="Password">
                                <div class="input-group-append"></div>
                            </div>
							
							<div id="message">
							  <h3>Password must contain the following:</h3>
							  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
							  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
							  <p id="number" class="invalid">A <b>number</b></p>
							  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
							</div>
                        </div>
						
						<div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-mobile-phone"></i></span></div>
								<input class="form-control" type="text" value="" name="contact" minlenght="10" maxlength="10" required placeholder="Cellphone No.">
							</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check"><input class="form-check-input" name="agree" type="checkbox" id="formCheck-1" required><label class="form-check-label" for="formCheck-1">I agree all the terms and conditions.</label></div>
                        </div>
                        <!--<div class="form-group"><input type="button" name="submit" class="btn btn-primary btn-lg text-white" style="width: 100%;" value="submit"></div>-->
						<input type="submit" name="signup" value="signup">
						<?php
							if(isset($_POST['signup']))
							{
								$stdNum = $_POST['stdNum'];
								$email=$_POST['email'];
								$password=$_POST['password'];
								$contact=$_POST['contact'];
								$enc_password=md5($password);
								$a=date('Y-m-d');
								
								if(!filter_var($email,FILTER_VALIDATE_EMAIL))
								{
									echo "<script>alert('INCORRECT EMAIL FORMAT');</script>";
								}
								else
								{
									if(substr($stdNum,1,3)>221)
									{
										echo "<script>alert('INCORRECT STUDENT NUMBER');</script>";

									}
									else
									{

										$msg=mysqli_query($con,"insert into users(stdNum, email,password,contactno,posting_date) values('$stdNum','$email','$enc_password','$contact','$a')");
											if($msg)
											{
												echo "<script>alert('Register successfully');</script>";
												echo'<a class="text-decoration-none" data-dismiss="modal" data-toggle="modal" data-target="#signin" href="#">';
											}
										else
										{
											echo "<script>alert('NOT A REGISTERED STUDENT');</script>";
										}
									}

								}

							}
					?>
                    </form>
					
					
                    <hr style="background-color: #bababa;">
                    <p class="text-center">Already have an Account?&nbsp;<a class="text-decoration-none" data-dismiss="modal" data-toggle="modal" data-target="#signin" href="#">Log In</a></p>
                </div>
			
			
            </div>
        </div>
    </div>
    </div>