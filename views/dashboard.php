<div class="dcontent container">
      <h3 class="greet">
          <?php 
        			date_default_timezone_set('Asia/Kolkata');
        			$t = date('H');
        			if($t>=0 && $t<12 )
        				echo "Good Morning\t";
        			elseif ($t>=12 && $t<16) 
        			 	echo "Good Afternoon\t";
        			 elseif ($t>=16 && $t<20)
        			 	echo "Good Evening\t";
        			 else
        			 	echo "Good Night\t";


        			if(isset($_SESSION['u_first']))
         			echo $_SESSION['u_first'] 
            ?> 
      </h3>
      <ul class="nav nav-pills">
          <li><a data-toggle="tab" id="t1" href="#home"></span>To-Do</a></li>
      </ul>

<div class="tab-content">
          
