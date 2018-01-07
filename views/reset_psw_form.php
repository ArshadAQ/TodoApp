<!-- Modal -->
    <div class="modal fade" id="ResetModal" role="dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" id="closeResetModal" class="close" data-dismiss="modal">&times;</button>
            <h4>Reset Password</h4>
          </div>
          <?php if(isset($pwd) && isset($email)) :?>
          <div class="modal-body" style="margin-top:-10px">
          <?php else: ?>
            <div class="modal-body">
          <?php endif; ?>
            <div id="reseterror" class="alert alert-danger fade in">
               <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
               <strong>Error!</strong><br><span></span>
            </div>
            <form role="form" action="reset_psw.php" method="POST">
              <?php if(isset($pwd) && isset($email)) :?>
                <div class="form-group" style="height:0px">
                  <input type="password" style="display:none" class="form-control" name="pwd_curr" id="psw" value="<?=$pwd?>" placeholder="Current Password">
                </div>
                <div class="form-group" style="display:none">
                    <input class="form-control" type="text" name="email" placeholder="Email" value="<?=$email?>">
                </div>
            <?php else: ?>
              <div class="form-group">
                  <input type="password" class="form-control" name="pwd_curr" id="psw" placeholder="Current Password">
                </div>
                <div class="form-group" style="display:none">
                    <input class="form-control" type="text" name="email" placeholder="Email">
                </div>
            <?php endif; ?>

                <div class="form-group">
                  <input type="password" class="form-control" name="pwd_new" id="psw" placeholder="New Password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="pwd_confirm" id="psw" placeholder="Confirm Password">
                </div>
                   <button type="submit" name="submit" class="btn btn-success btn logsub"><span class="glyphicon glyphicon-user"></span> Reset</button>
            </form>
          </div>
        </div>
        
      
    </div> 
    <script>
      $(function(){
        $("#ResetModal").modal();


        var emp = "<?php if(isset($_GET['reset'])) echo $_GET['reset'] ?>";
          if(emp=="empty"){
           $("#ResetModal").modal();
           $("#reseterror").fadeIn(200);
           $("#reseterror").children("span").html("Fields cant be left empty");
          }

          if(emp=="mismatch"){
           $("#ResetModal").modal();
            $("#reseterror").fadeIn(200);
            $("#reseterror").children("span").html("Password mismatch");
          }

          if(emp=="same"){
           $("#ResetModal").modal();
           $("#reseterror").fadeIn(200);
           $("#reseterror").children("span").html("New Password cannot be same");
          }

          if(emp=="invalid"){
           $("#ResetModal").modal();
           $("#reseterror").fadeIn(200);
           $("#reseterror").children("span").html("Invalid password");
          }



      });
      $("#closeResetModal").click(function(){
        $("#ResetModal").fadeOut(200);
        window.location.href='../';

    });
    </script>