<?php
    require_once "classAutoload.php";

    //get student ID and delete
    if (isset($_POST['delBtnID'])) {
        $id = $_POST['delBtnID'];

        $contr = new ApplicationContr;

        $contr->editStatus($id, "Rejected");
    }

?>