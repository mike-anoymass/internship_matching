<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $appl = new InternView();
        $applicant = $appl->get($id);
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
              <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </div>
          </div>

          <hr>
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1">Resumes & Certificates</span>
                 |Attachments
                </p>
                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded mb-2" style="height: 5px;">
                  <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                    aria-valuemin="0" aria-valuemax="100"></div>
                </div>
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
