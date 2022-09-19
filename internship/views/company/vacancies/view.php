<?php 
	$j = new JobView;
	$job = $j->getJob($_GET['id']);
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
<form action="controller.php?action=approve" method="POST">
<div class="col-sm-12 content-header">
    View Details &nbsp &nbsp &nbsp
    <?php if(Session::get("userVars", 'type') == "Company") { ?>
        <a class="text-warning" title="Edit Vacancy" 
            href="index.php?view=edit_vacancy&id=<?php echo $job['id'][0] ?>">
            <i class="fa fa-edit fa-md"></i>
        </a>
        &nbsp
        <a class="text-danger delete-vacancy" title="Delete Vacancy" 
            id=<?php echo $job['id'][0] ?>>
            <i class="fa fa-trash fa-md"></i>
        </a>

    <?php } ?>
</div>
<div class="col-sm-12 content-body" >  
	<h3><?php echo $job["title"] ."(".$job['field'].")" . " - " . $job['status']; ?></h3>
	<input type="hidden" name="JOBREGID" value="<?php ?>">
	<div class="col-sm-6">
		<ul>
            <li><i class="fp-ht-bed"></i>Required No. of Employee's : <?php echo $job['positions']; ?></li>
            <li><i class="fp-ht-food"></i>Salary : MK<?php echo number_format($job['salary'],2);  ?></li>
            <li><i class="fa fa-map-marker"></i> <?php echo $job['location'] ?></li>
        </ul>
	</div> 
	<div class="col-sm-6">
		<ul> 
            <li><i class="fp-ht-tv"></i>Employment Type : <?php echo $job['type'] ?></li>
            <li><i class="fp-ht-computer"></i>Date Posted : <?php echo $job['date'][0] ?></li>
            <li><i class="fp-ht-tv"></i>Closing date : <?php echo $job['due_date'] ?></li>
        </ul>
	</div>
    <div class="col-sm-12"> 
		<p style="font-weight:bold">Employeer : </p>
		<p style="margin-left: 15px;"><?php echo $job['name'] ?></p> 
		<p style="margin-left: 15px;">@ <?php echo $job['postal_address'] ?></p>
	</div>

	<div class="col-sm-12">
		<p style="font-weight:bold">Job Description : </p>   
		<p style="margin-left: 15px;"><?php echo $job['description']?></p>
	</div>
	<div class="col-sm-12"> 
		<p style="font-weight:bold">Duties : </p>
		<p style="margin-left: 15px;"><?php echo $job['duties'] ?></p>
	</div>

    <div class="col-sm-12">
		<p style="font-weight:bold">Skills : </p>   
		<p style="margin-left: 15px;"><?php echo $job['skills']?></p>
	</div>
	<div class="col-sm-12"> 
		<p style="font-weight:bold">Qualifications : </p>
		<p style="margin-left: 15px;"><?php echo $job['qualifications'] ?></p>
	</div>
	
</div>

<?php if(Session::get("userVars", 'type') == "Company") { ?>

<?php } elseif(Session::get("userVars", 'type') == "Applicant") {?>

<?php } ?>
 

<div class="col-sm-12 content-footer">
<p><i class="fa fa-paperclip"></i>  Attachment Files</p>
	<div class="col-sm-12 slider">
		 <h3>Download Resume <a href="<?php echo web_root.'applicant/'.$attachmentfile->FILE_LOCATION; ?>">Here</a></h3>
	</div>  
	<div class="col-sm-12">
		<p>Feedback</p>
		<p><?php echo isset($jobreg->REMARKS) ? $jobreg->REMARKS : ""; ?></p>
	</div>
	<div class="col-sm-12  submitbutton "> 
		<a href="index.php?view=appliedjobs" class="btn btn-primary fa fa-arrow-left">Back</a>
	</div> 
</div>
</form>