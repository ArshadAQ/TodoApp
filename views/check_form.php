    
      <div id="home" class="tab-pane fade-in">
                <button type="button" class="btn btn-default btn-lg" id="AddChk"><span></span></button>
              <div class="modal fade mcheck" id="ChkModal" role="dialog">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Add Tags</h4>
                  </div>
                  <div class="modal-body ">
                      <input  class="tagname" type="text" placeholder="Enter Tag name"></input>
                      <button class="entertag">Add</button>
                  </div>

              </div>

              <div class="container checkhold">
                  <div id='row' class="row">
                  </div>
                  <span class='empty'>It's Empty here :( <br>Add Tags  by clicking the button <br><span class="glyphicon glyphicon-paperclip"></span></span>
              </div>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
  $(function(){

      $("#row").masonry({
                  itemSelector: '.tag',
                  percentPosition: true,
                  gutter: 20,
                  columnWidth: 300,
                  transitionDuration: 0
                });
    });
 </script>
 <script src="js/check.js"></script>
  
       

          