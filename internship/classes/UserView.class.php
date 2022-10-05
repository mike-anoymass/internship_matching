<?php
    class UserView extends User{
        public function checkCredentials($email, $password){
            return parent::checkuser($email, $password);
        }

        public function get($id){
            return parent::get($id);
        }
    }
?>