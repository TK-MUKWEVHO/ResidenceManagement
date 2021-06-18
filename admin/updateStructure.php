<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
include("nav.php");
check_login();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | REsidence sttructure</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
	  
	  
	  
	<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("imglink").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>  
	  
  </head>

  
      <?php $ret=mysqli_query($con,"select * from users a, student_records b WHERE a.stdNum = b.stdNum AND   email='".$_GET['uid']."'");
	  ?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Residencial News</h3>
             	
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                      
						  
						  
                           <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();" enctype="multipart/form-data" >
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
						   
							<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Student Number </label>
                              <div class="col-sm-10">
                                  <input type="number" class="form-control" name="stdNum" maxlength="9" minlength="9" >
                              </div>
                          </div>
						  
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Name </label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="name" >
                              </div>
                          </div>
                          
    
                          
						                                <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Surname</label>
                              <div class="col-sm-10">
                                  <input name="surname" type="text" class="form-control" >
                              </div>
                          </div>
						  
						    <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Position</label>
                              <div class="col-sm-10">
                                  
								  
								   <select class="form-control" name="position" class="form-control">
									  	<option value="mentor">MENTOR</option>';
										<option value="rc">RESIDENCE COMMITEE</option>';
									  	
								  </select>
                              </div>
                          </div>
						  
						    <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Motivation </label>
                              <div class="col-sm-10">
                                  <input name="motivation" type="text" class="form-control">
                              </div>
                          </div>
						  
						    <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Room Number</label>
                              <div class="col-sm-10">
                                  <input name="roomNum" type="text" class="form-control" >
                              </div>
                          </div>
						  
						  	<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Contacts</label>
                              <div class="col-sm-10">
                                  <input name="contact" type="text" class="form-control" maxlength="10" minlength="10" >
                              </div>
                          </div>
						  
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Image </label>
                              <div class="col-sm-10">
                                  <img id="uploadPreview" src="assets/img/friends/fr-10.jpg" class="avatar"/><br>
								  <input type="file" id="imglink" name="imglink" accept=".jpg,.jpeg,.png" onchange="PreviewImage();"/>
                              </div>
                          	</div>
							   
                           <div style="margin-left:100px;">
                          <input type="submit" name="Submit" value="Update" class="btn btn-theme"></div>
							   
							   
							   
							   
			<?php 
			if(isset($_POST['Submit']))
			{
				$stdNum =$_POST['stdNum'];
				$name =$_POST['name'];
				$surname = $_POST['surname'];
				$position  = $_POST['position'];
				$motivation = $_POST['motivation'];
				$roomNum  = $_POST['roomNum'];
				$contact  = $_POST['contact'];
				$date = date("yy-m-d");
				
				$img_name = $_FILES['imglink']['name'];
				$img_size =$_FILES['imglink']['size'];
			    $img_tmp =$_FILES['imglink']['tmp_name'];
				
				$directory = 'assets/img/newsPictures/';
				$target_file = $directory.$img_name;
				
				$check= "select * from student_records WHERE stdNum='$stdNum'";
				$check_run = mysqli_query($con,$check);
				
			
				if($check_run)
				{
					$query= "select * from supportstructure WHERE stdNum='$stdNum'";
					$query_run = mysqli_query($con,$query);
					
					if(mysqli_num_rows($query_run)>0)
					{
						// there is already a user with the same username
						echo '<script type="text/javascript"> alert("User already exists.. try another username") </script>';
					}
					else if(file_exists($target_file))
					{
						echo '<script type="text/javascript"> alert("Image file already exists.. Try another image file") </script>';
					}
					
					else if($img_size>20097152)
					{
						echo '<script type="text/javascript"> alert("Image file size larger than 2 MB.. Try another image file") </script>';
					}
					
					else
					{
						move_uploaded_file($img_tmp,$target_file); 	
						$query= "insert into supportstructure values('','$stdNum','$name','$surname','$position','$motivation','$roomNum','$contact','$target_file','$date')";
						

 
						$query_run = mysqli_query($con,$query);
						
						if($query_run)
						{
							echo '<script type="text/javascript"> alert("Story updated.. Check the database") </script>';
							
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!") </script>';
						}
					}	
					
				}
				else{
					echo '<script type="text/javascript"> alert("NOT REGISTERED AS A TSHWANE UNIVERSITY OF TECHONOLOGY STUDENT!") </script>';
				}
			}
				
	  
				?>		  
						  
						  
                          
                          </form>
                      </div>
                  </div>
              </div>
		</section>
       
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
