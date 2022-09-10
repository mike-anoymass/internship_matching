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
        global $fname, $lname, $gender, $phone, $prg, $year, $category, $bio, $type,
        $email, $passwd, $cv;

        //this objects will be used to insert and update user data
        global $contr;
        $contr = new CompanyContr();

        //These literal variables wll be used get data from the insert and update form
        $fname = $_POST['first_name'];
         $lname =  $_POST['last_name'];
         $gender = $_POST['gender'];
         $phone = $_POST['phone'];
          $prg = $_POST['prg'];
           $year = $_POST['year'];
            $category = $_POST['category'];
             $bio = $_POST['bio'];
              $type = $_POST['type'];
              $email = $_POST['email'];
              $passwd = $_POST['password'];
              $cv = $_POST['cv'];
     
    }


?>
