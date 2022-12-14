<?php   
    $view = isset($_GET['view']) ? $_GET['view'] :"";  
	  $appl = new InternView();
	  $applicant = $appl->get(Session::get("userVars", "id"));
      $attachments = $appl->getAttachments(Session::get("userVars", "id"));
  ?>
  <style type="text/css">
/*    #image-container {
      width: 230px;
    }*/
    .panel-body img{
      width: 100%;
      height: 50%;
    }
    .circular--square {
        border-top-left-radius: 50% 50%;
        border-top-right-radius: 50% 50%;
        border-bottom-right-radius: 50% 50%;
        border-bottom-left-radius: 50% 50%;
        width: 500px;
        height: 60px;
    }

    .panel-body img:hover{
      cursor: pointer;
    }
  </style>
<section id="inner-headline">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              <h2 class="pageTitle"><?php echo $title ?></h2>
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
                <img title="profile image" data-target="#picmodal"  data-toggle="modal" class="circular--square"
                src="<?php echo "pictures/".$applicant['picture'] ?>">  
              </div>
              
             </div>
          <ul class="list-group">
       
         
            <li class="list-group-item text-muted">Profile</li><!-- 
            <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> 2.13.2014</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Last seen</strong></span> Yesterday</li> -->
            <li class="list-group-item text-right"><span class="pull-left"><strong>Real Name:</strong></span> 
             <?php echo $applicant['firstname'].' '.$applicant["lastname"]; ?> 
             </li>
            
          </ul> 
               
              <!-- <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Compose</a> -->

          <div class="box box-solid">  
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked"> 
                <li class="<?php echo ($view=='appliedjobs' || $view=='') ? 'active': '';?>">
                    <a href="/internship/views/intern/index.php?view=appliedjobs">
                    <i class="fa fa-list"></i> Applied Jobs
                    </a>
                </li>
                <li>
                    <a href="" data-target="#attach"  data-toggle="modal">
                    <i class="fa fa-file"></i> Attachments
                    </a>
                </li>
                <li class="<?php echo ($view=='accounts') ? 'active': '';?>">
                        <?php echo '<a href="/internship/index.php?q=hiring&applicant='.$applicant['id'].'">   
                            <i class="fa fa-building"></i> Suggested for You </a>'?>
                  </li>
                <li class="<?php echo ($view=='message') ? 'active': '';?>">
                    <a href="<?php //echo web_root.'applicant/index.php?view=message'; ?>">
                    <i class="fa fa-envelope-o"></i> Messages
                  <span class="label label-success pull-right">
                    <?php echo isset($showMsg->COUNT) ? $showMsg->COUNT : 0;?></span></a></li>
                    <li class="<?php echo ($view=='account') ? 'active': '';?>">
                    <a href="/internship/views/intern/index.php?view=account">
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
      case 'message':
        # code...
        require_once("message.php");
        break;
      case 'notification':
        # code...
        require_once("notification.php");
        break;

        case 'view_vacancy':
            # code...
            require_once(__DIR__."/../jobs/view_job.php");
            break;

      case 'appliedjobs':
        # code...
        require_once(__DIR__."/../jobs/appliedjobs.php");
        break;
        
    case 'account':
        # code...
        require_once(__DIR__."/../account/view.php");
        break;
      
      default:
        # code...
        require_once(__DIR__."/../jobs/appliedjobs.php");
        break;
    }
?>  
        </div><!--/col-sm-9-->
    </div><!--/row-->
</div>

 
<!-- upload photo Modal -->
<div class="modal fade" id="picmodal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal" type=
                "button">??</button>

                <h4 class="modal-title" id="myModalLabel">Choose Image.</h4>
            </div>

            <form id="photo-data"> 
                <div class="modal-body">
                    <div class="form-group">
                        <div class="rows">
                            <div class="col-md-12">
                                <div class="rows">
                                    <div class="col-md-8">
                                        <input name="MAX_FILE_SIZE" type=
                                        "hidden" value="1000000">
                                            <input id=
                                        "photo" name="photo" type=
                                        "file" accept=".png,.jpg,.jpeg">
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
                    name="savephoto" type="submit" id="img-btn">Upload Photo</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- upload document Modal -->
<div class="modal fade" id="attach">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="text-center">Manage Attachments
                    <span type="button" class="close fa fa-close" data-dismiss="modal"></span>
                </h3>
            </div>

    <!-- Modal body -->
    <div class="modal-body">
        <ul class="nav nav-tabs">
            <li class="nav-link active"><a data-toggle="tab" href="#attachdoc">
                    <b>Attach File</b></a></li>
            <li class="nav-link"><a data-toggle="tab" href="#attachments">
                    <b>Attachments</b></a></li>

        </ul>

        <div class="tab-content">
            <div id="attachdoc" class="tab-pane active">
                <div class="panel panel-default" style="margin-top:6px">

                    <section class="panel-body">
                        <form id="document-data">

                              <form id="document-data"> 
                                    <div class="modal-body">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Document Name:*</label>
                                                            <input name="name" type="text" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Attach Here:*</label>
                                                            <input id= "document" name="document" type="file" required
                                                             accept=".pdf, .docx, .doc" class="form-control">
                                                        </div>
                                                    </div>
                                                     
                                                
                                                </div>
                                            </div>
                                
                                        </div>
                                    </div>
                                    <input type="submit" id="doc-btn" class="btn btn-primary btn-block"
                                        value="Upload Document">
                                </form>
                    </section>
                </div>

            </div>

            <div id="attachments" class="tab-pane ">
                <div class="panel panel-default" style="margin-top:6px">

                    <section class="panel-body">
                        <?php if($attachments) {
                            foreach($attachments as $doc){ 
                            ?>

                            <p>
                                <?php 
                                    echo "<a href='/internship/views/intern/documents/$doc[document] '>". 
                                    $doc['name'] .
                                    "</a>"
                                 ?>
                                &nbsp;&nbsp;
                                 <a id="<?php echo $doc['id'] ?>" title="Delete" class="delete-attachment">
                                    <i class="fa fa-trash" style="color:red"></i>
                                </a>
                        
                            </p>


                        <?php     
                            }} else{

                            echo "<h4>:Attachments not available</h4>";
                            
                        }?>

                    </section>
                </div>

            </div>
        </div>

        

    </div>

</div>
    
</div>
</div>