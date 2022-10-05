<?php
    require_once "classAutoload.php";

    if (isset($_POST)) {
        update();
    }

    function update()
    {
        
        global $id, $fname, $lname, $gender, $phone, $prg, $year, $category, $bio, $type,
        $email, $passwd, $cv;

        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        global $contr;

        if($cv != "error"){
            $results = $contr->update($id, $fname, $lname, $gender, $phone, $prg, $year, $category, $bio, $type,
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
        global $id, $fname, $lname, $gender, $phone, $prg, $year, $category, $bio, $type,
        $email, $passwd, $cv;

        //this objects will be used to insert and update user data
        global $contr;
        $contr = new InternContr();

        //These literal variables wll be used get data from the insert and update form
        $id = $_POST['id'];
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
            
              if($_FILES["resume"]["error"] != 4){
                $file_to_delete ='../../intern/cvs/'.$_POST['cv_path'];
                unlink($file_to_delete);
                $cv = UploadDoc();
              }else{
                $cv = $_POST['cv_path'];
              }
              
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
