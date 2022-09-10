<?php 
    class Company extends Dbh{
        protected function insert($name, $owner, $profile, $phone, $cEmail, $address, $lEmail, $password, $type){
           $id = $this->insertUser($lEmail, $password, $type);
           
           $sql = "INSERT INTO employer
                   (id, name, owner, profile, phone, email, postal_address) 
                   VALUES (?, ?, ?, ?, ?, ?, ?)"; 
  
           $stmt = $this->connect()->prepare($sql);

           if($stmt->execute([$id, $name, $owner, $profile, $phone, $cEmail, $address])){
               return true;
           }

           return implode(":",  $stmt->errorInfo() );
       }

       function insertUser($lEmail, $password, $type){
            $sql = "INSERT INTO users
                    (email, password, type) 
                    VALUES (?, ?, ?)";

            $stmt = $this->connect()->prepare($sql);
            
            if($stmt->execute([$lEmail, $password, $type])){
                $sql = "select max(id) as max from users";
                $stmt = $this->connect()->query($sql);
                $data = $stmt->fetch();
                return $data['max'];
            }
                    
            return 0;
       }
    }
?>