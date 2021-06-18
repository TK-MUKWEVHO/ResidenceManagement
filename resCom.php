<?php
session_start();

include("checklogin.php");
check_login();
require_once('dbconnection.php');

include("nav.php");
?>


    
    </div>
    <div id="structure-prom" style="padding: 2px;padding-top: 1px;padding-bottom: 60px;padding-left: 0px;padding-right: 0px;">
        <div class="container">
            <div class="jumbotron" id="structure-jumbo">
                <h1>RESIDENCE COMMITTEE</h1>
                <p>Short description</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Residence Committee</h1>
                <p>This will be a much more detailed description of the academic structure. a lot can be written here. This can be even rendered from a server but to not show off our coding kills we will just make this information here very static. the department
                    or structure rather may give us well reviewed content to print here because we might be too busy with our next startup idea because, god, hellow we are geniuses.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                
				
				$news = "SELECT * FROM supportstructure WHERE position = 'rc'";
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