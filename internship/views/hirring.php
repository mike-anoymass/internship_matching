<?php
    $job = new JobView();
    $jobs = $job->getAll();
?>
<section id="content">
   
    <div class="container content">     
    <!-- Service Blcoks -->
    <?php  if ($jobs) { ?>
        <table id="dash-table" class="table table-hover">
            <thead>
                <th>Job Title</th>
                <th>Company</th>
                <th>Location</th>
                <th>Status</th>
                <th>Date Posted</th>
            </thead>
            <tbody>
                <?php
            foreach ($jobs as $job) {
                echo '<tr>';
                echo '<td><a href="index.php?q=viewjob&search='.'1'.'">'.$job['title'].'</a></td>';
                echo '<td>'.$job['name'].'</td>';
                echo '<td>'.$job['location'].'</td>';
                echo '<td>'.$job['status'].'</td>';
                echo '<td>'.$job['date'][0].'</td>';
                echo '</tr>';

            }
                ?> 
            </tbody>
        </table>
    <?php
        }else{
            echo "<h4>:Applications are not available</h4>";
        }
    ?>    
        
    </div>
</section> 