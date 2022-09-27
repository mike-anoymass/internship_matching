<?php
    require_once "classAutoload.php";

    //get student ID and delete
    if (isset($_POST['delBtnID'])) {
        $id = $_POST['delBtnID'];

        $appl = new InternView();
        $attach = $appl->getAttachment($id);

        $file_to_delete ='../../intern/documents/'.$attach['document'];
        unlink($file_to_delete);

        $contr = new internContr();

        $contr->deleteAttachment($id);

        echo '<div class="alert alert-danger alert-dismissible">
                                <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                                Vacancy has been Removed 
                           </div>';

    }

?>