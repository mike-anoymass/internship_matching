<?php
    include_once("classAutoload.php");
    Session::start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>INTERNSHIP / <?php echo $title;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- css -->
<link href="/internship/plugins/home-plugins/css/bootstrap.min.css" rel="stylesheet" />
<link href="/internship/plugins/home-plugins/css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
<link href="/internship/plugins/home-plugins/css/flexslider.css" rel="stylesheet" /> 
<link href="/internship/plugins/home-plugins/css/style.css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="/internship/plugins/dataTables/dataTables.bootstrap.css">  --> 
<link rel="stylesheet" href="/internship/plugins/font-awesome/css/font-awesome.min.css"> 

<link rel="stylesheet" href="/internship/plugins/dataTables/jquery.dataTables.min.css"> 
<link rel="stylesheet" href="/internship/plugins/dataTables/jquery.dataTables_themeroller.css"> 
<!-- datetime picker CSS -->
<link href="/internship/plugins/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link href="/internship/plugins/datepicker/datepicker3.css" rel="stylesheet" media="screen">

 
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<style type="text/css">
 
  #content {
    min-height: 400px;
    color: #000;
  }
  
  .contentbody p {
    font-weight: bold;
  }
  .login a:hover{ 
    color: #00bcd4;
    text-decoration: none;

  }
  .login a:focus{ 
    color: #00bcd4;
    text-decoration: none;

  }
  .login a { 
     font-size: 14px;
    color: #fff;
    padding:0px;
  }
</style>

</head>
<body>
<div id="wrapper" class="home-page">
 
  <!-- start header -->
  <header>
        <div class="topbar navbar-fixed-top">
          <div class="container">
            <div class="row">
              <div class="col-md-12">      
                <p class="pull-left hidden-xs"><i class="fa fa-phone"></i>Tel No. (+265) 999 785 585</p>
                

                <?php
                $notif = "1";
                $msg = "34"; 
                    if(!Session::get("userVars")){
                        echo '<p   class="pull-right login">
                            <a href="/internship/views/login.php"> <i class="fa fa-lock"></i> Login </a>
                         </p>';
                    }else{
                        if(Session::get("userVars", "type") == "Applicant"){
                            $appl = new InternView();
                            $applicant = $appl->get(Session::get("userVars", "id"));

                            if($applicant){
                                echo ' <p class="pull-right login">
                                <a title="View Notification(s)" href="applicant/index.php?view=notification">
                                 <i class="fa fa-bell-o"></i> <span class="label label-success">'.$notif.'</span></a> 
                                 | <a title="View Message(s)" href="applicant/index.php?view=message"> 
                                 <i class="fa fa-envelope-o"></i> <span class="label label-success">'.$msg.'</span></a> 
                                 | <a title="View Profile" href="/internship/views/intern/"> <i class="fa fa-user"></i>
                                  Welcome, '. $applicant['firstname'] . ' '.$applicant['lastname'].' </a>
                                   | <a href="/internship/views/logout.php"> 
                                   <i class="fa fa-sign-out"> </i>Logout</a> </p>';
                            }
                           
                        }
                        if(Session::get("userVars", "type") == "Company"){
                            $comp = new CompanyView();
                            $company = $comp->get(Session::get("userVars", "id"));

                            if($company){
                                echo ' <p class="pull-right login">
                                <a title="View Notification(s)" href="/index.php?view=notification">
                                 <i class="fa fa-bell-o"></i> <span class="label label-success">'.$notif.'</span></a> 
                                 | <a title="View Message(s)" href="/index.php?view=message"> 
                                 <i class="fa fa-envelope-o"></i> <span class="label label-success">'.$msg.'</span></a> 
                                 | <a title="View Profile" href="/internship/views/company/index?view=jobs"> <i class="fa fa-user"></i>
                                  Welcome, '. $company['name']. '</a>
                                   | <a href="/internship/views/logout.php"> 
                                   <i class="fa fa-sign-out"> </i>Logout</a> </p>';
                            }
                           
                        }
                    }
                ?>
                

              </div>
            </div>
          </div>
        </div> 
        <div style="min-height: 30px;"></div>
        <div class="navbar navbar-default navbar-static-top" > 
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/internship/index.php">Internship Matching<!-- <img src="/internship/plugins/home-plugins/img/logo.png" alt="logo"/> --></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="<?php echo !isset($_GET['q'])? 'active' :''?>"><a href="/internship/index.php">Home</a></li> 
                        <li class="dropdown">
                          <a href="#" data-toggle="dropdown" class="dropdown-toggle">Job Search <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                              <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='advancesearch'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="/internship/index.php?q=advancesearch">Advance Search</a></li>
                              <li><a href="/internship/index.php?q=search-company">Job By Company</a></li>
                              <li><a href="/internship/index.php?q=search-function">Job By Function</a></li>
                              <li><a href="/internship/index.php?q=search-jobtitle">Job By Title</a></li>
                          </ul>
                       </li> 
                      <li class="dropdown <?php  if(isset($_GET['q'])) { if($_GET['q']=='category'){ echo 'active'; }else{ echo ''; }}  ?>">
                          <a href="#" data-toggle="dropdown" class="dropdown-toggle">Popular Jobs <b class="caret"></b></a>
                          <ul class="dropdown-menu">
            
                          </ul>
                       </li> 
                        <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='company'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="/internship/index.php?q=company">Company</a></li>
                        <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='hiring'){ echo 'active'; }else{ echo ''; }} ?>"><a href="/internship/index.php?q=hiring">Hiring Now</a></li>
                        <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='About'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="/internship/index.php?q=About">About Us</a></li>
                        <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='Contact'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="/internship/index.php?q=Contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
  </header>
  <!-- end header -->  
      <?php

      if (isset($_GET['q'])) {
        # code...
        echo '<section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="pageTitle">'.$title.'</h2>
                    </div>
                </div>
            </div>
            </section>';
      }

       include_once __DIR__ .$content;

        ?>   
 

  <footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <div class="widget">
          <h5 class="widgetheading">Our Contact</h5>
          <address>
          <strong>Our Company</strong><br>
          MUBAS, Near Chichiri<br>
            P.O BOX 20407.</address>
          <p>
            <i class="icon-phone"></i> (265) 999 - 657 - 0252<br>
            <i class="icon-envelope-alt"></i> coders@gmail.com
          </p>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="widget">
          <h5 class="widgetheading">Quick Links</h5>
          <ul class="link-list">
            <li><a href="/internship/index.php">Home</a></li>
            <li><a href="/internship/index.php?q=company">Company</a></li>
            <li><a href="/internship/index.php?q=hiring">Hiring</a></li>
            <li><a href="/internship/index.php?q=About">About us</a></li>
            <li><a href="/internship/index.php?q=Contact">Contact us</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="widget">
          <h5 class="widgetheading">Latest posts</h5>
          <ul class="link-list">
           
          </ul>
        </div>
    </div>
  </div>
  <div id="sub-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="copyright">
            <p>
              <span>&copy; MUBAS 2022 All right reserved.  
            </p>
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="social-network">
            <li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
            <li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  </footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster --> 
<?php include "scripts.php" ?>
<script src="../../plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="../../plugins/sweetalert2/dist/sweetalert2.js"></script>
<script src="/internship/js/all_pages.js"></script>

</body>
</html>
 