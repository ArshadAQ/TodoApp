<?php
	require("../includes/config.php");
	// render("../views/userprof_form.php",["title"=>"User Profile"]);

	$sql = "SELECT * FROM user WHERE user_id = ".$_SESSION['u_id'];
	$result = mysqli_query($conn, $sql);
	if($result)
	{
		$rows = mysqli_fetch_assoc($result);
		$details = $rows;
		// print_r($details);
		if(isset($_POST["ajax"]))
		{
			header('Content-Type: application/json');
			// echo json_encode(array("user_uid" => $details['user_uid'], "user_first" => $details['user_first'], "user_last" => $details['user_last'], "user_email" => $details['user_email']));
			echo json_encode($details);
		}
		else
			render("../views/userprof_form.php",NULL,["title"=>"User Profile", "details" => $details]);
	}
?>