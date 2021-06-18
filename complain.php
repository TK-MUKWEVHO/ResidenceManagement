<?php
session_start();

include("checklogin.php");
check_login();
require_once('dbconnection.php');
include("nav.php")

?>


    
    </div>
    <div id="structure-promo" style="padding: 2px;padding-top: 1px;padding-bottom: 60px;padding-left: 0px;padding-right: 0px;">
        <div class="container">
            <div class="jumbotron" id="structure-jumbo">
                <h1><?php echo $_SESSION['name']." ".$_SESSION['SName']." ";?> Complaints</h1>
                <p>Short description</p>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row">
		<div class="col">
                  <div class="col-md-12">
                    <div class="content-panel">
					  <form id="book" class="book" method="post">
					  

                    <div class="form-group"><label>Room Number
						
				  <input  type="text" required="" class="form-control" name="roomNum" value="
<?php 
$res = $_SESSION['gender'].'res';
$search ="select roomNum from ".$res." WHERE stdNum ='".$_SESSION['stdNum']."'";
$searchQuery = mysqli_query($con,$search);
$find = mysqli_fetch_array($searchQuery);
 
		  echo  $find['roomNum'];

?>"</label>
				  </div>
                    <div class="form-group"><label>Details</label>
						
						<input class="form-control" name="details" 08:00 type="text" required minlength="10" maxlength="50" placeholder="eg. Broken Windows">
						</div>
                    
					</div>
                    
						<input type="submit" class="btn btn-primary" id="submit" name="submit" value="submit" >
			<?php 
			
			if(isset($_POST['submit']))
			{
				$roomNo = $_POST['roomNum'];
				$details= $_POST['details'];
				$stdN = $_SESSION['stdNum'];

				$name = $_SESSION['name'];
				$status = "Pending";
				$date = date("yy-m-d");
		
		
				
					$query= "insert into complaints values('','$stdN','$name','$roomNo','$details','$status','$date')";
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
						?>
                </form>
					  
					  
					  <?php
					  $stdN =$_SESSION['stdNum']; 
					  $sel ="select * from complaints Where room ='".$find['roomNum']."'"; 
					  $ret = mysqli_query($con,$sel);
					  $row=mysqli_fetch_array($ret);
					  if($row>0)
					  {
						   echo '<table class="table table-striped table-advance table-hover">';
	                  	  	  echo '<h1 align="center"></i>These are your Room Complaints</h1>';
	                  	  	  echo '<hr>';
                              echo '<thead>';
                              echo '<tr>';
								echo '<th>id</th>';
						  		echo '<th>stdNum </th>';
						  		echo '<th>Name </th>';
								echo '<th>room</th>';
								echo '<th>details</th>';
								echo '<th>status </th>';
						  		echo '<th>date </th>';
								
						  
						  

                              echo '</tr>';
                              echo '</thead>';
                              echo '<tbody>';
						  $size=mysqli_num_rows($ret);
							  for($i=1;$i<$size;$i++)
							  {
								  $rows = mysqli_fetch_row($ret);
								 echo '<tr>';
                                  echo '<td align="center">'.$rows[0].'</b></td>';
                                  echo '<td align="center">'.$rows[1].'</td>';
								  echo '<td align="center">'.$rows[2].'</td>';
								  echo '<td align="center">'.$rows[3].'</td>';
                                  echo '<td align="center">'.$rows[4].'</td>';
								  
								  if($rows[5]== "fixed" || $rows[5]== "FIXED")
								  {
								  	echo '<td style="color: aliceblue; background: green;">'.$rows[5].'</td>';
								  }else{
								  		echo '<td style="color: aliceblue; background: red;">'.$rows[5].'</td>';
							  		}
                                  
								  echo '<td align="center">'.$rows[6].'</td>';


                              echo '</tr>'; 
							  }
                              
                               
					  		
                          }
						  
						  ?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
				  </div>
				  </div>
    <footer>
        <div id="footer-div">
            <div class="container" id="footercont">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>About the developers</h2>
                        <p>A team of highly dedicated developers from the mentorship programme of 2020. We tasked ourselves with developing a platform to centralize the key role players in off classroom learning into a single online area. Our goal is to
                            achieve the accesibility of the academic support while their workload is not flooded by the number of people, we then made this platform to allow students to connect the service providers with minimized spamming and full transparency
                            of their availability.</p>
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