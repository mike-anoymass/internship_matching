
<?php 

    if(Session::get("userVars","type") == "Applicant"){
        $j = new JobView();
	    $job = $j->getJob($_GET['id']);

        $app = new ApplicationView();
        $applc = $app->getApplication($_GET['id'], Session::get("userVars", "id"));
    
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
    <br>
	
</div>




    <?php 
            if (!$applc && $job['status'] == "Open"){
    ?>
        <div class="col-sm-12 content-footer">

            <div class="col-sm-12 slider">
                <h3>Apply <a href="#" data-target="#attachcv"  data-toggle="modal" >Here</a></h3>
            </div>
        </div>  
        
    </div>

    <?php }elseif($applc){ ?>

        <div class="col-sm-12 content-footer">
        <h4>You applied for this Job</h4>
        <div class="col-sm-12 slider">
            <h5>Download your Resume <a href="/internship/views/intern/cvs/<?php echo $applc['cv'] ?>">Here</a></h5>
            <h5>Status: <?php echo $applc['status'] ?></h5>
            <h5>Delete your application
            <i id="<?php echo $applc['id'] ?>" class="fa fa-trash fa-lg del-application" style="color: red;"></i></h5>
        </div>
        </div>  

    <?php }?>

        <div class="col-sm-12  submitbutton "> 
            <a href="index.php?view=appliedjobs" class="btn btn-primary fa fa-arrow-left">Back</a>
        </div> 

<?php } else{  ?>
    <script type="text/javascript">
    window.location.href = '/internship/';
    </script>
<?php }?>


<div class="modal fade" id="attachcv">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="text-center">Resume for this Vacancy
                    <span type="button" class="close fa fa-close" data-dismiss="modal"></span>
                </h3>
            </div>

    <!-- Modal body -->
    <div class="modal-body">
        <ul class="nav nav-tabs">
            <li class="nav-link active"><a data-toggle="tab" href="#attach">
                    <b>Resume</b></a></li>

        </ul>

        <div class="tab-content">
            <div id="attachcv" class="tab-pane active">
                <div class="panel panel-default" style="margin-top:6px">
                    <section class="panel-body">
                              <form id="resume-data" action="" method="POST"> 
                                    <div class="modal-body">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Attach Here:*</label>
                                                            <input name="resume" type="file" required
                                                             accept=".pdf, .docx, .doc" class="form-control">
                                                        </div>
                                                    </div>
                                                    
                                                    <input type="hidden" name="vacancy"
                                                     value="<?php echo $_GET['id']; ?>">

                                                     <input type="hidden" name="applicant"
                                                     value="<?php echo Session::get("userVars","id"); ?>">
                                                
                                                </div>
                                            </div>
                                
                                        </div>
                                    </div>
                                
                    </section>
                </div>

            </div>
        </div>

        <section style="display:inline;">

            <input type="submit" id="resume-btn" class="btn btn-primary btn-block"
                   value="Upload Resume">
        </section>

        </form>

    </div>

</div>
</div>
</div>


