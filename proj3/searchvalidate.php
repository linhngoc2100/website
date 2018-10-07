<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--
	Nguyen, Linh    Account:  trst019
        CS545, Fall 2011
        Project #3
-->
<head>
    <meta http-equiv="Content-Type" content="text/html;
    charset=iso-8859-1" />
   
    <title>SDSU Job Connection</title>       
    <link rel="stylesheet" type="text/css" href="student.css" />
    
</head>

<body>
	<div>
		<h1 class="heading">SDSU JOB CONNECTION</h1>
				<div id="top-navigation">
				<ul>
        				<li><a href="proj3.html">Home</a></li>
					
        				<li><a href="search.html">New Search</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
				</div>
	
		<div class="out-field">
			<div class="maincontent">
				
			
		
        <?php   
            #########################################     
            function qt($str) {
                $str = "\"".$str."\"";
                return $str;
                }
            #########################################
                
            $server = 'opatija.sdsu.edu:3306';
            $user = 'trst019';
            $password = 'trst019';
            $database = 'trst019';				 
				
					$language_string = implode("||", $_POST['language']);
					$course_string = implode("||", $_POST['course']);
					$osystem_string = implode("||", $_POST['osystem']);
					$job_string = implode("||", $_POST['job']); 
              
            			if(!($db = mysqli_connect($server, $user, $password, $database))) {
               				 die('SQL ERROR: Connection failed '.mysqli_error($db));
            			}
	    			echo "<br />\n";
	    			echo "<h3>Students who meet your criteria and their profile:</h3><br />\n";
	 			echo "<br />\n";	 
            			// Now print everything in the student table
            			$sql = "select * from student where
						gpa >= ".qt($_POST['gpa'])." AND
	    				language LIKE '%".$language_string."%' AND
	    				course LIKE '%".$course_string."%' AND
					osystem LIKE '%".$osystem_string."%' AND	    				
					job LIKE '%".$job_string."%';";
		
            			if(!($result = mysqli_query($db, $sql))) {
                			die('SQL SELECT ERROR: '. mysqli_error($db));
                		}
		
            			while($row = mysqli_fetch_assoc($result)) {
					echo "<b>RedID: </b>".$row['redID']."<br />\n";
                			echo "<b>Name: </b>".$row['first_name']." ".$row['last_name']."<br />\n";
							
							
					echo "<b>Email: </b>".$row['email']."<br />\n";
					echo "<b>Phone: </b>".$row['areaphone']."-".$row['prefixphone']."-".$row['phone']."<br />\n";					
					echo "<b>Current GPA: </b>".$row['gpa']."<br />\n";
					echo "<b>Expected Graduation Date: </b>".$row['session']." ".$row['graduate']."<br />\n";
					echo "<b>Position sought: </b>".$row['position']."<br />\n";
					echo "<b>Academic Level: </b>".$row['level']."<br />\n";
					echo "<b>Program language: </b>".$row['language']."<br />\n";
					echo "<b>Courses Completed: </b>".$row['course']."<br />\n";
					echo "<b>Operating Systems Familiar: </b>".$row['osystem']."<br />\n";
					echo "<b>Desirable Job: </b>".$row['job']."<br />\n";
					echo "<b>Faculty Reference: </b>".$row['ref']."<br />\n";					
					echo "<b>Other skills: </b>".$row['oskill']."<br />\n"."<br />\n";
					
					
					
					//$d = dir('/home/trst019/public_html/proj3/photos');
    					echo "<img src=\"/~trst019/proj3/photos\"/>".$row['file'];
					echo  "<br />\n";
						
                		}
				
                		mysqli_close($db);
			   
		?>
		</div>
	</div>
	</div>
</body>

</html>
