<?php
session_start();

include("checklogin.php");

check_login();
require_once('dbconnection.php');

if(isset($_POST['update']))
{
	
	$stdNum=$_POST['stdNum'];
	$email = $_POST['email'];
	$password = $_POST['password']; 
	$contact=$_POST['contact'];
	$date = $_POST['date'];
	
	mysqli_query($con,"UPDATE users SET stdNum='$stdNum', email='$email' , contactno='$contact', posting_date = '$date' where email = '".$_SESSION['login']."' ");
	$_SESSION['msg']="Profile Updated successfully";
}
include("nav.php");

?>




    
    </div>
    <div id="promodiv" class="promodiv">
        <div class="jumbotron" id="promo" style="margin-bottom: 0px;">
            <h1 id="promoHeading"><?php
								echo $_SESSION['name']." ".$_SESSION['SName'];
							
							?><br>Welcome to your Tshwane Universty Of Technology Residence System Profile</h1>
            <p></p>
            <p><a class="btn btn-primary" role="button">Learn more</a></p>
        </div>
    </div>
 
 
	    <div id="explore">
        <div class="container">
            <h1 align="center">STUDENT DETAILS</h1>
            <div class="row">
				
				
				
				
				
				
				<?php $ret=mysqli_query($con,"select * from users a, student_records b WHERE a.stdNum = b.stdNum AND   email='".$_SESSION['login']."'");
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><?php echo $row['name'];?>'s Information</h3>
             	
				<div class="row">
					<form method="post">
					
						<div class="form-group">
						 <label>Student Number</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-angle-right"></i></span></div>
								
								
								 <input type="text" class="form-control" name="stdNum" value="<?php echo $row['stdNum'];?>"  readonly>
								
								
                                <div class="input-group-append"></div>
                            </div>
                        </div>
						
					
                        <div class="form-group">
						<label>Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-angle-right"></i></span></div>
								
								 <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" readonly>
								
								
                                <div class="input-group-append"></div>
                            </div>
                        </div>
						
						 <div class="form-group">
						 <label>Surname</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"> <i class="fa fa-angle-right"></i></span></div>
								<input type="text" class="form-control" name="SName" value="<?php echo $row['SName'];?>" readonly >
								
								
                                <div class="input-group-append"></div>
                            </div>
                        </div>
						
						
						 <div class="form-group">
						 <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-envelope-o"></i></span></div>
								
								
								<input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>"  >
								
								
                                <div class="input-group-append"></div>
                            </div>
                        </div>
						
						
						<div class="form-group">
						<label>Contacts</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-angle-right"></i></span></div>

								 <input type="text" class="form-control" name="contact" value="<?php echo '0'. $row['contactno'];?>"  minlenght="9" maxlength="9">
								
								
                                <div class="input-group-append"></div>
                            </div>
                        </div>
						
						
						<div class="form-group">
						 <label>Profile date</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-angle-right"></i></span></div>
								
								
								 <input type="date" class="form-control" name="date" value="<?php echo $row['posting_date'];?>" readonly >
								
								
                                <div class="input-group-append"></div>
                            </div>
                        </div>
						
						<div class="form-group">
						 <label>Room Number</label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-angle-right"></i></span></div>
								
								
								 <input type="text" class="form-control" name="text" value="
<?php
																																														$res = $_SESSION['gender'].'res';
$search ="select roomNum from ".$res." WHERE stdNum ='".$_SESSION['stdNum']."'";
$searchQuery = mysqli_query($con,$search);
$find = mysqli_fetch_array($searchQuery);
	if(!empty($find['roomNum']))
	   {
		  echo  $find['roomNum'];
	   }else{
			echo "No room allocated";
	}

?>
																							" readonly >
								
								
                                <div class="input-group-append"></div>
                            </div>
                        </div>
						
						<?php
																																																	$res = $_SESSION['gender'].'res';
$search ="select roomNum from ".$res." WHERE stdNum ='".$_SESSION['stdNum']."'";
$searchQuery = mysqli_query($con,$search);
$find = mysqli_fetch_array($searchQuery);
	if(empty($find['roomNum']))
	   {
		 echo"<label>Apply For Residence</label>";

		echo'<input type="submit" name="apply" value="apply">';
	   }

?>
						
						 
								
