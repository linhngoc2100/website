<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--
	Nguyen, Linh    Account:  trst019
        CS545, Fall 2011
        Project #2 
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
	    			echo "Students who meet your criteria and their profile:<br />\n";
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
							echo "RedID: ".$row['redID']."<br />\n";
                			echo $row['first_name']." ".$row['last_name']."<br />\n";
							echo "".$row['file']."<br />\n";
							
					echo "Email: ".$row['email']."<br />\n";
					echo "Phone: ".$row['phone']."<br />\n";					
					echo "Current GPA: ".$row['gpa']."<br />\n";
					echo "Expected Graduation Date: ".$row['session']." ".$row['graduate']."<br />\n";
					echo "Position sought: ".$row['position']."<br />\n";
					echo "Academic Level: ".$row['level']."<br />\n";
					echo "Program language: ".$row['language']."<br />\n";
					echo "Courses Completed: ".$row['course']."<br />\n";
					echo "Operating Systems Familiar: ".$row['osystem']."<br />\n";
					echo "Desirable Job: ".$row['job']."<br />\n";
					echo "Faculty Reference: ".$row['ref']."<br />\n";					
					echo "Other skills: ".$row['oskill']."<br />\n"."<br />\n";
                		}
				echo "<a href='/~trst019/proj2/search.html'>&lt;-- Search Again</a>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<a href='/~trst019/proj2/proj2.html'> --&gt;Home</a>";
				echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "<a href='/~trst019/proj2/logout.php'>Logout</a>";
                		mysqli_close($db);
			   
		?>
		</div>
	</div>
	</div>
</body>

</html>
