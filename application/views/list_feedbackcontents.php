<?php include_once('header.php');?>
<style type="text/css">
.myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

.myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 200px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: scroll; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 50%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 150px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}
}
</style>		
<section class="w-100 float-left wrap-signup pt-3 pb-5">
      <div class="container">
            <?php
                  if(isset($page_access) && $page_access=='ACTIVE'){
            ?>	
            <div class="row">
                  <div class="col-lg-12 float-left page-title-top mt-3">
                        <h1>Feedback Content List</h1>
                  </div>
                  <div class="col-lg-12 float-left">
                        <?php if ($this->session->userdata('success')) { ?>
                        <div class="alert alert-success w-100 float-left">
                            <?php echo $this->session->userdata('success');?>
                        </div>
                        <?php }?>
                        <?php if ($this->session->userdata('error')) { ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->userdata('error');?>
                        </div>
                        <?php }?>   
                  </div>
                  <div class="col-lg-12 float-left mt-4">
                        <div class="table-responsive">
                              <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                          <tr>
                                                <th>SL No.</th>
                                                <th>Content Name</th>
                                                <th>Details</th>
                                                <th>Video</th>
                                                <th>Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          
                                          <?php
                                                if(isset($datas) && count($datas)>0){
                                                      $i=1; 
                                                      foreach ($datas as $ukey => $uvalue) {
                                          ?>

                                          <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo isset($uvalue['slider_name']) ? $uvalue['slider_name'] : '';?></td>
                                                <td>
                                                      <?php 
                                                            if(isset($uvalue['details']['given_by'])){
                                                                echo 'Given By: '.$uvalue['details']['given_by'].'<br>';
                                                            }else{
                                                                  echo 'NA';
                                                            }
                                                      ?>
                                                      
                                                </td>
                                                <td>
                                                      <?php echo isset($uvalue['image_name']) ? $uvalue['image_name'] : 'NA';?>
                                                </td>
                                                <td>
                                                      <a href="<?php echo base_url('content_management/remove_feedback_content/'.base64_encode($uvalue['id']));?>"><i class="fa fa-trash" style="font-size:12px;color:red"></i></a>                                                      
                                                </td>
                                          </tr>
                                          <?php $i++;}}else{?>
                                          <tr><td colspan="5">No Record !!</td></tr>
                                          <?php }?>
                                    </tbody>
                              </table>
                        </div>	
                  </div>
            </div>
            <?php }else{ echo 'OOPS!! Something went wrong. Try again after sometime';}?>
      </div>
</section>
<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<?php include_once('footer.php');?>
<script>
// Get the modal

var ct = <?php echo count($datas);?>;
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption

for (var i = 0; i < ct; i++){
  var img = document.getElementsByClassName("myImg")[i];
  var modalImg = document.getElementById("img01");
  var captionText = document.getElementById("caption");
  img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() { 
    modal.style.display = "none";
  }
}
</script>



			