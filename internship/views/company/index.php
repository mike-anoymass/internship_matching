<?php 
require_once("classAutoload.php"); 
Session::start(); 
if (!Session::get("userVars")) {
    header("Location: ../login.php");
}


$content = "/../views/company/profile/profile.php";
$title = "Profile";

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) { 
	case 'jobseekers' :
	    $title="Job Seekers";	
        $_SESSION['jobseekers']	='active' ; 
		$content ='/../views/company/profile/profile.php';
		break;

    case 'jobseeker_profile' :
        $title="Job Seeker Profile";	
        $_SESSION['jobseekers']	='active' ; 
        $content ='/../views/company/profile/profile.php';
        break;

	case 'notification' :
	    $title="Profile";	
        $_SESSION['notification']	='active' ; 
		$content ='Profile.php';
		break;
  
	case 'accounts' : 
	    $title="Profile";	
        $_SESSION['accounts']	='active' ;
        $content ='Profile.php';
		break;
	 
	default : 
	    $title="Profile";	
        $_SESSION['appliedjobs']	='active' ;
		$content ='/../views/company/profile/profile.php';		
}

require_once("../../inc/layout.php");
?>