<label>Update Profile details</label><br>

	<input type="submit" name="update" value="Update">					
						 
						 


						
					
                       
						
                         
                          
                        
                    </form>
                  
	                  
                  
        <?php } ?>
				
				
				
					<?php
						
						if(isset($_POST['apply']))
						{
							$num = 0;
							$totalMarks = 0;
							
							$sel = "select * from student_marks WHERE stdNum= '".$_SESSION['stdNum']."'";
							$ret = mysqli_query($con,$sel);

							while($line=mysqli_fetch_array($ret))
							{
								$totalMarks = $totalMarks + $line['mark'];
								$num = $num +1;
							}
							
							$sele = "select * from student_records WHERE stdNum= '".$_SESSION['stdNum']."'";
							$test = mysqli_query($con,$sele);

							$lines=mysqli_fetch_array($test);
							
							
							if(($totalMarks /$num) >= 50 || $lines['yearStudy'] == "First_year")
							{
						
							$countM =1;
							$countF =1;
							$resAdmin = "Thabiso";
							$studentName=$_SESSION['name'];
							$surname=$_SESSION['SName'];
							$stdNum=$_SESSION['stdNum'];
							
							$resName= "Mnisi Village";	
							$gender = "male";	
								
								if($_SESSION['gender'] == "male")
								{
									$resSize=0;
									$resNo ="select roomNum from maleres ";
									$resQuery = mysqli_query($con,$resNo);
									while($resline = mysqli_fetch_array($resQuery))
									{
											$looki = $resline['roomNum'];
											$resSize++;
									}
									
									if($resSize <1)
									{
										$size = 0;
										$roomNum="W2-G0".$countM ;
										$search ="select roomNum from maleres WHERE roomNum = '$roomNum'";
										$searchQuery = mysqli_query($con,$search);
										while($find = mysqli_fetch_array($searchQuery))
										{
											$look = $find['roomNum'];
											$size++;
										}
										if($size==0 ||$size==1)
											{

												$insert="insert into maleres(resAdmin,name,surname,stdNum,roomNum,resName) VALUES('$resAdmin','$studentName','$surname','$stdNum','$roomNum','$resName')";
											$res = mysqli_query($con,$insert);

											}elseif($size == 2)
											{
												$countM=$countM+1;
												$roomNum="G0".$countM ;
												$insert="insert into maleres(resAdmin,name,surname,stdNum,roomNum,resName) VALUES('$resAdmin','$studentName','$surname','$stdNum','$roomNum','$resName')";
											$res = mysqli_query($con,$insert);
											}
									}
									elseif($resSize >1 )
									{
										$sizeUp = 0;
										$roomNum="W2-10".$countM ;
										$search ="select roomNum from maleres WHERE roomNum = '$roomNum'";
										$searchQuery = mysqli_query($con,$search);
										while($find = mysqli_fetch_array($searchQuery))
										{
											$look = $find['roomNum'];
											$sizeUp++;
										}
										if($sizeUp==0 ||$sizeUp==1)
											{

												$insert="insert into maleres(resAdmin,name,surname,stdNum,roomNum,resName) VALUES('$resAdmin','$studentName','$surname','$stdNum','$roomNum','$resName')";
											$res = mysqli_query($con,$insert);

											}elseif($sizeUp == 2)
											{
												$countM=$countM+1;
												$roomNum="G0".$countM ;
												$insert="insert into maleres(resAdmin,name,surname,stdNum,roomNum,resName) VALUES('$resAdmin','$studentName','$surname','$stdNum','$roomNum','$resName')";
											$res = mysqli_query($con,$insert);
											}
									}
									
						
									
									
									
									
								}elseif($_SESSION['gender'] == "female")
								{
									$size=0;
									$roomNum="W1-G0".$countF;
									$search ="select roomNum from femaleres WHERE roomNum = '$roomNum'";
									$searchQ = mysqli_query($con,$search);
									while($find = mysqli_fetch_array($searchQ))
									{
										$look = $find['roomNum'];
										$size++;
									}
									
									
									
									if($size==0 ||$size==1)
									{
										
										$insert="insert into femaleres(stdNum,resAdmin,name,surname,roomNum,resName) VALUES('$stdNum','$resAdmin','$studentName','$surname','$roomNum','$resName')";
									$res = mysqli_query($con,$insert);
									}elseif($size >= 2)
									{
										$countF=$countF+1;
										$roomNum="G0".$countF ;
										$insert="insert into femaleres(stdNum,resAdmin,name,surname,roomNum,resName) VALUES('$stdNum','$resAdmin','$studentName','$surname','$roomNum','$resName')";
									$res = mysqli_query($con,$insert);
									}
								}
								
							echo '<form>';
								echo '<div class="form-group">';
									echo '<label>Results</label>';
									echo '<div class="input-group">';
										echo '<div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-angle-right"></i></span></div>';
								
								
											echo '<input type="text"  class="form-control" name="status" value="You Qualify for a Room" readonly >';
								
								
										echo '<div class="input-group-append"></div>';
									echo '</div>';
							echo '</div>';
								echo '</form>';
							}
							else
							{
								echo '<form>';
								echo '<div class="form-group">';
									echo '<label>Results</label>';
									echo '<div class="input-group">';
										echo '<div class="input-group-prepend"><span class="text-primary input-group-text"><i class="fa fa-angle-right"></i></span></div>';
								
								
			echo '<input type="text" class="form-control" name="status" value= "You dont qualify for a Room" readonly >';
								
								
										echo '<div class="input-group-append"></div>';
									echo '</div>';
							echo '</div>';
								echo '</form>';
								
							
						
					
						}
						
						}
						 
						 
						?>
				
            </div>
        </div>
    </div>
 
 
    <footer>
        <div id="footer-div">
            <div class="container" id="footercont">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>About the developers</h2>
                        <p>A team of highly dedicated developers from the DSO34BT, Class of 2020.</p>
                    </div>
                    <div class="col-lg-6">
                        <h2>Notice</h2>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col-lg-6">
                            <p>©2020 TUT<br></p>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
	
	
	

	
	
</body>





</html>