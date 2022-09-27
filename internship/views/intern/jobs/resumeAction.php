<?php
    require_once "classAutoload.php";

    if (isset($_POST) && isset($_FILES)) {
        attach();
    }

    function attach()
    {
        //deleteExistingImage();
        $document = UploadDoc();

        $contr = new ApplicationContr();

        $vacancy = $_POST['vacancy'];
        $applicant = $_POST['applicant'];

        $results = $contr->insert($vacancy, $applicant, $document);

        if($results) {
           echo $results;
        }else{
            echo '<div class="alert alert-danger alert-dismissible">
                        <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' .
                $results . '</div>';
        }


    }

    function deleteExistingImage(){
        $view = new InternView();
        $intern = $view->get(Session::get("userVars", "id"));
        $img = $intern['picture'];

        if($img){
            $file_to_delete ='../../intern/pictures/'.$img;
            unlink($file_to_delete);
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
