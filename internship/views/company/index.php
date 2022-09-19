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

    case 'jobs' :
        $title="Vacancies";	
        $_SESSION['jobs']	='active' ; 
        $content ='/../views/company/profile/profile.php';
        break;
  
	case 'add_vacancy' : 
	    $title="New Vacancy";	
        $_SESSION['jobs']	='active' ;
        $content ='/../views/company/profile/profile.php';
		break;

    case 'edit_vacancy' : 
        $title="Update Vacancy";	
        $_SESSION['jobs']	='active' ;
        $content ='/../views/company/profile/profile.php';
        break;

    case 'view_vacancy' : 
        $title="Exploring Vacancy";	
        $_SESSION['jobs']	='active' ;
        $content ='/../views/company/profile/profile.php';
        break;
	 
	default : 
	    $title="Profile";	
        $_SESSION['appliedjobs']	='active' ;
		$content ='/../views/company/profile/profile.php';		
}

require_once("../../inc/layout.php");
?>
