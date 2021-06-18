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
	$room = $_POST['room'];
	$details=$_POST['details'];
	$status=$_POST['status'];
	$date=$_POST['date'];
	
	mysqli_query($con,"UPDATE complaints SET id='$id' ,stdNum='$stdNum', name='$name',room='$room', details='$details', status='$status', date='$date' where id='".$_GET['uid']."'");
$_SESSION['msg']="Profile Updated successfully";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Update Complaint Status</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

	  <?php 
	  $ret=mysqli_query($con,"select * from complaints WHERE id='".$_GET['uid']."'");
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> <?php echo $row['name'];?>'s Information</h3>
             	
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
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Room Number </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="room" value="<?php echo $row['room'];?>"  readonly>
                              </div>
                          </div>
                               <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Complaint Details </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="details" value="<?php echo $row['details'];?>" readonly >
                              </div>
                          </div>
							   

                            <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Status </label>
                              <div class="col-sm-10">
                                 
								  
								  
								  
								   <select class="form-control" name="status">
									  <?php
	   										if($row['status'] == "fixed")
											{
												echo '<option value="'.$row['status'].'" hidden="">'. strtoupper($row['status']) .'</option>';
												echo '<option value="Pending">PENDING</option>';
											}
	   										else
											{
												
												echo '<option value="'.$row['status'].'" hidden="">'. strtoupper($row['status']) .'</option>';
												echo '<option value="fixed">FIXED</option>';
											}
											?>
									  
									  	
								  </select>
                              </div>
                          </div>
						  
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Date</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="date" value="<?php echo $row['date'];?>"  readonly>
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
