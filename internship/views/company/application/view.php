<?php 
    $appl = new ApplicationView();
	$application = $appl->getApplicationOnce($_GET['id']); 
?> 
<style type="text/css">
.content-header {
	min-height: 50px;
	border-bottom: 1px solid #ddd;
	font-size: 20px;
	font-weight: bold;
}
.content-body {
	min-height: 350px;
	/*border-bottom: 1px solid #ddd;*/
}
.content-body >p {
	padding:10px;
	font-size: 12px;
	font-weight: bold;
	border-bottom: 1px solid #ddd;
}
.content-footer {
	min-height: 100px;
	border-top: 1px solid #ddd;

}
.content-footer > p {
	padding:5px;
	font-size: 15px;
	font-weight: bold; 
}
 
.content-footer textarea {
	width: 100%;
	height: 200px;
}
.content-footer  .submitbutton{  
	margin-top: 20px;
	/*padding: 0;*/

}
</style>
<div class="col-sm-12 content-header">
    <a class="text-danger" title="Back to Vacancies" href="index.php?view=jobseekers">
                    <i class="fa fa-arrow-left"></i>
    </a>
                |
    Manage application for 
    <?php
       echo 
        "<a href='/internship/views/company/index.php?view=jobseeker_profile&id=".$application['id'][1]."'>".
        $application['firstname']." ".$application['lastname']."</a>"; 
    ?>
</div>
<div class="col-sm-12 content-body" >  
	<h4><?php echo $application["title"] ."(".$application['field'][0].")" . " - " . $application['status'][2]; ?></h4>
	 
	<div class="col-sm-6">
		<ul> 
            <li><i class="fp-ht-computer"></i>Application Status : <?php echo $application['status'][0] ?></li>
            <li><i class="fp-ht-tv"></i>Date Applied : <?php echo $application['date'][0] ?></li>
        </ul>
	</div>

	<div class="col-sm-12">
		<p style="font-weight:bold">Resume : </p>   
		<p style="margin-left: 15px;"><?php echo '<a href="/internship/views/intern/cvs/'.$application['cv'][0].'">'
                          .$application['cv'][0].
                          '</a>'?></p>
	</div>

    <?php if($application['status'][0] == "Pending") {?>
        <div class="col-sm-12">  
                <a class="btn btn-success btn-sm accept-btn" value="Accept"
                data-toggle="modal" data-target="#interview_modal"
                data-whatever="@<?php echo $application['firstname']." ".$application['lastname'] ?>">
                    <i class="fa fa-check"> </i>&nbsp;Accept
                </a>
                <a href="" class="btn btn-warning btn-sm text-danger reject-btn"
                 style="background-color: red;" id="<?php echo $application['id'][0] ?>" >
                <i class="fa fa-times"> &nbsp; Reject</i></a>
        </div>
    <?php }elseif($application['status'][0] == "Accepted") {
        $intview = new InterviewView;
        $interview = $intview->get($application['id'][0]);
         ?>
         <div class="col-sm-12"> 
         <hr>
            <p>
                You Scheduled an Interview to take place on
                 <b><?php echo $interview['dateOfInterview']  ?></b> at
                <b><?php echo $interview['time'] ?> </b>
            </p>

            <p>
                <?php echo $interview['remark'] ?>  
            </p>
         </div>

    <?php }else{ ?>
        <div class="col-sm-12"><h4>You rejected this application</h4></div>
    <?php } ?>   
	
</div>

<?php if(Session::get("userVars", 'type') == "Company") { ?> 

<?php } elseif(Session::get("userVars", 'type') == "Applicant") {?>
<?php } ?>
 

<div class="modal fade" id="interview_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Schedule Interview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="interview-data">
          <input type="hidden" name="application" value="<?php echo $application['id'][0] ?>">
          <div class="form-group">
            <label for="date" class="col-form-label">Date of Interview*</label>
            <input type="text" class="form-control datepicker" name="date" required>
          </div>
          <div class="form-group">
            <label for="time" class="col-form-label">Time of Interview*</label>
            <input type="text" class="form-control time" name="time" required>
          </div>
          <div class="form-group">
            <label for="remarks" class="col-form-label">Other Information</label>
            <textarea class="form-control" name="remarks"></textarea>
          </div>
          <button type="submit" class="btn btn-primary" id="interview-btn">Schedule</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
