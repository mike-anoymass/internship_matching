<?php
    require_once "classAutoload.php";

    if (isset($_POST) && isset($_FILES)) {
        insert();
    }

    function insert()
    {
        
        global $fname, $lname, $gender, $phone, $prg, $year, $category, $bio, $type,
        $email, $passwd, $cv;

        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        global $contr;

        if($cv != "error"){
            $results = $contr->insert($fname, $lname, $gender, $phone, $prg, $year, $category, $bio, $type,
            $email, $passwd, $cv);
            
            if($results) {
            echo $results;
            }else{
                echo '<div class="alert alert-danger alert-dismissible">
                            <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' .
                    $results . '</div>';
            }
        }

        


    }

    function initializeVars(){
        global $fname, $lname, $gender, $phone, $prg, $year, $category, $bio, $type,
        $email, $passwd, $cv;

        //this objects will be used to insert and update user data
        global $contr;
        $contr = new InternContr();

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
              $cv = UploadDoc();
    }

    function UploadDoc(){
        $target_dir = "../../intern/cvs/";
        $filename = str_replace(' ', '', $_FILES["resume"]["name"]);
        $target_file = $target_dir . date("dmYhis") . basename($filename);
        $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
            return  date("dmYhis") . basename($filename);
        }else{
            echo "Error Uploading File" . "=> Upload a file less than 2MB";
        }
} 
?>
