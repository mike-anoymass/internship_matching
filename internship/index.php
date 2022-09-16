<?php
    $title = "Home Page";
    $content = "/../views/home.php";
    $view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';
    switch ($view) { 
        case 'apply' :
            $title="Submit Application";	
            $content='/../views/applicationform.php';		
            break;
        case 'login' : 
            $title="Login";	
            $content='login.php';		
            break;
        case 'company' :
            $title="Company";	
            $content='/../views/company.php';		
            break;
        case 'hiring' :
            $title = isset($_GET['search']) ? 'Hiring in '.$_GET['search'] :"Hiring"; 
            $content='/../views/hirring.php';		
            break;		
        case 'category' :
            $title='Search for '. $_GET['search'];	
            $content='/../views/category.php';		
            break;
        case 'viewjob' :
            $title="Job Details";	
            $content='/../views/viewjob.php';		
            break;
        case 'success' :
            $title="Success";	
            $content='/../views/success.php';		
            break;
        case 'register' :
            $title="Register New Member";	
            $content='/../views/register.php';		
            break;
        case 'Contact' :
            $title='Contact Us';	
            $content='/../views/Contact.php';		
            break;	
        case 'About' :
            $title='About Us';	
            $content='/../views/About.php';		
            break;	
        case 'advancesearch' :
            $title='Advance Search';	
            $content='/../views/advancesearch.php';		
            break;	

        case 'result' :
            $title='Advance Search';	
            $content='/../views/advancesearchresult.php';		
            break;
        case 'search-company' :
            $title='Search by Company';	
            $content='/../views/searchbycompany.php';		
            break;	
        case 'search-function' :
            $title='Search by Function';	
            $content='/../views/searchbyfunction.php';		
            break;	
        case 'search-jobtitle' :
            $title='Search by Job Title';	
            $content='/../views/searchbytitle.php';		
            break;						
        default :
            $active_home='active';
            $title="Home";	
            $content ='/../views/home.php';		
    }

    include_once "inc/layout.php";

?>