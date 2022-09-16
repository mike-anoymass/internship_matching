<?php
    require_once "classAutoload.php";

    Session::start();

    if(isset($_POST['action']) && $_POST['action']=="login"){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $results = false;
        $credentials = new UserView();
    

        $results = $credentials->checkCredentials($email, $password);

        if($results == false){
            echo "<i class='fa fa-lg fa-warning'>Failed to Login_> Enter Valid Credentials</i></p>";
        }else{
        
            Session::set("userVars", array(
                "id" => $results['id'],
                "email" => $results['email'],
                "password" => $results['password'],
                "type" => $results['type']
            ));
        }
    }
