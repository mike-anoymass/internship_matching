<?php 
require_once("classAutoload.php"); 
Session::start(); 
if (!Session::get("userVars")) {
    header("Location: ../login.php");
}


$content = "/../views/intern/profile/profile.php";
$title = "Profile";

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
switch ($view) { 
	case 'appliedjobs' :
	    $title="Applied Jobs";	
        $_SESSION['appliedjobs'] ='active' ; 
		$content ='/../views/intern/profile/profile.php';
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

    case 'view_vacancy' : 
        $title="Vacancy Details";	
        $content ='/../views/intern/profile/profile.php';
        break;

    case 'account' : 
        $title="Update your account";	
        $content ='/../views/intern/profile/profile.php';
        break;
	 
	default : 
	    $title="Applied Jobs";	
        $_SESSION['appliedjobs'] ='active' ;
		$content ='/../views/intern/profile/profile.php';		
}

require_once("../../inc/layout.php");
?>
