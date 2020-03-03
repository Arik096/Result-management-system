<?php
	ob_start();
	session_start();
	if($_SESSION['name']!="rafid"){
		header('location: sdt_login.php');
	}
	include('conection.php');
	$grade="";
	$point=0.00;
	function course(){
		if($_SESSION['level']==3 && $_SESSION['term']==1){
			echo "CSE-301 [ Database Managment System ] : &nbsp;";
			tab();tab();tab();
			echo grade_count($_SESSION['cse_210'])."</br></br>";
			echo "CSE-302 [ Database Managment System Sessional ] : ";
			tab();tab();
			echo grade_count($_SESSION['cse_211'])."</br></br>";
			echo "CSE-303 [ Compiler ] : &nbsp;&nbsp;&nbsp;";
			tab();tab();tab();tab();tab();
			echo grade_count($_SESSION['cse_212'])."</br></br>";
			echo "CSE-304 [ Compiler Sessional ] : &nbsp;&nbsp;";
			tab();tab();tab();tab();
			echo grade_count($_SESSION['cse_213'])."</br></br>";
			echo "CSE-305 [ Microprocessor & Microcontroller ] :  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			tab();tab();
			echo grade_count($_SESSION['cse_215'])."</br></br>";
			echo "CSE-306 [ Microprocessor & Microcontroller Sessional ] :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			tab();
			echo grade_count($_SESSION['cse_216'])."</br></br>";
			echo "CSE-307 [ Operating System ] : &nbsp;&nbsp;&nbsp;&nbsp;";
			tab();tab();tab();tab();
			echo grade_count($_SESSION['cse_217'])."</br></br>";
			echo "CSE-308 [ Operating System Sessional ] :  &nbsp; &nbsp;";
			tab();tab();tab();
			echo grade_count($_SESSION['cse_220'])."</br></br>";
			echo "CSE-309 [ Computer Network ] : &nbsp;&nbsp;";
			tab();tab();tab();tab();
			echo grade_count($_SESSION['math_247'])."</br></br>";
		}
	}
	
	
		
	
	
	function grade_count($m){
		$number=$m;
		if($number<40){
			echo "F";
			$point=0.00;
		}
		else if($number>=40 && $number<45){
			echo "D";
			$point=2.00;
		}
		else if($number>=45 && $number<50){
			echo "C";
			$point=2.25;
		}
		else if($number>=50 && $number<55){
			echo "C+";
			$point=2.50;
		}
		else if($number>=55 && $number<60){
			echo "B-";
			$point=2.75;
		}
		else if($number>=60 && $number<65){
			echo "B";
			$point=3.00;
		}
		else if($number>=65 && $number<70){
			echo "B+";
			$point=3.25;
		}
		else if($number>=70 && $number<75){
			echo "A-";
			$point=3.50;
		}
		else if($number>=75 && $number<80){
			echo "A";
			$point=3.75;
		}
		else if($number>=80 && $number<101){
			echo "A+";
			$point=4.00;
		}
	}
	function tab(){
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	}
?>
<!DOCTYPE html>


<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
		<div>
			<div>
				<form action="" method="post">
					<table>
						<tr>
							<th>Name</th>
							<td><?php echo $_SESSION['std_name']; ?></td>
						</tr>
						
						<tr>
							<th>ID</th>
							<td><?php echo $_SESSION['id']; ?></td>
						</tr>
						<tr>
							<th>Department</th>
							<td><?php echo $_SESSION['dept']; ?></td>
						</tr>
						<tr>
							<th>Level</th>
							<td><?php echo $_SESSION['level'] ?></td>
						</tr>
						<tr>
							<th>Term</th>
							<td><?php echo $_SESSION['term']; ?></td>
						</tr>
						<tr>
							<th>Gender</th>
							<td><?php if($_SESSION['gender']==1)
									{
											echo "Male";
									} 
									else{
										echo "Female";
									}
								?>
							</td>
						</tr>
						<tr>
							<th>Phone</th>
							<td><?php echo $_SESSION['phone']; ?></td>
						</tr>
						
						
					</table>
					<div>
					<h1>Result</h1>
						<?php
							course();
						?>
					</div>
					<div>
						<table>
							<th>CGPA       :</th>
							<td>
								<?php echo $_SESSION['cgpa']?>
							</td>
							
						</table>
					</div>
				</form>
			</div>
				<a href="std_pass_change.php">Change Password</a>
			</div>
			
			<a href="std_logout.php">logout</a>
		</div>
    </body>
</html>
