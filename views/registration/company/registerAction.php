<?php
    require_once "classAutoload.php";

    if (isset($_POST['action']) && $_POST['action'] == "create") {
        insert();
    }

    function insert()
    {
        global $name, $owner, $profile, $phone, $cEmail, $address, $lEmail, $password, $type;

        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        global $contr;

        $results = $contr->insert($name, $owner, $profile, $phone, $cEmail, $address, $lEmail, $password, $type);
        if($results) {
           echo $results;
        }else{
            echo '<div class="alert alert-danger alert-dismissible">
                        <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' .
                $results . '</div>';
        }


    }

    function initializeVars(){
        global $name, $owner, $profile, $phone, $cEmail, $address, $lEmail, $password, $type;

        //this objects will be used to insert and update user data
        global $contr;
        $contr = new CompanyContr();

        //These literal variables wll be used get data from the insert and update form
        $name = $_POST['name'];
         $owner =  $_POST['owner'];
         $profile = $_POST['bio'];
         $phone = $_POST['phone'];
          $cEmail = $_POST['contact_email'];
           $address = $_POST['address'];
            $lEmail = $_POST['email'];
             $password = $_POST['password'];
              $type = $_POST['type'];
     
    }


?>
