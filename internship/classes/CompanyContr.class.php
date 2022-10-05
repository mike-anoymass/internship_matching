<?php 
    class CompanyContr extends Company{
        function insert($name, $owner, $profile, $phone, $cEmail, $address, $lEmail, $password, $type){
            return parent::insert($name, $owner, $profile, $phone, $cEmail,
             $address, $lEmail, $password, $type);
        }

        public function update($id, $name, $owner, $profile, $phone, $cEmail, $address, $lEmail, $password, $type){
            return parent:: update($id, $name, $owner, $profile, $phone, $cEmail, $address, $lEmail, $password, $type);
        }
    }
?>