<?php
    require_once "classAutoload.php";

    //get student ID and delete
    if (isset($_POST['delBtnID'])) {
        $id = $_POST['delBtnID'];

        $appl = new ApplicationView();
        $application = $appl->getApplicationOnce($id);

        $file_to_delete ='../../intern/cvs/'.$application['cv'];
        unlink($file_to_delete);

        $contr = new ApplicationContr();

        $contr->delete($id);

        echo '<div class="alert alert-danger alert-dismissible">
                                <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                                Vacancy has been Removed 
                           </div>';

    }

?>