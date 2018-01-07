<?php 

	// require("../includes/dbh.inc.php");
	// session_start();

	require("../includes/config.php");

	$id = $_SESSION['u_id'];

	if($_GET['data']=='tag')
	{

		$t = $_GET['title'];
		if(strlen($t)>20)
		{
			$sql = "ALTER TABLE u".$id."tags"." "."MODIFY name varchar(100);";
			$result = mysqli_query($conn, $sql);
			echo $sql;
		}

		$t= implode(" ",explode("-",$t));
		$o = $_GET['old'];

		$sql = "UPDATE U".$id."tags".
			   " SET name='".$t."' WHERE id='".$o."';";
		echo $sql;

		if(mysqli_query($conn,$sql))
			echo "yes";
	}
?>