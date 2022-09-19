<?php
    require_once "classAutoload.php";

    Session::start();

    if (isset($_POST['action']) && $_POST['action'] == "create") {
        insert();
    }

    if (isset($_POST['action']) && $_POST['action'] == "update") {
        update();
    }

    function update(){
        global $id,  $title, $desc, $location, $category, $type,
        $salary, $duties, $skills, $qualifications, $closing_date,  $other_info, $status;
        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        global $controller;

        $results = $controller->update($id, $title, $desc, $location, $category, $type,
                    $salary, $duties, $skills, $qualifications, $closing_date,  $other_info, $status);
       
        echo 1;
    }

    function insert()
    {
        global $company_id, $title, $desc, $location, $category, $type,
                $salary, $duties, $skills, $qualifications, $closing_date,  $other_info;
        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        global $controller;

        $results = $controller->insert($company_id, $title, $desc, $location, $category, $type,
                    $salary, $duties, $skills, $qualifications, $closing_date,  $other_info);

        if($results){
            echo $results;
        }else{
            echo '<div class="alert alert-danger alert-dismissible">
            <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                '. $results.
            '</div>';
        }
       

    }


    function initializeVars(){
        global $id, $company_id, $title, $desc, $location, $category, $type,
               $salary, $duties, $skills, $qualifications, $closing_date,  $other_info, $status;

        //this objects will be used to insert and update user data
        global $controller;
        $controller = new JobContr();

        //These literal variables wll be used get data from the insert and update form
        $id = $_POST['id'];
        $company_id = Session::get('userVars', 'id');
        $title = $_POST['title'];
        $desc = $_POST['description'];
        $location = $_POST['location'];
        $category = $_POST['category'];
        $type = $_POST['type'];
        $salary = $_POST['salary'];
        $duties = $_POST['duties'];
        $skills = $_POST['skills'];
        $qualifications = $_POST['qua'];
        $closing_date = $_POST['date'];
        $other_info =  $_POST['info'];
        $status = $_POST['status'];
    }


?>
