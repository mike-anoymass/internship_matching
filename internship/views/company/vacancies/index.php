<?php 
    $j = new JobView();
    $jobs = $j->getAll();
?>

<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper"> 
    <!-- Main content -->
    <section class="content">
    <div class="box-header with-border">

             <h4>
                <a class="text-bold" title="New Vacancy" href="index.php?view=add_vacancy">
                    <i class="fa fa-plus fa-lg"></i>&nbsp; New Vacancy
                </a>
             </h4>
                <hr>
              <!-- /.box-tools -->
            </div>
      <div class="row"> 
        <!-- /.col -->
        <?php if ($jobs) {  ?>
        <div class="col-md-12">
          <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <table id="dash-table" class="table table-hover table-striped">
                  <thead> 
                    <tr>
                      <th>Title</th>
                      <th>Location</th>
                      <th>Category</th>
                      <th>Due Date</th>
                      <th>Date Posted</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      foreach ($jobs as $job) {
                        # code...
                          echo '<tr>';
                          echo '<td class="mailbox-attachment">'.$job['title'].'</td>';
                          echo '<td class="mailbox-attachment">'.$job['location'].'</td>';
                          echo '<td class="mailbox-attachment">'.$job['field'].'</td>';
                          echo '<td class="mailbox-attachment">'.$job['due_date'].'</td>';
                          echo '<td class="mailbox-attachment">'.$job['date'].'</td>';
                          echo '<td>
                                    <a class="button" title="Explore Vacancy" 
                                     href="index.php?view=view_vacancy&id='.$job["id"].'">
                                     <i class="fa fa-info fa-lg"></i></a>
                                     &nbsp
                                     <a class="text-warning" title="Edit Vacancy" 
                                     href="index.php?view=edit_vacancy&id='.$job["id"].'">
                                     <i class="fa fa-edit fa-lg"></i></a>
                                     &nbsp
                                     <a class="text-danger" title="Delete Vacancy" 
                                     id='.$job["id"].'>
                                     <i class="fa fa-trash fa-lg"></i></a>
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
          echo "<h3 class='text-center'>:Vacancies not available</h3>";          
        } ?>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   
 