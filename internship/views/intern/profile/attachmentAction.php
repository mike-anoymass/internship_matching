<?php
    require_once "classAutoload.php";
    Session::start();

    if (isset($_POST) && isset($_FILES)) {
        attach();
    }

    function attach()
    {
        //deleteExistingImage();
        $document = UploadDoc();

        $contr = new InternContr();

        $docName = $_POST['name'];

        $results = $contr->uploadDoc(Session::get("userVars", "id"), $docName, $document);

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
            $target_dir = "../../intern/documents/";
            $filename = str_replace(' ', '', $_FILES["document"]["name"]);
            $target_file = $target_dir . date("dmYhis") . basename($filename);
            $fileType = pathinfo($target_file,PATHINFO_EXTENSION);
            
            if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
                return  date("dmYhis") . basename($filename);
            }else{
                echo "Error Uploading File" . "=> Upload a file less than 2MB";
            }
    } 
?>
