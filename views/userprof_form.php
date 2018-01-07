
  <script>
  function update()
  {
      details = document.getElementsByName("details");
      console.log(details[1]);
      $.ajax({
        method: "POST",
        url: "editprof.php",
        data: { email: details[1].value, first: details[2].value, second: details[3].value}
      })
      .done(function(msg) {
          // alert( "Data Saved: ");
          // var json = JSON.parse(msg);
          console.log(msg);
          console.log(msg["success"]);
          // $(".alert").fadeIn();
          if(msg["success"] == "false")
          {
              $("#alert1").addClass("alert alert-danger");
              $("#msg").html(msg["msg"]);
          }
          else
          {
              $("#alert1").addClass("alert alert-success");
              $("#msg").html(msg["msg"]);
          }
          $("#alert1").css('display', 'block');
      })
      .fail(function(msg){
          console.log("ajax error");
      });
  }
  function restore()
  {
      $.ajax({
          method: "POST",
          url: "userprof.php",
          data: {ajax: "true"}
      })
      .done(function(details) {
          console.log(details);
          // console.log(JSON.stringify(details)["user_email"]);
          // console.log(details['user_email']);
          $("#UserID3").val(details["user_uid"]);
          $("#inputEmail3").val(details["user_email"]);
          $("#firstName3").val(details["user_first"]);
          $("#LastName3").val(details["user_last"]);
      })
      .fail(function(){
          console.log("ajax error");
      });
  }
  </script>
  <style>
  /* Head */

    .acc-col{


      min-height: 300px;
      margin-top: 5%;
      margin-bottom: 5%;
      background-color: #ffffff;
      padding: 20px;
/*      border:#333 solid 1px;*/

    }
    .acc-col > h3{
      padding-bottom: 20px;
    }
    hr{
      border:solid 1px #d6d6d6;
    }
    section > form > div{

      padding: 5px;
    }
    .btn-div{

      margin-top:10px;
      padding-bottom: 10px;
    }

    
.ui-67 .ui-head{
  text-align:center;
  padding:30px 0px;
  position:relative;
  border-bottom:2px solid #fff;
  box-shadow:0px 0px 5px rgba(0,0,0,0.1);
  /*background-color: #1997c6;*/
  background-color: #5b9a78;
}
/* Details */
.ui-67 .ui-head .ui-details{
  margin:0px 0px 74px;
}
.ui-67 .ui-head .ui-details h3{
  color:#fff;
  font-size:40px;
  line-height:60px;
  font-weight:300;
}
@media (max-width:400px){
  .ui-67 .ui-head .ui-details h3{
    font-size:25px;
    line-height:40px;
    font-weight:400;
  }
}
.ui-67 .ui-head .ui-details h4{
  color:#fff;
  font-size:18px;
  line-height:38px; 
  font-weight:400;
}
/* Image */
.ui-67 .ui-head .ui-image{
  width:100%;
  position:absolute;
  bottom:-55px;
  z-index: 10;
}
.ui-67 .ui-head img{
  width:120px;
  border-radius:100%;
  margin:0px auto;
  border:4px solid #fff;
  box-shadow:0px 0px 15px rgba(0,0,0,0.1);
}

button{
  border-radius:25px !important;
}

.form-elements{
  margin-bottom:10px;
}

</style>

<div class="">
    <!-- UI - X Starts -->
    <div class="ui-67">
    
      <!-- Head Starts -->
      <div class="ui-head bg-lblue">
        <!-- Details -->
        <div class="ui-details">
          <!-- Name -->
          <h3 id="name-header"><?=$_SESSION['u_uid']?></h3>
          <!-- Designation -->
          <h4>User Profile</h4>
        </div>
        <!-- Image -->
        <div class="ui-image">
          <!-- User Image -->
          <!-- <span class="glyphicon glyphicon-user pull-right" class="img-responsive" width="100" height="100"></span> -->
          <!-- <img src="https://api.adorable.io/avatars/285/abott@adorable.png" alt="Profile Picture" class="img-responsive" width="100" height="100"> -->
          <img src="/img/user.svg" alt="Profile Picture" class="img-responsive" width="100" height="100">
        </div>
      </div>
      <!-- Head Ends -->
      
      <!-- Content Starts -->
      <div class="ui-content">

        <div class="row">
          
          <div class="col-sm-6 col-md-6 col-lg-6 col-lg-offset-3 acc-col">
            <section>
              <div id = "alert1" role="alert" style = "display:none">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <strong id = "msg">Update Successful!</strong> <!-- You should check in on some of those fields below. -->
              </div>
              <h3 style = "text-align:center">Edit Profile</h3>
              <form class="ng-pristine ng-valid" role="form">
                <!-- <div class="row">
                   <div class="col-sm-12">
                    <label for="inputName" class="control-label">Name:</label>
                      <input type="text" class="form-control" id="inputName">
                  </div>               
                </div> -->
                <div class="row">
                  <div class="col-sm-6 form-elements">
                    <label for="UserID3" class="control-label">User ID:</label>
                      <input name = "details" type="text" class="form-control" id="UserID3" value = "<?=$details['user_uid']?>" disabled>
                  </div>
                  <div class="col-sm-6 form-elements">
                    <label for="inputEmail3" class="control-label">Email:</label>
                      <input name = "details" type="email" class="form-control" id="inputEmail3" value = "<?=$details['user_email']?>">
                  </div>  
                </div>
                <div class="row">
                  <div class="col-sm-6 form-elements">
                    <label for="firstName3" class="control-label">First Name:</label>
                      <input name = "details" type="text" class="form-control" id="firstName3" value = "<?=$details['user_first']?>">
                  </div>
                  <div class="col-sm-6 form-elements">
                    <label for="lastName3" class="control-label">Last Name:</label>
                      <input name = "details" type="text" class="form-control" id="lastName3" value = "<?=$details['user_last']?>">
                  </div>  
                </div>

                  <div class = "row">
                    <div class = "col-sm-6">
                      <button type = "button" name = "update1" class="btn btn-success" onclick = "update()" style = "width:100%;">Update</button>
                    </div>
                    <div class = "col-sm-6">
                      <button type = "button" name = "cancel"  class="btn btn-danger" style = "width:100%; margin-top:10px" onclick = "restore()">Cancel</button>
                    </div>
                  </div>
                </form>   
            </section>


          </div>
          <!-- col-8 -->
        </div>

      </div>
      <!-- Content Ends -->
    </div>
    <!-- UI - X Ends -->
</div>