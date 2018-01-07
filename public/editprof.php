<?php

	require("../includes/config.php");
	// echo "Hi3";
	// print_r($_POST);
	if ($_SERVER["REQUEST_METHOD"] == "GET")
    {

		redirect("/index.php");
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    	header('Content-Type: application/json');

    	$email = $_POST['email'];
    	$first = $_POST['first'];
    	$last = $_POST['second'];
    	//check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/",$first) ||!preg_match("/^[a-zA-Z\s]*$/",$last))
		{

			echo json_encode(array("msg" => "Invalid name!", "success" => "false"));
			exit(); /*closes the script*/
		}
		else if (!filter_var($email,FILTER_VALIDATE_EMAIL))
		{	
			//check if email is valid
			echo json_encode(array("msg" => "Invalid email!", "success" => "false"));
			exit(); /*closes the script*/
		}
		else
		{
			$id = $_SESSION['u_id'];
			// if($_POST['action'] == "cancel")
			// {
			// 	$sql = "SELECT * FROM user WHERE user_id = '$id';";
			// 	$result = mysqli_query($conn, $sql);
			// 	if($result)
			// 	{
			// 		$rows = mysqli_fetch_assoc($result);
			// 		echo json_encode(array("success" => "true", "details" => ));
			// 	}
			// 	else
			// 		echo json_encode(array("success" => "false"));
			// }

			$sql = "UPDATE user SET user_email = '$email', user_first ='$first', user_last ='$last' WHERE user_id = '$id';";
			// $sql = "UPDATE user SET user_email $_POST['email'], user_first = $_POST['first'], user_last = $_POST['second'] WHERE user_id = $_SESSION['u_id'];"
			// echo $sql;
			$result = mysqli_query($conn, $sql);
			if($result)
				echo json_encode(array("success" => "true"));
			else
				echo json_encode(array("msg" => "Email already associated with another account!", "success" => "false"));
		}
	}
	else
	{

// echo $_GET["provider"];
		redirect("/index.php");
		// echo "Hi2";
	}

?>