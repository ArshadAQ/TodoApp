<?php
	// usage of require is more suitable
	require("../includes/config.php");
	/*this if statement is done so that  the user cannot directly use the url to see the php code , with name "submit" whether its clicked or not*/
	if (isset($_POST['submit'])) 
	{
		//include_once 'dbh.inc.php'; 
		/*this is to make sure that they dont write code inside the block*/
		$first=mysqli_real_escape_string($conn,$_POST['first']);
		$last=mysqli_real_escape_string($conn,$_POST['last']);
		$email=mysqli_real_escape_string($conn,$_POST['email']);
		$uid=mysqli_real_escape_string($conn,$_POST['uid']);
		$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);

		//Error handlers
		//Check if everything filled out
		if (empty($first) ||  empty($email) ||  empty($uid) ||  empty($pwd)) 
		{
			/*redirection*/
		header("Location: ../index.php?signup=empty");
		exit(); /*closes the script*/

		}
		else
		{
			//check if input characters are valid
			if (!preg_match("/^[a-zA-Z]*$/",$first) ||!preg_match("/^[a-zA-Z]*$/",$last))
			{

				header("Location: ../index.php?signup=invalid");
				exit(); /*closes the script*/
			}
			else
			{
				//check if email is valid
				if (!filter_var($email,FILTER_VALIDATE_EMAIL))
				{
					header("Location: ../index.php?signup=email");
					exit(); /*closes the script*/
				} 
				
				// more succint way of doing the above operation
				else
				{
					//hashing the password 
					$hashedpwd=password_hash($pwd,PASSWORD_DEFAULT);

					$sql="INSERT IGNORE into user (user_first,user_last,user_email,user_uid,user_pwd) VALUES ('$first','$last','$email','$uid','$hashedpwd');";
					mysqli_query($conn,$sql);
					$row = mysqli_affected_rows($conn);
					if($row != 1)
						header("Location: ../index.php?signup=exists");// throw error - username/email already exists
					else
					{
						$sql="SELECT * FROM user WHERE user_uid='$uid'";
						$result=mysqli_query($conn,$sql);	
						$row=mysqli_fetch_assoc($result);
						$sql2 = "CREATE TABLE U".$row['user_id']."count(".
								"id int(4) PRIMARY KEY AUTO_INCREMENT,".
								"title varchar(50),".
								"deadline datetime,".
								"type varchar(20) );";
						mysqli_query($conn,$sql2);
						$sql3 = "CREATE TABLE U".$row['user_id']."check(".
								"id int(4) PRIMARY KEY AUTO_INCREMENT,".
								"title varchar(50),".
								"done int(1),".
								"tag int(3) );";
						mysqli_query($conn,$sql3);
						$sql2 = "CREATE TABLE U".$row['user_id']."tags(".
								"id int(4) PRIMARY KEY AUTO_INCREMENT,".
								"name varchar(20) UNIQUE );";
						mysqli_query($conn,$sql2);
						$sqls="CREATE TABLE U".$row['user_id']."sch(".
								"id int(4) PRIMARY KEY AUTO_INCREMENT,".
								"title varchar(20),".
								"datee date,".
								"timee time);";
						mysqli_query($conn,$sqls);
						$_SESSION['u_id']=$row['user_id'];
						$_SESSION['u_first']=$row['user_first'];
						$_SESSION['u_last']=$row['user_last'];
						$_SESSION['u_email']=$row['user_email'];
						$_SESSION['u_uid']=$row['user_uid'];

						redirect("/index.php");
					}
				}

			}

		}

	}
	else
	{ 
		// else render form
	    // render("index.php",["title" => "Signup"]);
	    redirect("/index.php");
	}
?>
