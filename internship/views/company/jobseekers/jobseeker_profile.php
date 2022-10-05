<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $appl = new InternView();
        $applicant = $appl->get($id);


        $attachments = $appl->getAttachments($id);
?> 

<section style="background-color: white;">
  <div class="container py-5">
    <div class="row">
        <div class="box-header with-border">
            <h3 class="box-title">
                <a class="text-danger" title="Back to Vacancies" href="index.php?view=jobseekers">
                    <i class="fa fa-arrow-left"></i>
                </a>
                |
                Profile
            </h3> 
            <!-- /.box-tools -->
        </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img
                src="<?php echo '/internship/views/intern/pictures/'.$applicant['picture']?>"
                alt="No Profile Picture" class="img-thumbnail" style="width: 160px;">
                
            <h5 class="my-3"><?php echo $applicant['firstname'].' '. $applicant["lastname"] ;?></h5>
            <p class="text-muted mb-1"><?php echo $applicant['about']; ?></p>
            <div class="d-flex justify-content-center mb-2">
              <button type="button" class="btn btn-outline-primary ms-1" data-target="#messagemodal"  data-toggle="modal">
                Message
            </button>
            </div>
          </div>

          <hr>
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">Resumes & Certificates</span>
                 |Attachments
                </p>

                <p class="mb-1" style="font-size: .99rem;">Curriculum Vitae</p>
                <a href=<?php echo "/internship/views/intern/cvs/".$applicant['cv'] ?> >
                    <div class="progress rounded" style="height: 5px;">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100">Open</div>
                    </div>
                </a>
                       
                <?php
                    if($attachments){
                        foreach($attachments as $attach){
                    ?>
                        <p class="mb-1" style="font-size: .99rem;"><?php echo $attach['name'] ?></p>
                        <a href=<?php echo "/internship/views/intern/documents/".$attach['document'] ?> >
                            <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="80"
                                    aria-valuemin="0" aria-valuemax="100">Open</div>
                            </div>
                        </a>

                <?php   
                     }
                    }else{
                        echo "<p>: Other Attachments Not Found</p>";
                    }
                ?>
               
              </div>
            </div>
        
        </div>
      
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
                    <?php echo $applicant['firstname'].' '. $applicant["lastname"] ;?>
                </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
                    <?php echo $applicant['gender'] ?>
                </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Program of Study</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
                    <?php echo $applicant['program'] ?>
                </p>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Field of Study</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
                    <?php echo $applicant['field'] ?>
                </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Graduated In</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
                    <?php echo $applicant['graduation_year'] ?>
                </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
                    <?php echo $applicant['email'] ?>
                </p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $applicant['phone'] ?></p>
              </div>
            </div>
           
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Status</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $applicant['status'] ?></p>
              </div>
            </div>

            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Registered On</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $applicant['date'] ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          
        </div>
      </div>
    </div>
  </div>
</section>

<?php }else{
        echo "record not found";
    }
?>



<div class="modal" id="messagemodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <span type="button" class="close fa fa-close" data-dismiss="modal"></span>
                    <h4>Compose Message</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-default" style="margin-top:6px">
                
                    <section class="panel-body">
                        <form id="message-data">

                            <div class="row mt-3">
								<div class="col-md-12">
									<div class="form-group">
										<label for="exampleInputEmail1">Subject: </label>
										<input type="text" class="form-control" name="subject"
                                         id="subject" required>
									</div>
								</div>

                            </div>
                            <div class="row mt-3">
								<div class="col-md-12">
									<div class="form-group">
										<label for="exampleInputPassword1">Message Body:</label>
										<textarea class="form-control"
                                        id="body" name="body" required></textarea>
									</div>
								</div>
							</div>

                            <input type="hidden" value="<?php echo $applicant['id'] ?>" name="applicant">

                            <button type="submit" id="message-btn" class="btn btn-primary btn-block">
                               <i class="fa fa-send"></i> Send
                            </button>
                        </form>
                    </section>
                </div>
            </div>
    </div>

</div>
</div>
