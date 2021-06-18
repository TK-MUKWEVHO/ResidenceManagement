<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("nav.php");
check_login();
if(isset($_POST['Submit']))
{
	$id=$_GET['uid'];
	$stdNum=$_POST['stdNum'];
	$name = $_POST['name'];
	$time = $_POST['time'];
	$sessionDetails=$_POST['sessionDetails'];
	$Status=$_POST['Status'];
	$date=$_POST['postedDate'];
	$Mentor=$_POST['Mentor'];
	$cellPhone=$_POST['cellPhone'];
	
	mysqli_query($con,"UPDATE booking SET id='$id' ,stdNum='$stdNum',time='$time', cellPhone='$cellPhone',sessionDetails='$sessionDetails', name='$name', postedDate='$date', Status='$Status', Mentor='$Mentor' where id='".$_GET['uid']."'");
$_SESSION['msg']="Booking Updated successfully";
}
?>

<!DOCTYPE html>

      
	  <?php 
	  $ret=mysqli_query($con,"select * from booking WHERE id='".$_GET['uid']."'");
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> <?php echo $row['name'];?>'s Booking Information</h3>
             	
				<div class="row">    
                  <div class="col-md-12">
                      <div class="content-panel">
                      <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
						  
						  
						  
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Student Number </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="stdNum" value="<?php echo $row['stdNum'];?>" readonly>
                              </div>
                          </div>
         
							 
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">First name</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>"readonly >
                              </div>
                          </div>
                          
						  
							   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Cell Phone</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="cellPhone" value="<?php echo $row['cellPhone'];?>"readonly >
                              </div>
                          </div>
							   
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Session Date </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="time" value="<?php echo $row['time'];?>" >
                              </div>
                          </div>
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">session Details </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="sessionDetails" value="<?php echo $row['sessionDetails'];?>" readonly >
                              </div>
                          </div>
							   
							<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Posted Date</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="postedDate" value="<?php echo $row['postedDate'];?>" readonly >
                              </div>
                          </div>

							  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Mentor</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="Mentor" value="<?php echo $row['Mentor'];?>" >
                              </div>
                          </div> 
							   
                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Status </label>
                              <div class="col-sm-10">
                                   <select class="form-control" name="Status">
									  <?php
	   										if($row['Status'] == "Approved")
											{
												
												echo '<option value="'.$row['Status'].'" hidden="">'. strtoupper($row['Status']) .'</option>';
												echo '<option value="Pending">PENDING</option>';
											}
	   										else
											{
												
												echo '<option value="'.$row['Status'].'" hidden="">'. strtoupper($row['Status']) .'</option>';
												echo '<option value="Approved">APPROVE</option>';
											}
											?>
									  
									  	
								  </select>
                              </div>
                          </div>
						   
						  

						  
						  
						  
						  
						  
                          <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Update" class="btn btn-theme"></div>
                          </form>
                      </div>
                  </div>
              </div>
		</section>
        <?php } ?>
      </section></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
