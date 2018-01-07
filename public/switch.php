<?php
   // require("../includes/dbh.inc.php");
   // session_start();

   require("../includes/config.php");
   $id = $_SESSION['u_id'];

  if($_GET['data']=='check')
  {
    $t = $_GET['id'];
    $sql = "UPDATE U".$id."check".
           " SET done=-1 WHERE id = '".$t."';";
            echo $sql;

            if(mysqli_query($conn,$sql))
              echo "yes";
  }


    
?>