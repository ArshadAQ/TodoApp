<?php
	require("../includes/dbh.inc.php");
	require("../includes/config.php");

	$id = $_SESSION['u_id'];


	if($_GET['data']=='check'){

		$sql = "SELECT * from U".$id."check;";
	}

	if($_GET['data']=='tags'){

		$sql = "SELECT * from U".$id."tags;";
	}
	$arr = array();
	$result = mysqli_query($conn,$sql);
	while($row = mysqli_fetch_assoc($result))
		array_push($arr,$row);
	echo json_encode($arr);
?>