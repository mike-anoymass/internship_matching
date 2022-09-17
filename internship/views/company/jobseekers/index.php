<?php 
    $appl = new InternView();
    $applicants = $appl->getAll();
?>

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper"> 
    <!-- Main content -->
    <section class="content">
      <div class="row"> 
        <!-- /.col -->
        <?php if ($applicants) {  ?>
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Job Seekers</h3> 
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <table id="dash-table" class="table table-hover table-striped">
                  <thead> 
                    <tr>
                      <th>Name</th>
                      <th>Program of Study</th>
                      <th>Field of Study</th>
                      <th>Gender</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      foreach ($applicants as $applicant) {
                        # code...
                          echo '<tr>';
                          echo '<td class="mailbox-attachment">'.$applicant['firstname'].' '.$applicant['lastname'].'</td>';
                          echo '<td class="mailbox-attachment">'.$applicant['program'].'</td>';
                          echo '<td class="mailbox-attachment">'.$applicant['field'].'</td>';
                          echo '<td class="mailbox-attachment">'.$applicant['gender'].'</td>';
                          echo '<td>
                                    <a class="button"
                                     href="index.php?view=jobseeker_profile&id='.$applicant["id"].'">
                                     View Profile</a>
                                </td>';
                          echo '</tr>';
                      } 
                    ?>
       
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div> 
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <?php }else{
          echo "<h3 class='text-center'>:Applicants not available</h3>";          
        } ?>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   
 