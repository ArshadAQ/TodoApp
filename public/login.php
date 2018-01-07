<?php
	require("../includes/config.php");
	// echo "Hi3";

	if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        redirect("index.php");
       	// echo "hi";
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	if (isset($_POST['submit1'])) 
		{
			//include 'dbh.inc.php';
		   	$uid=mysqli_real_escape_string($conn,$_POST['uid']);
			$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
			//Error handlers
			//Check if inputs empty
			if(empty($uid) || empty($pwd))
			{
					header("Location: ../index.php?login=empty");
					exit();
			}
			else
			{
				$sql1="SELECT * FROM user WHERE user_uid='$uid' OR user_email='$uid'";
				$result1=mysqli_query($conn,$sql1);
				$resultCheck=mysqli_num_rows($result1);
				if ($resultCheck<1) 
				{

					header("Location: ../index.php?login=error");
					exit();
				}
				else
				{
					if ($row=mysqli_fetch_assoc($result1)) 
					{

						//De-hashing

						$hashedpwdcheck=password_verify($pwd,$row['user_pwd']);
						if($hashedpwdcheck == false)
						{
							header("Location: ../index.php?login=error");
							exit();
						}
						elseif ($hashedpwdcheck==true) 
						{
							//Log in the user here
							$_SESSION['u_id']=$row['user_id'];
							$_SESSION['u_first']=$row['user_first'];
							$_SESSION['u_last']=$row['user_last'];
							$_SESSION['u_email']=$row['user_email'];
							$_SESSION['u_uid']=$row['user_uid'];
							
							//header("Location:../index.php");
							// echo "hi1";
							redirect("/index.php");
							//exit();
						}
					}
				}
			}
		}
		else
		{

			redirect("/index.php");
			// echo "Hi2";
		}
    }

	

?>
