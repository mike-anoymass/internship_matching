<?php 
    class InternContr extends Intern{
        function insert($fname, $lname, $gender, $phone, $prg, $year, $category, $bio, $type,
        $email, $passwd, $cv){
            return parent::insert($fname, $lname, $gender, $phone, $prg, $year, $category, $bio, $type,
            $email, $passwd, $cv);
        }
    }
?>