
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.css" />
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap-social.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <!-- Trigger the modal with a button -->

    <button type="button" class="btn btn-default btn-lg" id="LogBtn">Login</button>

    <!-- Modal -->
    <div class="modal fade" id="LogModal" role="dialog">

    	<style>
    		.text{
    			position: relative;
			    top: -2px;
			    z-index: 6;
			    padding: 0 20px;
			    background: #fff;
			    font-weight:lighter;
			    font-size:15px;
    		}
    		.line::after{
    			position: absolute;
			    left: 0;
			    bottom: 70px;
			    width: 100%;
			    height: 1px;
			    background: #c8c8c8;
			    content: '';
			    z-index: 5;
    		}
    	</style>
     
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4>Login</h4>
          </div>
          <div class="modal-body">
            <div id="logerror" class="alert alert-danger fade in">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Error!</strong><br><span></span>
            </div>
            <form id="f1" name="f1" role="form" action="login.php" method="POST">
              <div class="form-group">
                <input type="text" class="form-control" name="uid" id="usrname" placeholder="Enter email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="pwd" id="psw" placeholder="Enter password">
              </div>
                 <button type="submit" name="submit1" class="btn btn-success btn logsub"><span class="glyphicon glyphicon-user"></span> Login</button>
<!--             </form> -->
                   </form>
          </div>
        </div>
        
      
    </div> 
    <button type="button" class="btn btn-default btn-lg" id="RegBtn">Register</button>

    <!-- Modal -->
    <div class="modal fade" id="RegModal" role="dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4>Register</h4>
            </div>
            <div class="modal-body">
                <div id="regerror" class="alert alert-danger fade in">
                   <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                   <strong>Error!</strong><br><span></span>
                </div>
                    <form role="form" action="signup.php" method="POST">
                    <div class="form-group">
                      <input class="form-control" type="text" name="first" placeholder="Firstname">
                   </div>
                    <div class="form-group">
                      <input class="form-control" type="text" name="last" placeholder="Lastname">
                    </div>
                     <div class="form-group">
                      <input class="form-control" type="text" name="email" placeholder="Email">
                    </div>
                     <div class="form-group">
                      <input class="form-control" type="text" name="uid" placeholder="Username">
                     </div>
                      <div class="form-group">
                    <input class="form-control" type="password" name="pwd" placeholder="Password">
                  </div>
                     <button type="submit" name="submit" class="btn btn-success btn regsub"><span class="glyphicon glyphicon-off"></span> Register</button>
                </form>
            </div>
        </div>

    </div> 

 
<script>
$(document).ready(function(){
    
    $("#LogBtn").click(function(){
        $("#LogModal").modal();
    });

    $("#RegBtn").click(function(){
        $("#RegModal").modal();
    });

    $("#ForgotBtn").click(function(){
        $("#LogModal").fadeOut(200);
        // $("#LogModal").hide();
    });

var emp = "<?php if(isset($_GET['signup'])) echo $_GET['signup'] ?>";
    if(emp=="empty"){
     $("#RegModal").modal();
     $("#regerror").fadeIn(200);
     $("#regerror").children("span").html("Fields cant be left empty");
    }

    if(emp=="invalid"){
     $("#RegModal").modal();
      $("#regerror").fadeIn(200);
      $("#regerror").children("span").html("Invalid Data");
    }

    if(emp=="email"){
     $("#RegModal").modal();
     $("#regerror").fadeIn(200);
     $("#regerror").children("span").html("Invalid Email");
    }

    if(emp=="exists"){
     $("#RegModal").modal();
     $("#regerror").fadeIn(200);
     $("#regerror").children("span").html("Username/Email already in use");
    }



    var log = "<?php if(isset($_GET['login'])) echo $_GET['login'] ?>";
    if(log=="empty"){
     $("#LogModal").modal();
     $("#logerror").fadeIn(200);
     $("#logerror").children("span").html("Fields cant be left empty");
    }

    if(log=="error"){
     $("#LogModal").modal();
     $("#logerror").fadeIn(200);
     $("#logerror").children("span").html("Invalid Credentials");
    }

    if(log=="pass"){
     $("#LogModal").modal();
     $("#logerror").fadeIn(200);
     $("#logerror").children("span").html("Invalid Password");
    }

    console.log(log);


    $(".close").click(function(){
       $(".modal").modal('hide');
    })
     
});
</script>
<style>
body{
   background:linear-gradient(to right, rgba(100, 43, 115, 1), rgba(198, 66, 110, 1)) no-repeat  fixed;
   background-image: url(/img/pen-calendar-to-do-checklist.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    overflow-y:hidden;
  }
  
</style>
