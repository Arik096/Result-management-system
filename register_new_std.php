<?php
	ob_start();
	session_start();
	if($_SESSION['name']!="arik"){
		header('location: admin_login.php');
	}
	include('conection.php');
	if(isset($_POST['submit'])){
		try{
			if(empty($_POST['name'])){
                throw new Exception("Name cannot be empty");
            }
			
            else if(empty($_POST['id'])){
                throw new Exception("ID cannot be empty");
            }
			else if(empty($_POST['dept'])){
                throw new Exception("Department cannot be empty");
            }
            else if(empty($_POST['level'])){
                throw new Exception("Level cannot be empty");
            }
			else if(empty($_POST['term'])){
                throw new Exception("Term cannot be empty");
            }
            else if(empty($_POST['gender'])){
                throw new Exception("Gender cannot be empty");
            }
			else if(empty($_POST['phone'])){
                throw new Exception("Phone cannot be empty");
            }
            else if(empty($_POST['password'])){
                throw new Exception("Password cannot be empty");
            }
			$result=("INSERT INTO tbl_student_l3t1(name,id,dept,level,term,gender,phone,password,cse_301,cse_302,cse_303,cse_304,cse_305,cse_306,cse_307,cse_308,cse_309,cgpa) VALUES('$_POST[name]','$_POST[id]','$_POST[dept]','$_POST[level]','$_POST[term]','$_POST[gender]','$_POST[phone]','$_POST[password]','0','0','0','0','0','0','0','0','0','0')");
			if(mysqli_query($connection,$result)){
				$msg="Data has been saved suuccesfully";
			}
			else{
				die('query problem'.mysqli_error($connection));
			}
			
			
		}
		catch(Exception $e){
			$error=$e->getMessage();
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
			<h1>Welcome to Admin Panel</h1>
			
				<div>
					<a href="register_new_std.php"><input type="submit" name="submit1" value="Register A New Student"></a>
					<a href="result_add.php"><input type="submit" name="submit2" value="Result Calculation"></a>
					<a href="admin_chng_pass.php"><input type="submit" name="submit3" value="Change Password"></a>
					<a href="see_all.php"><input type="submit" name="submit4" value="All student"></a>
				</div>
        <div>
            <form action="" method="post">
			<h1>Please fill up the form</h1>
			<?php
				if(isset($error)){
					echo $error;
				}
				if(isset($msg)){
					echo $msg;
				}
			?>
				<div>
					<table>
						<tr>
							<td>Name</td>
							<td><input type="text" name="name"></td>
						</tr>
						
						<tr>
							<td>ID</td>
							<td><input type="text" name="id"></td>
						</tr>
						<tr>
							<td>Department</td>
							<td><input type="text" name="dept"></td>
						</tr>
						<tr>
							<td>Level</td>
							<td><input type="text" name="level"></td>
						</tr>
						<tr>
							<td>Term</td>
							<td><input type="text" name="term"></td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>
								<select name="gender">
									<option>Select Gender</option>
									<option value="1">Male</option>
									<option value="2">Female</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Phone</td>
							<td><input type="text" name="phone"></td>
						</tr>
						<tr>
							<td>Password</td>
							<td><input type="password" name="password"></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="submit" value="Register"></td>
						</tr>
					</table>
				</div>
				
			</form>
			<a href="admin_logout.php">Logout</a>
        </div>
    </body>
</html>
