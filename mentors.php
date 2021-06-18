<?php
session_start();
require_once('dbconnection.php');
include("checklogin.php");
check_login();


include("nav.php");
?>


    
    </div>
    <div id="structure-promo" style="padding: 2px;padding-top: 1px;padding-bottom: 60px;padding-left: 0px;padding-right: 0px;">
        <div class="container">
            <div class="jumbotron" id="structure-jumbo">
                <h1>Residence Mentorship Programme</h1>
                <p>Short description</p>
				
				<?php
					$select ="select * from supportstructure WHERE stdNum =".$_SESSION['stdNum'];
					$ret=mysqli_query($con,$select);
					$num =  mysqli_fetch_array($ret)	;	  
								if($num >0)
								{
									echo('<p><a class="btn btn-primary"  href="check/booking.php" role="button">Accept sessions</a></p>');
								}
								
							
							?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Mentors</h1>
                <p>This will be a much more detailed description of the academic structure. a lot can be written here. This can be even rendered from a server but to not show off our coding kills we will just make this information here very static. the department
                    or structure rather may give us well reviewed content to print here because we might be too busy with our next startup idea because, god, hellow we are geniuses.</p>
            </div>
        </div>
        <div class="row">
		                <?php
                
				
				$news = "SELECT * FROM supportstructure WHERE position ='mentor'";
				$quiry = mysqli_query($con,$news);
				
				while($row = mysqli_fetch_array($quiry))
				{
					echo '<a href="newsPage.php?id='. $row['id'] .'">';
					echo '<div class="col-lg-4">';
					echo '<img class="img-fluid" src="admin/'.$row['img'].'">';
					echo '</a>';
					echo '<p><b>Name & Surname :</b>'.$row['name'].' '.$row['surname'].'</p>';
					echo '<p><b>Position :</b>'.$row['position'].'</p>';
					echo '<p><b>Motivational Qoute: </b>'.$row['motivation'].'</p>';
					echo '<p><b>Contact Details: </b>0'.$row['contact'].'</p>';
					echo '<p><b>Room Number: </b>'.$row['roomNum'].' ';
					//this will help us get data for a specific row
					

                	echo '</div>';
				}
                  
				//perfect no error
				?>
            <div class="col">
                
            </div>
        </div>
    </div>
 
	  
	
    <footer>
        <div id="footer-div">
            <div class="container" id="footercont">
                <div class="row">
                    <div class="col-lg-6">
					<h3 align="center">TO BOOK A SESSION</h3>
					
                        <form method="post">
							
							
							
                    <div class="form-group"><label>Cellphone Number
				  <input name="cellNum" type="number" required="" class="form-control" name="cellNum" minlength="10" maxlength="10" ></label>
							</div>
							
							
							
                    <div class="form-group"><label>Nature of Booking</label>
						
						<input class="form-control" name="details" 08:00 type="text" required minlength="10" maxlength="50" placeholder="eg. C++ functions"></div>
							
							
							
							
							
                    <div class="form-group">
                        <div><label>Date & Time</label>
							
							<input type="date"  name="date1">
							<input type="time"  name="time">
                    </div>
					</div>
                    
						<input type="submit" class="btn btn-primary" id="book" name="book" value="book" >

                </form>
						
						
						
			<?php 
			
			if(isset($_POST['book']))
			{
				$stdN = $_SESSION['stdNum'];
				$time = $_POST['time'];
				$date1 = $_POST['date1'];
				$cellNo = $_POST['cellNum'];
				$details= $_POST['details'];
				$name = $_SESSION['name'];
				$date = date("yy-m-d");
		
		
				$dateTime = $date1.' '.$time;
				$status = "Pending";
				$Mentor = "";
				
				$query= "insert into booking values('','$stdN','$dateTime','$cellNo','$details','$name','$date','$status','$Mentor')";
				$query_run = mysqli_query($con,$query);
						
				
			

						if($query_run)
						{
							echo '<script type="text/javascript"> alert("Booking successful") </script>';
							
						}
						else
						{
							echo '<script type="text/javascript"> alert("Error!") </script>';
						}
			}
						?>
                    </div>
                    <div class="col-lg-6">
                        <h2>Notice</h2>
						
						<table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa" ></i> Booking Details</h4>
	                  	  	  <hr>
                              <thead>
                              <tr stystyle="color: aliceblue;">
                                  <th style="color: aliceblue;">Student Number.</th>
                                  <th class="hidden-phone" style="color: aliceblue;">Session Details</th>
                                  <th style="color: aliceblue;">Session Date</th>
								  <th style="color: aliceblue;">Mentor</th>
                                  <th style="color: aliceblue;">Status</th>

								  
								  
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
								  $sel ="select * from booking Where stdNum =".$_SESSION['stdNum']; 
								$ret=mysqli_query($con,$sel);
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              
                                  <td style="color: aliceblue;"><?php echo $row['stdNum'];?></td>
                                  <td style="color: aliceblue;"><?php echo $row['sessionDetails'];?></td>
                                  <td style="color: aliceblue;"><?php echo $row['time'];?></td>
								  <td style="color: aliceblue;"><?php echo $row['Mentor'];?></td>
                                  <?php if($row['Status']== "approved" ||$row['Status']== "Approved" || $row['Status']== "APPROVED")
								  {
								  	echo '<td style="color: aliceblue; background: green;">'.$row['Status'].'</td>';
								  }else{
								  		echo '<td style="color: aliceblue; background: red;">'.$row['Status'].'</td>';
							  } ?>
                                  <td>
                                     
									  
                                     <a href="update-profile.php?uid=<?php echo $row['email'];?>"> 
                                     <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                     <a href="manage-users.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
						
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