<?php
session_start();
include'dbconnection.php';
include("checklogin.php");
check_login();


if(isset($_GET['id']))
{
	$adminid=$_GET['id'];
	$msg=mysqli_query($con,"delete from complaints where id='$adminid'");
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

    <title>Admin | Booking</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
	  
	  
	  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	  <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
			<?php
			$select2 = "SELECT COUNT(id) AS num FROM businesdata ";
				$quiry3 = mysqli_query($con,$select2);
				$lineT = mysqli_fetch_array($quiry3);
			
			$happy = "SELECT COUNT(id) AS happy FROM businesdata WHERE rating = 5";
				 $quiry4 = mysqli_query($con,$happy);
				$line1 = mysqli_fetch_array($quiry4);
			
				$percentageH = $line1['happy']/$lineT['num'] *100;
			
	
      	
	
			
				$midHappy = "SELECT COUNT(id) AS midHappy FROM businesdata WHERE rating = 4";
				 $quiry5 = mysqli_query($con,$midHappy);
				$line2 = mysqli_fetch_array($quiry5);
				
				$percentageNH = $line2['midHappy']/$lineT['num'] *100;

		
				$notSure = "SELECT COUNT(id) AS notSure FROM businesdata WHERE rating = 3";
				 $quiry6 = mysqli_query($con,$notSure);
				$line3 = mysqli_fetch_array($quiry6);
				
				$percentageM = $line3['notSure']/$lineT['num'] *100;
			
				
				$angry = "SELECT COUNT(id) AS angry FROM businesdata WHERE rating = 2";
				 $quiry7 = mysqli_query($con,$angry);
				$line4 = mysqli_fetch_array($quiry7);
				
				$percentageA = $line4['angry']/$lineT['num'] *100;
			
				$Vangry = "SELECT COUNT(id) AS Vangry FROM businesdata WHERE rating = 1";
				 $quiry8 = mysqli_query($con,$Vangry);
				$line5 = mysqli_fetch_array($quiry8);
				
				$percentageVA = $line5['Vangry']/$lineT['num'] *100;
			
				
			
		
      	
			
			
          echo "['Response', 'Precentage'],";
          echo "['Very Happy',".$percentageH."],";
          echo "['Happy',".$percentageNH."],";
          echo "['Not Sure',".$percentageM."],";
          echo "['Not Happy',".$percentageA."],";
          echo "['Not Angry',".$percentageVA."]";
			
			?>
        ]);

        var options = {
          title: 'Overall Percentage',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>  
	 <!--Bar graph -->
	  
	  <script>
	  
	  google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
		  
		  <?php
		  
		  $select = "SELECT COUNT(stdNum) AS number FROM booking WHERE postedDate = CURDATE() ";
										  $quiryt = mysqli_query($con,$select);
					  					  $today = mysqli_fetch_array($quiryt);
					  						
		  $select = "SELECT COUNT(stdNum) AS number FROM booking WHERE postedDate = CURDATE()-1 ";
										  $quiryY = mysqli_query($con,$select);
					  					  $yest = mysqli_fetch_array($quiryY);
					  					
		  
		  $select = "SELECT COUNT(stdNum) AS number FROM booking WHERE postedDate = CURDATE()-2 ";
										  $quiryD = mysqli_query($con,$select);
					  					  $dayB = mysqli_fetch_array($quiryD);
					  					$dayB['number'];
		  $select = "SELECT COUNT(stdNum) AS number FROM booking WHERE postedDate = CURDATE()-3 ";
										  $quiryDB = mysqli_query($con,$select);
					  					  $daybb = mysqli_fetch_array($quiryDB);
					  					
		  

       echo " ['Days', 'Number of Bookings.',{ role: 'style' }],";
        echo "['Today',". $today['number'].",'color: #76A7FA'],";
        echo "['Yesterday',". $yest['number'].",'opacity: 0.2'],";
       echo " ['Day Before Yesterday',". $dayB['number'].",'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],";
        echo "['3 Days Ago',". $daybb['number'].",'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']";
		
		  
		  ?>
      ]);

      var options = {
        title: 'Number of Booking per day',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Total Response',
          minValue: 0
        },
        vAxis: {
          title: 'City'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
	  </script>
	  
	  
	  
  </head>
<?php
	include("nav.php");
	?>
      <section id="main-content">
          <section class="wrapper">
          	<h3 align="center"><i class="fa fa"></i>MENTORS BOOKINGS</h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-"></i> All Residence Complaints</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Queue No.</th>
                                  <th class="hidden-phone">Student Number</th>
                                  <th>Session Date</th>
                                  <th>Contact Details</th>
								  <th>Session Details</th>
								  <th>First Name</th>
								  <th>Posted Date</th>
								  <th>Mentor Responsible</th>
								  <th align="center">Change status</th>
								  
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from booking ");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['stdNum'];?></td>
                                  <td><?php echo $row['time'];?></td>
                                  <td><?php echo $row['cellPhone'];?></td>
                                  <td><?php echo $row['sessionDetails'];?></td>
								  <td><?php echo $row['name'];?></td>
								  <td><?php echo $row['postedDate'];?></td>
								  <td><?php echo $row['Mentor'];?></td>
								  
								 
								 
								   <?php if($row['Status']== "approved" ||$row['Status']== "Approved" || $row['Status']== "APPROVED")
								  {
								  	echo '<td style="color: aliceblue; background: green;">'.$row['Status'].'</td>';
								  }else{
								  		echo '<td style="color: aliceblue; background: red;">'.$row['Status'].'</td>';
							  } ?>
						
                                  <td align="center">
                                     <a href="deleteBook.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-danger btn-xs" ><i class="fa fa-trash-o "></i></button>
									  </a>
                                     <a href="updateBooking.php?uid=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-primary btn-xs" ><i class="fa fa-pencil"></i></button>
									  
									  </a>
                                     
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                      </div>
					  
					  <div id="chart_div" style="width: 400px; height: 400px;"></div>
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
