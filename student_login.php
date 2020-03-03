<?php
	 include('conection.php');
	if(isset($_POST['submit'])){
        try{
            if(empty($_POST['username'])){
                throw new Exception("User name field cannot be empty");
            }
            if(empty($_POST['password'])){
                throw new Exception("Password field cannot be empty");
            }
            
            $result=  mysqli_query($connection,"select * from tbl_student_l3t1 where id='$_POST[username]' and password='$_POST[password]'" );
            $num= mysqli_num_rows($result);
            if($num>0)
            {
                session_start();
				$row=mysqli_fetch_assoc($result);
                $_SESSION['name']="rafid";
				$_SESSION['std_name']=$row['name'];
				$_SESSION['id']=$row['id'];
				$_SESSION['dept']=$row['dept'];
				$_SESSION['level']=$row['level'];
				$_SESSION['term']=$row['term'];
				$_SESSION['gender']=$row['gender'];
				$_SESSION['phone']=$row['phone'];
				$_SESSION['password']=$row['password'];
				$_SESSION['password']=$row['password'];
				$_SESSION['cse_210']=$row['cse_301'];
				$_SESSION['cse_211']=$row['cse_302'];
				$_SESSION['cse_212']=$row['cse_303'];
				$_SESSION['cse_213']=$row['cse_304'];
				$_SESSION['cse_215']=$row['cse_305'];
				$_SESSION['cse_216']=$row['cse_306'];
				$_SESSION['cse_217']=$row['cse_307'];
				$_SESSION['cse_220']=$row['cse_308'];
				$_SESSION['math_247']=$row['cse_309'];
				$_SESSION['cgpa']=$row['cgpa'];
                header('location: student_profile.php');
            }
            else{
                throw new Exception("Incorrect username or password");
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
            <div class="header">
                <div class="logo">
                    <img src="img/logo.gif">
                </div>
                <div class="name">
                    <h1>Bangladesh Army International University of Science & Technology</h1>
                    <p>Comilla Cantonment, Comilla.</p>
                    
                </div>
            </div>
            <div class="nav">
                <ul>
                    <li><a href="student_login.php">Student Login</a></li>
                    <li><a href="admin_panel.php">Admin Panel</a></li>
                </ul>
            </div>
            <div class="std">    
                <h1>Student login</h1>
            </div>
            <hr>
			<?php
                   if(isset($error)){
                       echo $error;
                   }
                ?>
            <div class="loginBox">
                
                
                <br/>
                <form action="" method="post">
                    <table>
                        <tr>
                            <td>Enter Username(id): </td>
                            <td><input type="text" name="username"></td>
                        </tr>
                        <tr>
                            <td>Enter Password: </td>
                            <td><input type="password" name="password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" name="submit" value="login"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>