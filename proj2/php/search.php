<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">


<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
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
			<div id="top-navigation">
				<ul>
        			<li><a href="proj2.html">Home</a></li>
					<li><a href="
					

				</ul>
			</div>
		<h3>Here is your information which you need:</h3>
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
    
				$psought_string = implode("||", $_POST['position']);
	 			$alevel_string = implode("||", $_POST['level']); 
				$language_string = implode("||", $_POST['language']);
				$course_string = implode("||", $_POST['course']);				
	 			$job_string = implode("||", $_POST['job']); 
				
				if(!($db = mysqli_connect($server, $user, $password, $database))) {
                			die('SQL ERROR: Connection failed '.mysqli_error($db));
					
			SELECT col,col2 FROM student
			WHERE gpa>= ($data['gpa'])	AND 
			position= ($data['position']) AND
			level= ($data['level']) AND
			language =($data(	AND
			corurse = ($	AND
			job
		?>
		</div>
	</div>
	</div>
</body>

</html>
