<?php
    $appl = new ApplicationView();
    $applications = $appl->getApplicationsFor(Session::get("userVars", 'id'));
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper"> 
    <!-- Main content -->
    <section class="content">
      <div class="row"> 
        <!-- /.col -->
        <?php if ($applications) {  ?>
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Applied Jobs</h3> 
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <table id="dash-table" class="table table-hover table-striped">
                  <thead> 
                    <tr>
                      <th>Job Title</th>
                      <th>Company</th>
                      <th>Location</th>
                      <th>Status</th>
                      <th>Applied On</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      foreach ($applications as $application) {
                        # code...
                          echo '<tr>';
                          echo '<td class="mailbox-attachment">'.$application['title'].' - '.$application['status'][1].'</td>';
                          echo '<td class="mailbox-attachment">'.$application['name'].'</td>';
                          echo '<td class="mailbox-attachment">'.$application['location'].'</td>';
                          echo '<td class="mailbox-attachment">'.$application['status'][0].'</td>';
                          echo '<td class="mailbox-attachment">'.$application['date'][0].'</td>';
                          echo '<td>
                                    <a class="button"
                                     href="index.php?view=view_vacancy&id='.$application["id"][1].'">
                                     See Details</a>
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
          echo "<h3 class='text-center'>:You did not apply for any jobs</h3>";          
        } ?>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>