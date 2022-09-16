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
	    $title="Profile";	
        $_SESSION['appliedjobs']	='active' ; 
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
	 
	default : 
	    $title="Profile";	
        $_SESSION['appliedjobs']	='active' ;
		$content ='/../views/intern/profile/profile.php';		
}

require_once("../../inc/layout.php");
?>
