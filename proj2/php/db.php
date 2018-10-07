<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--
Linh Nguyen
CS545 trst019
Fall 2011
-->
<head>
    <meta http-equiv="Content-Type" content="text/html;
    charset=iso-8859-1" />
    <title>Form</title>
<style type="text/css">
body { 
    background-color: #EEF; 
    }
h1 { 
    text-align: center;
    }    

fieldset {
    width: 600px;
    margin: 0 auto 0 auto;
    }
    
.buttons {
    text-align: center;
    padding: 25px 0 5px 0;
    }   


</style>    

</head>


<body>
    <div>
        <h1 class="heading">SDSU JOB CONNECTION</h1>
	
		<div class="out-field">
			<div class="maincontent">
			<div id="top-navigation">
				<ul>
        			<li><a href="proj2.html">Home</a></li>
					

				</ul>
			</div>
		<h3>Personal information</h3>
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
        
		
		if(($data['redID'] =trim($_POST['rID']))) == false) {
            echo "<h2 class='error'>ERROR, you did not fill in your RedID</h2>\n";
            $is_error = true;
            }
		
        if(($data['fname'] = strip_tags(trim($_POST['fname']))) == false) {
            echo "<h2 class='error'>ERROR, you did not fill in your first name</h2>\n";
            $is_error = true;
            } 
        
        if(strpos($data['fname'], '\<')) {
            $html_error = true;  
            }
		if(($data['lname'] = trim($_POST['lname'])) == false) {
            echo "<h2 class='error'>ERROR, you did not fill in your last name</h2>\n";
            $is_error = true;
            }
		if($_FILES['file']['error'] > 0) {
        			echo "Error: {$_FILES['file']['error']}"."<br />\n";
        		}
    	if(file_exists("photos/".$_FILES['file']['name']))  {
        			echo "<b>Error, the file already exists on the server</b><br />\n";
        		}
    	if($_FILES['file']['size'] > 2000000){
       				 echo "<b>Error, the image is too large!.  (Max size is 2MB)</b><br />\n";
			}                                                            

        if(($data['email'] = trim($_POST['email'])) == false) {
            echo "<h2 class='error'>ERROR, you did not fill in your email address/h2>\n";
            $is_error = true;
            }
		if(($data['gpa'] = trim($_POST['gpa'])) == false) {
            echo "<h2 class='error'>ERROR, you did not fill in your current GPA</h2>\n";
            $is_error = true;
            }
		if((($data['graduate'] = trim($_POST['graduate'])) == false)) {
            echo "<h2 class='error'>ERROR, you did not fill in your expected graduate date</h2>\n";
            $is_error = true;
            }			
		if(isset($_POST['position'])) {
            $data['psought'] = $_POST['psought'];
            }
        else {
            echo "<h2 class='error'>ERROR, you did not select any position sought</h2>\n";
            $is_error = true;
            }
		if(($data['alevel'] = trim($_POST['alevel'])) == false) {
            echo "<h2 class='error'>ERROR, you did not fill in your academic level</h2>\n";
            $is_error = true;
            }
        if(isset($_POST['language'])) {
            $data['language'] = $_POST['language'];
            }
        else {
            echo "<h2 class='error'>ERROR, you did not select any programming languages</h2>\n";
            $is_error = true;
            } 
		if(isset($_POST['course'])) {
            $data['course'] = $_POST['course'];
            }
        else {
            echo "<h2 class='error'>ERROR, you did not select any core course completed</h2>\n";
            $is_error = true;
            } 
		if(isset($_POST['osystem'])) {
            $data['osystem'] = $_POST['osystem'];
            }
        else {
            echo "<h2 class='error'>ERROR, you did not select any operating system</h2>\n";
            $is_error = true;
            }
			if(isset($_POST['job'])) {
            $data['job'] = $_POST['job'];
            }
        else {
            echo "<h2 class='error'>ERROR, you did not select any type of position</h2>\n";
            $is_error = true;
            }
        if($is_error || $html_error) {
            echo "<a href='/~trst019/proj2/student.html'>&lt;-- Back</a>\n";
            }
        else {
				$first_name = $_POST['fname'];  
				$language_string = implode("||", $_POST['language']);
				$course_string = implode("||", $_POST['course']);
				$osystem_string = implode("||", $_POST['osystem']);
	 			$job_string = implode("||", $_POST['job']); 			 
	 			      
            			if(!($db = mysqli_connect($server, $user, $password, $database))) {
                			die('SQL ERROR: Connection failed '.mysqli_error($db));

            }
		if(!(mysqli_query($db, $sql))) {
                die('SQL ERROR: '.mysqli_error($db));
				}
		
		$sql = "Create table student(
    						redID int(9) PRIMARY KEY NOT NULL,
    						first_name varchar(25) NOT NULL,
    						last_name varchar(25) NOT NULL,
							photo blob,
    						email varchar(30) NOT NULL,
							phone_number varchar(10) NOT NULL,
							gpa decimal(3,2) NOT NULL,														
							session varchar(6) NOT NULL,
							graduate numeric(4) NOT NULL,							
							position varchar(20) NOT NULL,
							level varchar(25) NOT NULL,
							language varchar(70) NOT NULL,
							course varchar(120) NOT NULL,
							osystem varchar(25) NOT NULL,
							job varchar(256) NOT NULL,
							faculty_ref varchar(50) NOT NULL,
							skills varchar(200) NOT NULL);";           
                
            $sql = "Insert into student values(".
	    		qt($_POST['redID']).", ".
            	qt($_POST['fname']).", ".
            	qt($_POST['lname']).", ".
            	qt($_POST['file']).", ".
	    		qt($_POST['email']).", ".
	    		qt($_POST['phone']).", ".
				qt($_POST['gpa']).", ".
				qt($_POST['session']).", ".
	    		qt($_POST['graduate']).", ".
	    		qt($_POST['position']).", ".	    		
	    		qt($_POST['level']).", ".
	    		qt($language_string).", ".  
	    		qt($course_string).", ".
	    		qt($osystem_string).", ".
	    		qt($job_string).", ".
	    		qt($_POST['ref']).", ".
	    		qt($_POST['skill']).");";
                    
           	if(!(mysqli_query($db, $sql))) {
                			die('SQL ERROR: '.mysqli_error($db));
                		}
	    			echo "<h3>".$first_name.", your record was successfully added to our systems. Thank you for using our service!!</h3><br />\n";
            			echo "The current date is: ".date('M dS, Y');
	    			echo "<br />\n";
				echo "<br />\n";
				echo "</center>";
	    			echo "<a href='/~trst010/proj2/proj2.html'>&lt;-- Home</a>";
	    		}

                mysqli_close($db);
	
            ?>      
    
		
    </div>
</body>

</html>
