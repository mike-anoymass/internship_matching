<?php   
    $view = isset($_GET['view']) ? $_GET['view'] :"";  
	$comp = new CompanyView();
	$company = $comp->get(Session::get("userVars", "id"));
?>
  <style type="text/css">
/*    #image-container {
      width: 230px;
    }*/
    .panel-body img{
      width: 100%;
      height: 50%;
    }
    .panel-body img:hover{
      cursor: pointer;
    }
  </style>
<section id="inner-headline">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <h2 class="pageTitle"><?php echo $title ;?></h2>
          </div>
      </div>
  </div>
</section>
<div class="container" style="margin-top: 10px;min-height: 600px;">

    <div class="row">

    <div class="col-sm-3"><!--left col-->
           <div class="panel panel-default">            
            <div class="panel-body"> 
              <div  id="image-container">
                <img title="profile image"  data-target="#myModal"  data-toggle="modal"  src="<?php// echo web_root.'applicant/'.$applicant->APPLICANTPHOTO; ?>">  
              </div>
              
             </div>
          <ul class="list-group">
       
         
            <li class="list-group-item text-muted">Profile</li><!-- 
            <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> 2.13.2014</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Last seen</strong></span> Yesterday</li> -->
            <li class="list-group-item text-right"><span class="pull-left"><strong>Real Name:</strong></span> 
             <?php echo $company['name'] ?> 
             </li>
            
          </ul> 
               
              <!-- <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Compose</a> -->

          <div class="box box-solid">  
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked"> 
              <li class="<?php echo ($view=='jobs' || $view=='') ? 'active': '';?>">
                <a href="/internship/views/company/index.php?view=jobs">
                <i class="fa fa-list"></i> Manage Vacancies
                   </a>
                </li>

                <li class="<?php echo ($view=='jobseekers' || $view=='') ? 'active': '';?>">
                    <a href="/internship/views/company/index.php?view=jobseekers">
                        <i class="fa fa-users"></i> Job Seekers
                    </a>
                </li>
               
                <li class="<?php echo ($view=='message') ? 'active': '';?>"><a href="<?php //echo web_root.'applicant/index.php?view=message'; ?>"><i class="fa fa-envelope-o"></i> Messages
                  <span class="label label-success pull-right"><?php echo isset($showMsg->COUNT) ? $showMsg->COUNT : 0;?></span></a></li>
              <li class="<?php //echo ($view=='notification') ? 'active': '';?>"><a href="<?php //echo web_root.'applicant/index.php?view=notification'; ?>"><i class="fa fa-bell-o"></i> Notification
                  <span class="label label-success pull-right"><?php //echo $notif; ?></span></a></li> 

                  <li class="<?php echo ($view=='accounts') ? 'active': '';?>">
                  <a href="<?php //echo web_root.'applicant/index.php?view=accounts'; ?>">
                  <i class="fa fa-user"></i> Account </a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
  
          <!-- /.box -->
          </div>
          
        </div> 
        <div class="col-sm-9">
        <?php
       // check_message();  
       // check_active(); 
            
        ?>

          <!-- <h1></h1> -->
<?php 
    // if ($view =="message") { 
    //  require_once("message.php");
    // }elseif($view=='notification'){  
    //     require_once("notification.php");  
    // }elseif($view=='appliedjobs'){    
    //     require_once("appliedjobs.php"); 
    // }elseif($view=='accounts'){  
    //     require_once("accounts.php");  
    // }else{ 
    //     require_once("appliedjobs.php");
    // } 

    switch ($view) {

     case 'view_vacancy':
        # code...
        require_once(__DIR__."/../vacancies/view.php");
        break;
      case 'add_vacancy':
        # code...
        require_once(__DIR__."/../vacancies/new.php");
        break;

      case 'edit_vacancy':
        # code...
        require_once(__DIR__."/../vacancies/edit.php");
        break;
      case 'jobs':
        # code...
        require_once(__DIR__."/../vacancies/index.php");
        break;

      case 'jobseekers':
        # code...
        require_once(__DIR__."/../jobseekers/index.php");
        break;

    case 'jobseeker_profile':
        # code...
        require_once(__DIR__."/../jobseekers/jobseeker_profile.php");
        break;
      case 'accounts':
        # code...
        // require_once("accounts.php");
        break;
      
      default:
        # code...
        require_once(__DIR__."/../vacancies/index.php");
        break;
    }
?>  
         <!--   <ul class="nav nav-tabs" id="myTab">
        <li class="<?php //echo  $_SESSION['appliedjobs']; ?>"><a href="<?php //echo web_root.'applicant/index.php?view=appliedjobs'; ?>" >Applied Jobs</a></li> 
        <li class="<?php //echo  $_SESSION['accounts'];  ?>"><a href="<?php // echo web_root.'applicant/index.php?view=accounts'; ?>" >Accounts</a></li> 
      </ul>
          
      <div class="tab-content bottomline">
         
         <div class="tab-pane <?php //echo $_SESSION['appliedjobs']; ?>" id="appliedjobs"><br/>  
         </div>
           <div class="tab-pane <?php //echo $_SESSION['accounts']; ?>" id="accounts"><br/>  
          </div> 

        </div> -->    
        </div><!--/col-sm-9-->
    </div><!--/row-->

  </div><!--/contanier--> 

   <?php  
    //unset($_SESSION['appliedjobs']);
   // unset($_SESSION['accounts']); 
     ?>
 
         <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">×</button>

                                    <h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
                                </div>

                                <form action="controller.php?action=photos" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8">
                                                          <input name="MAX_FILE_SIZE" type=
                                                            "hidden" value="1000000"> <input id=
                                                            "photo" name="photo" type=
                                                            "file">
                                                        </div>

                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Close</button> <button  class="btn btn-primary"
                                        name="savephoto" type="submit">Upload Photo</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
