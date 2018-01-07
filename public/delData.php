<?php
	// session_start();
	// require("../includes/dbh.inc.php");

	require("../includes/config.php");

	$id = $_SESSION['u_id'];


	if($_GET['data']=='done')
	{
		$t = $_GET['tag'];
		$sql = "DELETE from U".$id."check where done=-1 and tag='".$t."';";

	}
	if($_GET['data']=='tag')
	{
		$t = $_GET['tag'];
		$sql = "DELETE from U".$id."tags where id='".$t."';";
		if(mysqli_query($conn,$sql))
		echo "yes";
		$sql = "DELETE from U".$id."check where tag='".$t."';";
	}

	echo $sql;
	if(mysqli_query($conn,$sql))
	echo "yes";
?>