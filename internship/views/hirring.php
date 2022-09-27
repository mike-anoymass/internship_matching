<?php
    $job = new JobView();
    $jobs = $job->getAll();

    if(isset($_GET['search'])){
        $company_id = $_GET['search'];
        $job = new JobView();
        $jobs = $job->get($company_id);
    }

    if(isset($_GET['applicant'])){
        $appli = new InternView;
        $applica = $appli->get($_GET['applicant']);

        $job = new JobView();
        $jobs = $job->getJobForThisCategory($applica['field']);
    }


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
                <th>Category</th>
                <th>Status</th>
                <th>Date Posted</th>
            </thead>
            <tbody>
                <?php
            foreach ($jobs as $job) {
                echo '<tr>';
                echo '<td><a href="views/intern/index.php?view=view_vacancy&id='.$job["id"][0].'">
                        '.$job['title'].'</a>
                       </td>';
                echo '<td>'.$job['name'].'</td>';
                echo '<td>'.$job['location'].'</td>';
                echo '<td>'.$job['field'].'</td>';
                echo '<td>'.$job['status'].'</td>';
                echo '<td>'.$job['date'][0].'</td>';
                echo '</tr>';

            }
                ?> 
            </tbody>
        </table>
    <?php
        }else{
            echo "<h4>:Vacancies are not available</h4>";
        }
    ?>    
        
    </div>
</section> 