<?php
session_start();
include'dbconnection.php';
include("checklogin.php");

check_login();
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from users where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}



?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Users</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>
	<?php
	include("nav.php");
	?>

      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Manage Users</h3>
			  <form method="post">
				<div class="form-group" align="right">
				  <label><b>SEARCH BAR</b></label>
						<input class="bg-primary" name="search"  type="text" placeholder=" Enter student No.">
				</div>
				</form>
				<div class="row">
				
				<form action="excel.php" method="post">
				<div class="form-group" align="left">
				  <label><b>Download excel</b></label>
					<input type="submit">	
				</div>
				</form>
                <form action="pdf.php" method="post">
				<div class="form-group" align="left">
				  <label><b>Download PDF</b></label>
					<input type="submit">	
				</div>
				</form> 
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All User Details </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th class="hidden-phone">First Name</th>
                                  <th> Last Name</th>
                                  <th> Email Id</th>
                                  <th>Contact no.</th>
                                  <th>Reg. Date</th>
								  
								  
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
								  
								 
								  
								  
		
								if(empty($_POST['search']))
								  {
									 		  $ret=mysqli_query($con,"select * from users a, student_records b WHERE a.stdNum = b.stdNum");
											  $cnt=1;
											  while($row=mysqli_fetch_array($ret))
											  {
												  echo'<tr>';
												  echo'<td>'.$cnt.'</td>';
												  echo'<td>'.$row['name'].'</td>';
												  echo'<td>'.$row['SName'].'</td>';
												  echo'<td>'.$row['email'].'</td>';
												  echo'<td>'.$row['contactno'].'</td>';  
													echo'<td>'.$row['posting_date'].'</td>';
													echo'<td>';

														 echo'<a href="update-profile.php?uid='.$row['email'].'"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>'; 


														 echo '<a href="deleteUser.php?id='.$row['email'].'">';
													  echo'<button class="btn btn-danger btn-xs" onClick= "return confirm("Do you really want to delete");"> <i class="fa fa-trash-o "></i></button></a>';


													  echo '</td></tr>';
												  $cnt=$cnt+1; 
											  }
								  }else
								  {
									 $search=$_POST['search'];
					  		$ret=mysqli_query($con,"select * from users a, student_records b WHERE a.stdNum = b.stdNum AND a.stdNum LIKE '%{$search}%' ");
											  $cnt=1;
									
									$row_cnt = mysqli_num_rows($ret);
									if($row_cnt>0)
									{
											  while($row=mysqli_fetch_array($ret))
											  {
												  echo'<tr>';
												  echo'<td>'.$cnt.'</td>';
												  echo'<td>'.$row['name'].'</td>';
												  echo'<td>'.$row['SName'].'</td>';
												  echo'<td>'.$row['email'].'</td>';
												  echo'<td>'.$row['contactno'].'</td>';  
													echo'<td>'.$row['posting_date'].'</td>';
													echo'<td>';

														 echo'<a href="update-profile.php?uid='.$row['email'].'"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>'; 


														 echo '<a href="deleteUser.php?id='.$row['email'].'">';
													  echo'<button class="btn btn-danger btn-xs" onClick= "return confirm("Do you really want to delete");"> <i class="fa fa-trash-o "></i></button></a>';


													  echo '</td></tr>';
												  $cnt=$cnt+1; 
											  }
									}else
									{
										echo "<script>alert('Student Not found');</script>";
										$ret=mysqli_query($con,"select * from users a, student_records b WHERE a.stdNum = b.stdNum");
											  $cnt=1;
											  while($row=mysqli_fetch_array($ret))
											  {
												  echo'<tr>';
												  echo'<td>'.$cnt.'</td>';
												  echo'<td>'.$row['name'].'</td>';
												  echo'<td>'.$row['SName'].'</td>';
												  echo'<td>'.$row['email'].'</td>';
												  echo'<td>'.$row['contactno'].'</td>';  
													echo'<td>'.$row['posting_date'].'</td>';
													echo'<td>';

														 echo'<a href="update-profile.php?uid='.$row['email'].'"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>'; 


														 echo '<a href="deleteUser.php?id='.$row['email'].'">';
													  echo'<button class="btn btn-danger btn-xs" onClick= "return confirm("Do you really want to delete");"> <i class="fa fa-trash-o "></i></button></a>';


													  echo '</td></tr>';
												  $cnt=$cnt+1; 
											  }
									}
								
								  }
						
                             
								  
								  
								  
								  ?>
								  
								  
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
		</section>
      </section
  ></section>
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
