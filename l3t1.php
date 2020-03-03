<?php
	ob_start();
	session_start();
	if($_SESSION['name']!="arik"){
		header('location: admin_login.php');
	}
	include('conection.php');
	if(isset($_POST['submit'])){
		
		try{
			if(empty($_POST['std_id'])){
				throw new Exception("NO STUDENT ID");
			}
			else if(empty($_POST['cse_210'])){
				
                throw new Exception("No marks for CSE-301");
            }
            else if(empty($_POST['cse_211'])){
                throw new Exception("No marks for CSE-302");
            }
			else if(empty($_POST['cse_212'])){
                throw new Exception("No marks for CSE-303");
            }
            else if(empty($_POST['cse_213'])){
                throw new Exception("No marks for CSE-304");
            }
			else if(empty($_POST['cse_215'])){
                throw new Exception("No marks for CSE-305");
            }
            else if(empty($_POST['cse_216'])){
                throw new Exception("No marks for CSE-306");
            }
			else if(empty($_POST['cse_217'])){
                throw new Exception("No marks for CSE-307");
            }
            else if(empty($_POST['cse_220'])){
                throw new Exception("No marks for CSE-308");
            }
			else if(empty($_POST['math_247'])){
				throw new Exception("No marks for CSE-309");
			}
			else if($_POST['cse_210']>100 || $_POST['cse_210']<0){
				throw new Exception("Invalid cse_301 marks");
			}
			else if($_POST['cse_211']>100 || $_POST['cse_211']<0){
				throw new Exception("Invalid cse_302 marks");
			}
			else if($_POST['cse_212']>100 || $_POST['cse_212']<0){
				throw new Exception("Invalid cse_303 marks");
			}
			else if($_POST['cse_213']>100 || $_POST['cse_213']<0){
				throw new Exception("Invalid cse_304 marks");
			}
			else if($_POST['cse_215']>100 || $_POST['cse_215']<0){
				throw new Exception("Invalid cse_305 marks");
			}
			else if($_POST['cse_216']>100 || $_POST['cse_216']<0){
				throw new Exception("Invalid cse_306 marks");
			}
			else if($_POST['cse_217']>100 || $_POST['cse_217']<0){
				throw new Exception("Invalid cse_307 marks");
			}
			else if($_POST['cse_220']>100 || $_POST['cse_220']<0){
				throw new Exception("Invalid cse_308 marks");
			}
			else if($_POST['math_247']>100 || $_POST['math_247']<0){
				throw new Exception("Invalid cse_309 marks");
			}
			$cgpa=result();
			$formattedNum=number_format($cgpa,2);
			$result=("update tbl_student_l3t1 set cse_301='$_POST[cse_210]',cse_302='$_POST[cse_211]',cse_303='$_POST[cse_212]',cse_304='$_POST[cse_213]',cse_305='$_POST[cse_215]',cse_306='$_POST[cse_216]',cse_307='$_POST[cse_217]',cse_308='$_POST[cse_220]',cse_309='$_POST[math_247]',cgpa='$formattedNum' where id='$_POST[std_id]'");
			if(mysqli_query($connection,$result)){
				$msg="data saved successfully";
			}
			else{
				die('Query problem'.mysqli_error($connection));
			}
			
			
		}
		catch(Exception $e){
			$error=$e->getMessage();
		}
	}
	function result(){
				
					return ((grade_point($_POST['cse_210'])*1.5)+(grade_point($_POST['cse_211'])*3)+(grade_point($_POST['cse_212'])*.75)+(grade_point($_POST['cse_213'])*3)+(grade_point($_POST['cse_215'])*3)+(grade_point($_POST['cse_216'])*1.5)+(grade_point($_POST['cse_217'])*3)+(grade_point($_POST['cse_220'])*.75)+(grade_point($_POST['math_247'])*3))/19.50;
			
				
			}
	function grade_point($m){
		$number=$m;
		if($number<40){
			
			return 0.00;
		}
		else if($number>=40 && $number<45){
			
			return 2.00;
		}
		else if($number>=45 && $number<50){
			
			return 2.25;
		}
		else if($number>=50 && $number<55){
			
			return 2.50;
		}
		else if($number>=55 && $number<60){
			
			return 2.75;
		}
		else if($number>=60 && $number<65){
			
			return 3.00;
		}
		else if($number>=65 && $number<70){
			
			return 3.25;
		}
		else if($number>=70 && $number<75){
			
			return 3.50;
		}
		else if($number>=75 && $number<80){
			
			return 3.75;
		}
		else if($number>=80 && $number<101){
			
			return 4.00;
			
		}
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
			<h1>Wellcome to admin pannel</h1>
			
				<div>
					<a href="register_new_std.php"><input type="submit" name="submit1" value="Register A New Student"></a>
					<a href="result_add.php"><input type="submit" name="submit2" value="Result Calculation"></a>
					<a href="admin_chng_pass.php"><input type="submit" name="submit3" value="Change Password"></a>
					<a href="see_all.php"><input type="submit" name="submit4" value="All student"></a>
				</div>
        <div>
		<div>
			<h1>Chose Department</h1>
            
			
				<div>
					<div>
						<a href="cse.php"><input type="submit" name="submit1" value="CSE"></a>
						<input type="submit" name="submit2" value="EEE">
						
						<input type="submit" name="submit3" value="CE">
						<input type="submit" name="submit4" value="DBA">
				
					</div>
					
				</div>
			
			
        </div>
        <div>
            
			<h1>Chose The Level and Term</h1>
				<div>
						<a href=""><input type="submit"  value="L-1,T-1"></a>
						<a href=""><input type="submit"  value="L-1,T-2"></a>
						<a href=""><input type="submit"  value="L-2,T-1"></a>
						<a href="l2t2.php"><input type="submit" value="L-2,T-2"></a>
						<a href=""><input type="submit" value="L-3,T-1"></a>
						<a href=""><input type="submit" value="L-3,T-2"></a>
						<a href=""><input type="submit" value="L-4,T-1"></a>
						<a href=""><input type="submit" value="L-4,T-2"></a>
					</div>
				<div>
					<form action="" method="post">
					<?php 
						if(isset($error)){
						echo $error;
						}
						if(isset($msg)){
							echo $msg;
						}
					?>
						<table>
							<tr>
								<th>Course</th>
								<th>Marks(100)</th>
							</tr>
							<tr>
								<td>Enter the Student ID</td>
								<td><input type="text" name="std_id"></td>
							</tr>
							<tr>
								<td>CSE-301 [ Database Managment System ] : </td>
								<td><input type="text" name="cse_210"></td>
							</tr>
							<tr>
								<td>CSE-302 [ Database Managment System Sessional ] : </td>
								<td><input type="text" name="cse_211"></td>
							</tr>
							<tr>
								<td>CSE-303 [ Compiler ] : </td>
								<td><input type="text" name="cse_212"></td>
							</tr>
							<tr>
								<td>CSE-304 [ Compiler Sessional ] : </td>
								<td><input type="text" name="cse_213"></td>
							</tr>
							<tr>
								<td>CSE-305 [ Microprocessor & Microcontroller ] :  </td>
								<td><input type="text" name="cse_215"></td>
							</tr>
							<tr>
								<td>CSE-306 [ Microprocessor & Microcontroller Sessional ] :</td>
								<td><input type="text" name="cse_216"></td>
							</tr>
							<tr>
								<td>CSE-307 [ Operating System ] : </td>
								<td><input type="text" name="cse_217"></td>
							</tr>
							<tr>
								<td>CSE-308 [ Operating System Sessional ] : </td>
								<td><input type="text" name="cse_220"></td>
							</tr>
							<tr>
								<td>CSE-309 [ Computer Network) ] : </td>
								<td><input type="text" name="math_247"></td>
							</tr>
							
							<tr>
								<td></td>
								<td><input type="submit" name="submit" value="Submit"></td>
							</tr>
						</table>
						<?php
							
						?>
					</form>
				</div>
			
			<a href="admin_logout.php">Logout</a>
        </div>
    </body>
</html>
