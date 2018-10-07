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
    <link rel="stylesheet" type="text/css" href="student.css" /> >    

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
        
		
		if(($data['redID'] =trim($_POST['redID'])) == false) {
            echo "<h2 class='error'>ERROR, you did not fill in your RedID</h2>\n";
            $is_error = true;
            }
		
        if(($data['fname'] = strip_tags(trim($_POST['fname']))) == false) {
            echo "<h2 class='error'>ERROR, you did not fill in your first name</h2>\n";
            $is_error = true;
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
            $data['position'] = $_POST['position'];
            }
        else {
            echo "<h2 class='error'>ERROR, you did not select any position sought</h2>\n";
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
        
		if(isset($_POST['osystem'])) {
            $data['osystem'] = $_POST['osystem'];
            }
        
			if(isset($_POST['job'])) {
            $data['job'] = $_POST['job'];
            }
        else {
            echo "<h2 class='error'>ERROR, you did not select any type of position</h2>\n";
            $is_error = true;
            }
        if($is_error || $html_error) {
             echo "<br />\n";	
	    		echo "The current date is: ".date('M dS, Y');

            }
        else {
				$first_name = $_POST['fname']; 
				$photos = $_POST['file']; 
				$position_string = implode("|||", $_POST['position']);
				$language_string = implode("|||", $_POST['language']);
				$course_string = implode(" ||| ", $_POST['course']);
				$osystem_string = implode("|||", $_POST['osystem']);
	 			$job_string = implode("|||", $_POST['job']); 
				$location= "http://trieste.sdsu.edu/~trst019/proj3/photos/".$_FILES['file']['name'];			 
	 			      
            			if(!($db = mysqli_connect($server, $user, $password, $database))) {
                			die('SQL ERROR: Connection failed '.mysqli_error($db));

            }
		                
            $sql = "Insert into student values(".
	    		qt($_POST['redID']).", ".
            	qt($_POST['fname']).", ".
            	qt($_POST['lname']).", ".
		 qt($location).", ".
            	
	    		qt($_POST['email']).", ".
	    		qt($_POST['areaphone']).", ".
				qt($_POST['prefixphone']).", ".
				qt($_POST['phone']).", ".
				qt($_POST['gpa']).", ".
				qt($_POST['session']).", ".
	    		qt($_POST['graduate']).", ".
	    		qt($position_string).", ".	    		
	    		qt($_POST['level']).", ".
	    		qt($language_string).", ".  
	    		qt($course_string).", ".
	    		qt($osystem_string).", ".
	    		qt($job_string).", ".
	    		qt($_POST['ref']).", ".
			
	    		qt($_POST['skill']).");";
		
		move_uploaded_file($_FILES['file']['tmp_name'], "photos/".$_FILES['file']['name']);
                    
           	if(!(mysqli_query($db, $sql))) {
                			die('SQL ERROR: '.mysqli_error($db));
                		}
	    			echo "<h3>".$first_name.", your record was successfully added to our systems. Thank you for using our service!!</h3><br />\n";
            			echo "The current date is: ".date('M dS, Y');
	    			echo "<br />\n";
				echo "<br />\n";
				echo "</center>";
	    			echo "<a href='/~trst019/proj3/proj3.html'>&lt;-- Home</a>";
	    		}

                mysqli_close($db);
	
            ?>      
			</div>
		</div>
	</div>
</body>

</html>
