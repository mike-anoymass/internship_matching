<?php
    class UserView extends User{
        public function checkCredentials($email, $password){
            return parent::checkuser($email, $password);
        }
    }
?>